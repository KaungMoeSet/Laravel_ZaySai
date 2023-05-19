<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query()->with('user');

        // Filter orders by user name if filter_option is present in the request and is not empty
        if ($request->filled('filter_option')) {
            if ($request->filter_option !== 'all') {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('id', $request->filter_option);
                });
            }
        }

        // Filter orders by order status if order_status is present in the request and is not empty
        if ($request->filled('order_status')) {
            $query->where('order_status', $request->order_status);
        }

        $allOrders = Order::all();
        $orders    = $query->paginate(5);

        $users          = User::all();
        $products       = Product::with('orders')->paginate(5);
        $acceptedAmount = PaymentConfirm::where('confirm_status', 'accepted')->sum('total_amount');

        // Pass the query parameters to the pagination links
        $orders->appends($request->query());

        $year = date('Y');

        $monthlySales = DB::table('orders')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->join('payment_confirms', 'payments.id', '=', 'payment_confirms.payment_id')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('selling_prices', 'products.id', '=', 'selling_prices.product_id')
            ->selectRaw('MONTH(orders.order_date) as month')
            ->selectRaw('SUM(order_product.quantity * selling_prices.selling_price) as total_sales')
            ->where('payment_confirms.confirm_status', 'accepted')
            ->whereYear('orders.order_date', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $topProducts = DB::table('products')
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->select('products.name', DB::raw('SUM(order_product.quantity) as total_quantity'))
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('allOrders', 'orders', 'users', 'products', 'acceptedAmount', 'monthlySales', 'topProducts'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $admin = Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/show-all-admins');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the admin
        $admin = Admin::findOrFail($id);

        // Delete the admin
        $admin->delete();

        return redirect()->back()->with('success_message', $admin->name . ' is deleted successfully!');
    }

    public function showAllAdmins()
    {
        $admins = DB::table('admins')->skip(1)->take(PHP_INT_MAX)->get();

        return view('admin.account.adminAccountList', compact('admins'));
    }

    public function filterByDate(Request $request)
    {
        $query = Order::query()->with('user');

        // Filter orders by user name if filter_option is present in the request and is not empty
        if ($request->filled('filter_option')) {
            if ($request->filter_option !== 'all') {
                $query->whereHas('user', function ($query) use ($request) {
                    $query->where('id', $request->filter_option);
                });
            }
        }

        // Filter orders by order status if order_status is present in the request and is not empty
        if ($request->filled('order_status')) {
            $query->where('order_status', $request->order_status);
        }

        $allOrders = Order::all();
        $orders    = $query->paginate(5);

        $users          = User::all();
        $products       = Product::with('orders')->paginate(5);
        $acceptedAmount = PaymentConfirm::where('confirm_status', 'accepted')->sum('total_amount');

        // Pass the query parameters to the pagination links
        $orders->appends($request->query());

        $year = date('Y');

        $startMonth = $request->input('start_month');
        $endMonth   = $request->input('end_month');

        $startMonth = Carbon::parse($startMonth)->startOfMonth();
        $endMonth   = Carbon::parse($endMonth)->endOfMonth();

        $monthlySales = DB::table('orders')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->join('payment_confirms', 'payments.id', '=', 'payment_confirms.payment_id')
            ->join('order_product', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->join('selling_prices', 'products.id', '=', 'selling_prices.product_id')
            ->selectRaw('MONTH(orders.order_date) as month')
            ->selectRaw('SUM(order_product.quantity * selling_prices.selling_price) as total_sales')
            ->where('payment_confirms.confirm_status', 'accepted')
            ->whereBetween('orders.order_date', [$startMonth, $endMonth])
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $topProducts = DB::table('products')
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->join('orders', 'orders.id', '=', 'order_product.order_id') // Add this line
            ->select('products.name', DB::raw('SUM(order_product.quantity) as total_quantity'))
            ->whereBetween('orders.order_date', [$startMonth, $endMonth])
            ->groupBy('products.id', 'products.name')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();


        return view('admin.dashboard', compact('allOrders', 'orders', 'users', 'products', 'acceptedAmount', 'monthlySales', 'topProducts', 'startMonth', 'endMonth'));
    }
}