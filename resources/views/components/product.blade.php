<div class="container">
    <section id="menu-6" class="menu-section division">

        <div class="row">

            @foreach ($products as $product)
                <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3" wire:key="{{ $product->id }}">
                    <div class="bg-white menu-6-item">


                        <!-- IMAGE -->
                        <div class="menu-6-img rel">
                            <div class="hover-overlay">

                                <!-- Image -->
                                <img class="img-fluid" src="{{ asset('images/' . $product->images->first()->name) }}"
                                    alt="menu-image" />

                                <!-- Item Code -->
                                {{-- <span class="item-code bg-tra-dark">Code: 0850</span> --}}

                                <!-- Zoom Icon -->
                                <div class="menu-img-zoom ico-25">
                                    <a href="{{ asset('images/' . $product->images->first()->name) }}"
                                        class="image-link">
                                        <span class="flaticon-zoom"></span>
                                    </a>
                                </div>

                            </div>
                        </div>

                        <!-- TEXT -->
                        <div class="menu-6-txt rel">

                            <!-- Rating -->
                            <div class="item-rating">
                                <div class="stars-rating stars-lg">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>

                            <!-- Like Icon -->
                            {{-- <div class="like-ico ico-25">
                                <a href="#"><span class="flaticon-heart"></span></a>
                            </div> --}}

                            <a href="{{ route('detail.cake', $product->slug) }}" target="_blank">
                                <h5 class="h5-sm product-title">
                                    {{ $product->name }}
                                </h5>

                                <p class="grey-color product-desc">
                                    {{ $product->description }}
                                </p>
                            </a>

                            <div class="menu-6-price bg-shadow">
                                <h5 class="h5-xs araya-color">RP. {{ $product->price / 1000 }}k</h5>
                            </div>

                            @if ($cart->where('product_id', $product->id)->first())
                                {{-- <input class="qty" name="quantity" type="number" min="0" max="99"
                                    value="{{ $cart->where('product_id', $product->id)->first()->quantity }}"
                                    wire:change="updateCart({{ $cart->where('product_id', $product->id)->first()->id }}, $event.target.value)"> --}}

                                <input class="qty" name="quantity" type="number" min="0" max="99"
                                    value="{{ $cart->where('product_id', $product->id)->first()->quantity }}"
                                    data-cart-id="{{ $cart->where('product_id', $product->id)->first()->id }}">
                            @else
                                <div class="add-to-cart bg-araya ico-10" style="cursor: pointer">
                                    <a class="add-to-cart-list" data-product-id="{{ $product->id }}"
                                        style="color:white" wire:click="$dispatch('loadProduct')">
                                        <span class="flaticon-shopping-bag"></span> Order
                                    </a>
                                </div>
                            @endif

                        </div>


                    </div>
                </div>
            @endforeach

        </div>

    </section>

    <div class="bg-color-01 page-pagination division">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1"><i
                                        class="fas fa-angle-left"></i></a></li>
                            <li class="page-item active"><a class="page-link" href="#">1 <span
                                        class="sr-only">(current)</span></a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i
                                        class="fas fa-angle-right"></i></a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>
