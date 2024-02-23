@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Name Customer: <strong>{{ $customer->name }}</strong></li>
            <li>Phone Number: <strong>{{ $customer->phone }}</strong></li>
            <li>Address: <strong>{{ $customer->address }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Note: <strong>{{ $customer->content }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table text-center table-hover m-0">
            <thead>
                <tr class="table_head  ">
                    <th class="column-1">IMG</th>
                    <th class="column-2">Product</th>
                    <th class="column-3">Price</th>
                    <th class="column-4">Quantity</th>
                    <th class="column-5">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->qty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2 align-middle">{{ $cart->product->name }}</td>
                    <td class="column-3 align-middle">${{ $cart->price }}.00</td>
                    <td class="column-4 align-middle">{{ $cart->qty }}</td>
                    <td class="column-5 align-middle">${{ $price }}.00</td>
                </tr>
                @endforeach
                <tr class="table-success">
                    <td colspan="4" class="text-right text-bold">Total</td>
                    <td class="text-bold">${{ $total }}.00</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection