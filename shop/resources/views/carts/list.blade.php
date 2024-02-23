@extends('main')

@section('content')
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow"><i class="fas fa-home mr-10"></i> Home</a>
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-20">
                        <div class="card-body">
                            <div class="shop-cart-box">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="/carts" class="active">
                                            <i class="feather-shopping-cart"></i> Shopping Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form method="post">
                @include('admin.alert')
                @if (count($products) != 0)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive shopping-table">
                            @php $total = 0; @endphp
                            <table class="table">
                                <thead>
                                    <tr class="table-head text-center">
                                        <th>Product</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Product Price</th>
                                        <th>Price</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key => $product)
                                    @php
                                        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        $priceEnd = $price * $carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp
                                    <tr class="table-head text-center">
                                        <td class="image product-thumbnail">
                                            <a href="#">
                                                <img src="{{ $product->thumb }}" class="img-fluid" alt="{{ $product->name }}">
                                            </a>
                                        </td>
                                        <td><a href="#">{{ $product->name }}</a></td>
                                        <td class="text-center detail-info" data-title="Stock">
                                            <div class="detail-extralink mr-15">
                                                <div class="form-outline" style="width: 5rem;">
                                                    <input type="number" class="form-control form-icon-trailing" 
                                                    name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}"/>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">$
                                            {{ $product->price_sale != 0 ? $product->price_sale : $product->price }}.00
                                        </td>
                                        <td>$ {{ $priceEnd }}.00</td>
                                        <td>
                                            <a href="/carts/delete/{{ $product->id }}" class="table-btn-close">
                                                <i class="feather-x-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="shop-cart">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <div class="shop-cart-action">
                                    <input type="submit" class="btn basket-btn mb-5" value="Update Cart" formaction="/update-cart">
                                    </input>
                                    @csrf
                                    <a href="/danh-muc/all" class="btn continue-btn">Continue Shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="shop-cart-info">
                                            <p>Total <span>$ {{ $total }}.00</span></p>
                                            <div class="row">
                                                <h5 class="mb-30">Billing Details</h5>
                                                <form method="post" data-select2-id="13" id="orderForm">
                                                    <div class="form-floating mb-3 col-lg-6">
                                                        <input type="text" class="form-control" name="name"  placeholder="">
                                                        <label class="ms-2">Name *</label>
                                                    </div>
                                                    <div class="form-floating mb-3 col-lg-6">
                                                        <input type="text" class="form-control" name="phone" placeholder="">
                                                        <label class="ms-2">Phone *</label>
                                                    </div>
                                                    <div class="form-floating mb-3 col-lg-12">
                                                        <input type="text" class="form-control" name="address" placeholder="">
                                                        <label class="ms-2">Address *</label>
                                                    </div>
                                                    <div class="form-floating mb-3 col-lg-12">
                                                        <input type="text" class="form-control" name="email" placeholder="">
                                                        <label class="ms-2">Email *</label>
                                                    </div>
                                                    <div class="form-floating mb-30">
                                                        <textarea class="form-control" name="content" 
                                                        placeholder="Additional information" style="height: 150px"></textarea>
                                                        <label class="ms-2">Additional information *</label>
                                                    </div>
                                                </form>
                                            </div>
                                            <button class="btn checkout-btn w-100">Place an Order</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @else
                <div class="text-center"><h2>EMPTY</h2></div>
            @endif
        </div>
    </div>
</main>
@endsection