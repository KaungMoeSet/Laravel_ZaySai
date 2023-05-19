@extends('customer.layout.profile')

@section('content1')
    <div class="page-header">
        <div class="page-header__container container">
            <div class="page-header__title">
                <h4>My Orders</h4>
            </div>
        </div>

        <div role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mr-3">
                        <form action="{{ route('profile.getAllOrders') }}" method="GET" id="filterForm">
                            Show
                            <select class="form-select" name="filter_option" id="filterOptionSelect"
                                onchange="submitFilterForm()">
                                <option value="0">Last 5 orders</option>
                                <option value="1">Last 15 days</option>
                                <option value="2">Last 6 months</option>
                                <option value="3">Orders placed in {{ date('Y') }}</option>
                            </select>
                        </form>
                    </h5>
                </div>

                @if (!$user->orders->isEmpty())
                    @foreach ($orders as $order)
                        <div style="border: 1px solid #bbb;margin-top: 10px;">
                            <div class="modal-header">
                                <div class="modal-title mr-3">
                                    <span>Order <a href="">{{ $order->order_number }}</a></span><br>
                                    <small>Place on {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y H:i:s') }}
                                    </small>
                                </div>
                                <div style="font-size: 1.5rem; font-weight: bold;">
                                    Total : {{ number_format($order->payment->paymentConfirm->total_amount) }} Ks
                                </div>
                            </div>

                            <div class="modal-body">
                                <table class="cart__table cart-table">
                                    <thead>
                                        <tr class="cart-table__row">
                                            <th class="cart-table__column">#</th>
                                            <th class="cart-table__column">name</th>
                                            <th class="cart-table__column">price(Ks)</th>
                                            <th class="cart-table__column">Qty</th>
                                            <th class="cart-table__column">status</th>
                                            <th class="cart-table__column"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="cart-table__body" id="shipping-details">
                                        @foreach ($order->products as $product)
                                            <tr class="cart-table__row">
                                                <td class="cart-table__column cart-table__column--image">
                                                    <a href="{{ route('products.show', $product->id) }}">
                                                        <img src="{{ asset('storage/img/' . $product->images->first()->image_name) }}"
                                                            alt="">
                                                    </a>
                                                </td>
                                                <td class="cart-table__column">
                                                    {{ $product->name }}
                                                </td>
                                                <td class="cart-table__column">
                                                    @foreach ($product->selling_prices as $price)
                                                        @if ($price->end_date == null)
                                                            {{ number_format($price->selling_price) }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td class="cart-table__column cart-table__column--product">
                                                    {{ $product->pivot->quantity }}
                                                </td>
                                                <td class="cart-table__column" data-title="Status">
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
                                                @default
                                                    btn-danger
                                                    @break
                                                @endswitch">
                                                        {{ $order->order_status }}
                                                    </span>
                                                </td>
                                                <td class="cart-table__column" data-title="Quantity">
                                                    @if ($order->order_status == 'delivered' || $order->order_status == 'processing')
                                                        <span class="text-success">
                                                            Get by
                                                            {{ \Carbon\Carbon::parse($order->payment->paid_at)->addDays(5)->format('D d M') }}
                                                            -
                                                            {{ \Carbon\Carbon::parse($order->payment->paid_at)->addDays(8)->subDay()->format('D d M') }}
                                                        </span>
                                                    @elseif($order->order_status == 'rejected')
                                                        <span class="text-danger">
                                                            {{ $order->payment->paymentConfirm->reject_reason }}
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if ($order->order_status == 'rejected')
                                            <span class="text-danger">
                                                If this was mistake reach us
                                                <a href="/contactUs" class="text-primary">here</a>
                                            </span>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var filterOption =
                '{{ $filterOption ?? '0' }}'; // Get the selected filter option from the PHP variable

            var filterOptionSelect = document.getElementById('filterOptionSelect');
            filterOptionSelect.value = filterOption;
        });

        function submitFilterForm() {
            document.getElementById('filterForm').submit();
        }
    </script>

@endsection
