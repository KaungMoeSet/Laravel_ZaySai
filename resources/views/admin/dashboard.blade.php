@extends('admin.layout.admin')

@section('content')
    <div class="content-container">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Admin Dashboard</h1>
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
                                <p>Orders</p>

                                <h3>{{ $allOrders->count() }}</h3>
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
                                <h3 class="card-title">
                                    Recent Orders
                                </h3><br>
                                <form action="{{ route('admin.index') }}" method="GET">
                                    @csrf
                                    <div class="mt-3 row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="filter_option">Filter by User:</label>
                                                <select name="filter_option" id="filter_option" class="form-control">
                                                    <option value="all">All Users</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="order_status">Filter by Order Status:</label>
                                                <select name="order_status" id="order_status" class="form-control">
                                                    <option value="">All Status</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="processing">Processing</option>
                                                    <option value="delivered">Delivered</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-4 text-align-botton" style="padding-top: 2rem;">
                                            <button type="submit" class="btn btn-primary">Apply Filters</button>
                                        </div>
                                    </div>
                                </form>
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
                                                    @if ($order->payment)
                                                        @if ($order->payment->paymentConfirm)
                                                            {{ number_format($order->payment->paymentConfirm->total_amount) }}
                                                        @endif
                                                    @endif
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

                </div>
                <!-- /.row -->
                <form action="{{ route('admin.filterByDate') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-12 m-b30">
                            <div class="widget-box">
                                <div class="row py-2">
                                    <div class="col-lg-4 col-12">
                                        <h4>Monthly Sales </h4>
                                    </div>
                                    @csrf
                                    @method('GET')
                                    <div class="col-lg-3 col-4">
                                        <input type="date" placeholder="Start Month" id="start_month" name="start_month"
                                            class="form form-control p-2">
                                    </div>
                                    <div class="col-lg-3 col-4">
                                        <input type="date" placeholder="End Month" id="end_month" name="end_month"
                                            class="form form-control p-2">
                                    </div>
                                    <div class="col-lg-2 col-4">
                                        <button type="submit" class="btn btn-success"
                                            onclick="validateMonthRange(event);">Generate</button>
                                    </div>
                                    @if (isset($monthly_student))
                                        <div class="col-12 text-center text-lora text-danger fw-bold">
                                            <span>{{ $monthly_student }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="card p-3">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card px-3 py-4">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function validateMonthRange(event) {
            // Get the value of the start date and end date input elements 
            var startMonth = document.getElementById("start_month").value;
            var endMonth = document.getElementById("end_month").value;
            // Convert the date strings to Date objects 
            var start = new Date(startMonth);
            var end = new Date(endMonth);
            // Compare the dates 
            if (end < start) {
                // If the end date is less than the start date, prevent the form from being submitted 
                event.preventDefault();
                alert("End month cannot be less than start month.");
            }
        }

        const ctx = document.getElementById('myChart');

        var labels = [];
        var data = [];

        @foreach ($monthlySales as $sale)
            labels.push('{{ date('F', mktime(0, 0, 0, $sale->month, 1)) }}');
            data.push({{ $sale->total_sales }});
        @endforeach

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Monthly Sales Dataset',
                    data: data,
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

        const ctx1 = document.getElementById('pieChart');

        var labels1 = [];
        var data1 = [];

        @foreach ($topProducts as $product)
            labels1.push('{{ $product->name }}');
            data1.push({{ $product->total_quantity }});
        @endforeach

        new Chart(ctx1, {
            type: 'doughnut',
            data: {
                labels: labels1,
                datasets: [{
                    label: 'Dataset',
                    data: data1,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)'
                    ],
                    hoverOffset: 4
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


        function submitFilterForm() {
            document.getElementById('filterForm').submit();
        }
    </script>
@endsection
