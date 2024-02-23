
<div class="row product-grid" id="">
    @foreach ($products as $key => $product)
    <!-- Product Card -->
    <div class="col-lg-4 col-md-4 col-12 col-sm-6">
        <div class="product-card mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
            <div class="product-img-col">
                <div class="product-img product-img-zoom">
                    <a href="view-product.html">
                        <img class="img-fluid" src="{{ $product->thumb }}" alt="{{ $product->name }}" />
                    </a>
                </div>
                <div class="product-inner-details d-flex">
                    <a aria-label="Quick view" class="product-btn" data-bs-toggle="modal" href="#quickViewModal{{ $product->id }}">
                       <i class="fi-rs-eye"></i>
                    </a>
                    @if ($product->price > 0)
                    <form action="/add-cart" method="post">
                        <input type="number" name="num_product" value="1" hidden>
                        <button type="submit" aria-label="Cart" class="product-btn"><i class="fi-rs-shopping-cart"></i></button>
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @csrf
                    </form>
                    @endif
                </div>
                @php
                    if($product->price == 0){
                        $isSale = '<div class="product-badge"><span class="best">COMING SOON</span></div>';
                    } else if ($product->price == $product->price_sale){
                        $isSale = '';
                    } else {
                        $isSale = '<div class="product-badge"><span class="best">SALE</span></div>';
                    }
                @endphp
                {!! $isSale !!}
            </div>
            <div class="product-content">
                <h2>
                    <a href="/san-pham/{{ $product->id }}-{{ \Str::slug($product->name) }}.html">
                    {{ $product->name }}
                    </a>
                </h2>
                <div class="product-card-bottom mt-0">
                    <div class="product-price">
                        @php
                            $helper = \App\Helpers\Helper::price($product->price, $product->price_sale);
                            if ($product->price == 0) {
                                $isPrice = '<span>' . \App\Helpers\Helper::price($product->price, $product->price_sale) . '</span>';
                            } else if ($product->price_sale == $product->price){
                                $isPrice = '<span>$' . $helper . '.00</span>';
                            } else {
                                $discountPercentage = round((1 - ($product->price_sale / $product->price)) * 100);
                                $isPrice = '
                                    <span>$' . $helper . '.00</span>
                                    <span class="old-price">$' . $product->price . '.00</span>
                                    <span class="discount-tag">-'. $discountPercentage .'%</span>';
                            }
                        @endphp
                        {!! $isPrice !!}
                    </div>
                </div>
                <div class="product-rating-info product-card-bottom">
                    <div class="rating d-inline-block">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <i class="far fa-star"></i>
                        <span class="ml-5"> (3.5)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Product Card -->
    @endforeach
</div>
{!! $products->links() !!}
