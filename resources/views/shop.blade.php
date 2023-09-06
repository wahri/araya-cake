@extends('layouts.app')

@section('content')
    <!-- PAGE HERO
                                                                                       ============================================= -->
    <div id="product-page" class="page-hero-section division">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="hero-txt text-center white-color">

                        <h2 class="h2-xl">Semua Cake</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row wide-70">

            <div class="col-lg-3">
                <div class="card">

                    <div class="card-body">

                        <h4 class="header-title">Filters</h4>


                        <div class="border p-3 rounded mt-4">
                            <h5 class="font-size-16">Kategori cake</h5>

                            <div class="mt-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="form-check-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                  </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" id="multirange" name="multirange1" class="form-check-input"
                                        checked>
                                    <label class="custom-control-label" for="multirange"> All</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" id="multirange1" name="multirange1" class="form-check-input">
                                    <label class="custom-control-label" for="multirange1"> $1 -
                                        $10</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" id="multirange2" name="multirange1" class="form-check-input">
                                    <label class="custom-control-label" for="multirange2"> $10 -
                                        $100</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" id="multirange3" name="multirange1" class="form-check-input">
                                    <label class="custom-control-label" for="multirange3"> $100 -
                                        $500</label>
                                </div>
                                <div class="form-check mt-2">
                                    <input type="checkbox" id="multirange4" name="multirange1" class="form-check-input">
                                    <label class="custom-control-label" for="multirange4"> $500</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-9">

                <section id="newsletter-1" class="mb-20 newsletter-section division">
                    <div class="container">
                        <div class="border p-3 rounded">
                            <div class="row">


                                <!-- NEWSLETTER FORM -->
                                <div class="col-12">
                                    <div class="newsletter-txt text-center">

                                        <!-- Form -->
                                        <form>

                                            <div class="input-group">
                                                <input type="email" class="form-control" placeholder="Cari Nama cake..."
                                                    required id="s-email">
                                                <span class="input-group-btn">
                                                    <button type="submit" class="btn btn-red tra-red-hover">Cari cake</button>
                                                </span>
                                            </div>

                                            <!-- Newsletter Form Notification -->
                                            <label for="s-email" class="form-notification"></label>

                                        </form>

                                    </div>
                                </div> <!-- END NEWSLETTER FORM -->


                            </div> <!-- End row -->
                        </div> <!-- End Inner Bg -->
                    </div> <!-- End container -->
                </section>

                <section id="menu-6" class="menu-section division">

                    <div class="container">
                        <div class="row">
                            <!-- MENU ITEM #1 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-11.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0850</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-11.jpg') }}"
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
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>

                                        <!-- Like Icon -->
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Crispy Chicken</h5>

                                        <!-- Description -->
                                        <p class="grey-color">Chicken breast, chilli sauce, tomatoes, pickles, coleslaw</p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$8.50</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #1 -->


                            <!-- MENU ITEM #2 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-12.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0858</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-12.jpg') }}"
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
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>

                                        <!-- Like Icon -->
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Ultimate Bacon</h5>

                                        <!-- Description -->
                                        <p class="grey-color">House beef patty, cheddar cheese, bacon, onion, mustard</p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$9.99</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #2 -->


                            <!-- MENU ITEM #3 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-13.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0847</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-13.jpg') }}"
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
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Black Sheep</h5>

                                        <!-- Description -->
                                        <p class="grey-color">American cheese, tomato relish, avocado, lettuce, red onion
                                        </p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$9.75</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #3 -->


                            <!-- MENU ITEM #4 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-14.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0859</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-14.jpg') }}"
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
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>

                                        <!-- Like Icon -->
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Double Burger</h5>

                                        <!-- Description -->
                                        <p class="grey-color">2 beef patties, cheddar cheese, mustard, pickles, tomatoes
                                        </p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$10.35</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #4 -->


                            <!-- MENU ITEM #5 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-15.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0861</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-15.jpg') }}"
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
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                        </div>

                                        <!-- Like Icon -->
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Turkey Burger</h5>

                                        <!-- Description -->
                                        <p class="grey-color">Turkey, cheddar cheese, onion, lettuce, tomatoes, pickles</p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$8.95</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #5 -->


                            <!-- MENU ITEM #6 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-16.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0840</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-16.jpg') }}"
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
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>

                                        <!-- Like Icon -->
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Smokey House</h5>

                                        <!-- Description -->
                                        <p class="grey-color">Beef patty, cheddar cheese, onion, lettuce, tomatoes, pickles
                                        </p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$9.50</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #6 -->


                            <!-- MENU ITEM #7 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-17.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0862</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-17.jpg') }}"
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
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Classic Burger</h5>

                                        <!-- Description -->
                                        <p class="grey-color">Beef, cheddar cheese, ketchup, mustard, pickles, onion</p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$7.95</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #7 -->


                            <!-- MENU ITEM #8 -->
                            <div class="col-sm-6 col-lg-3">
                                <div class="menu-6-item bg-white">

                                    <!-- IMAGE -->
                                    <div class="menu-6-img rel">
                                        <div class="hover-overlay">

                                            <!-- Image -->
                                            <img class="img-fluid"
                                                src="{{ asset('home-assets/images/menu/burger-18.jpg') }}"
                                                alt="menu-image" />

                                            <!-- Item Code -->
                                            <span class="item-code bg-tra-dark">Code: 0844</span>

                                            <!-- Zoom Icon -->
                                            <div class="menu-img-zoom ico-25">
                                                <a href="{{ asset('home-assets/images/menu/burger-18.jpg') }}"
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
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>

                                        <!-- Like Icon -->
                                        <div class="like-ico ico-25">
                                            <a href="#"><span class="flaticon-heart"></span></a>
                                        </div>

                                        <!-- Title -->
                                        <h5 class="h5-sm">Vegan Burger</h5>

                                        <!-- Description -->
                                        <p class="grey-color">Mushroom patty, vegan cheese, lettuce, tomatoes, avocado</p>

                                        <!-- Price -->
                                        <div class="menu-6-price bg-coffee">
                                            <h5 class="h5-xs yellow-color">$8.95</h5>
                                        </div>

                                        <!-- Add To Cart -->
                                        <div class="add-to-cart bg-yellow ico-10">
                                            <a href="product-single.html"><span class="flaticon-shopping-bag"></span> Add
                                                to
                                                Cart</a>
                                        </div>

                                    </div>

                                </div>
                            </div> <!-- END MENU ITEM #8 -->


                        </div>
                        <!-- End row -->
                    </div>

                </section>
                <!-- PAGE PAGINATION
                   ============================================= -->
                <div class="bg-color-01 page-pagination division">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled"><a class="page-link" href="#"
                                                tabindex="-1"><i class="fas fa-angle-left"></i></a></li>
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
                        </div> <!-- End row -->
                    </div> <!-- End container -->
                </div>
                <!-- END PAGE PAGINATION -->
            </div>
        </div>
    </div>
@endsection

@section('style')
@endsection

@section('sript')
@endsection
