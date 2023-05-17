@extends('admin.layout.admin')

@section('content')
    <div class="content-container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard v3</h1>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-3 col-12">
                        <!-- small box -->
                        <div class="small-box p-2">
                            <div class="inner">
                                <p>New Orders</p>

                                <h3>{{ $orders->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <!-- small box -->
                        <div class="small-box p-2">
                            <div class="inner">
                                <p>User Registrations</p>

                                <h3>{{ $users->count() }}</h3>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-6 col-12">
                        <!-- small box -->
                        <div class="small-box p-2">
                            <div class="inner">
                                <p>Total sells</p>

                                <h3>
                                    Ks {{ number_format($acceptedAmount) }}
                                </h3>
                            </div>
                            <div class="icon">
                                <i class="fab fa-sellsy"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Recent Orders</h3>
                                {{-- <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div> --}}
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Status</th>
                                            <th>City</th>
                                            <th>Customer</th>
                                            <th>Date</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    {{ $order->order_number }}
                                                </td>
                                                <td>
                                                    <span
                                                        class="p-2 rounded-pill
                                            @switch($order->order_status)
                                            @case('pending')
                                                btn-secondary
                                                @break
                                            @case('processing')
                                                btn-warning
                                                @break
                                            @case('delivered')
                                                btn-success
                                                @break
                                            @case('rejected')
                                                btn-danger
                                                @break
                                            @endswitch">
                                                        {{ $order->order_status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    {{ $order->user->addresses->where('setDefault', true)->first()->city->name }}
                                                <td>
                                                    {{ $order->user->name }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::createFromTimestamp(strtotime($order->order_date))->format('d M Y') }}
                                                </td>
                                                <td>
                                                    {{ number_format($order->payment->paymentConfirm->total_amount) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center pt-3">
                                    {{ $orders->links('layouts.paginationlinks') }}
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col-md-6 -->

                    {{-- <div class="col-lg-6">
                        <!--  -->
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price (Ks) </th>
                                            <th>Sales</th>
                                            <th>Revenue</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                        class="img-circle img-size-50 mr-2">
                                                    {{ $product->name }}
                                                </td>
                                                <td>
                                                    @foreach ($product->selling_prices as $price)
                                                        @if ($price->end_date == null)
                                                            {{ number_format($price->selling_price) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @php
                                                        $soldQty = 0;
                                                    @endphp
                                                    @foreach ($product->orders as $order)
                                                        @if (in_array($order->order_status, ['delivered']))
                                                            {{ $order->pivot->quantity }} Sold
                                                            @php
                                                                $soldQty += $order->pivot->quantity;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                </td>
                                                <td>
                                                    @foreach ($product->selling_prices as $price)
                                                        @if ($price->end_date === null)
                                                            {{ $soldQty * $price->selling_price - $soldQty * $product->buying_price }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center pt-3">
                                    {{ $products->links('layouts.paginationlinks') }}
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->

                    </div> --}}

                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <canvas id="myChart"></canvas>
                      </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
