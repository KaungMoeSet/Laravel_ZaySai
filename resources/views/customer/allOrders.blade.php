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
                        Show
                        <select class="form-select">
                            <option selected>Last 5 orders</option>
                            <option value="1">Last 15 days</option>
                            <option value="2">Last 6 months</option>
                            <option value="3">
                                Orders placed in {{ date('Y') }}
                            </option>
                        </select>
                    </h5>
                </div>

                @if (!$user->orders->isEmpty())
                    @foreach ($user->orders as $order)
                        <div style="border: 1px solid #bbb;margin-top: 10px;">
                            <div class="modal-header">
                                <h5 class="modal-title mr-3">
                                    Order <a href="">{{ $order->order_number }}</a><br>
                                </h5>
                                <small>Place on {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y H:i:s') }}
                                </small>
                            </div>

                            <div class="modal-body">
                                <table class="cart__table cart-table">
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
                                                <td class="cart-table__column cart-table__column--product">
                                                    Qty: {{ $product->pivot->quantity }}
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
                                                @case('rejected')
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
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </div>
@endsection
