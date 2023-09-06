<header id="header-3" class="header navik-header header-shadow">
    <div class="container-fluid">


        <!-- NAVIGATION MENU -->
        <div class="navik-header-container">


            <!-- CALL BUTTON -->
            <div class="basket-ico ico-30 callusbtn">
                {{-- <a href="tel:123456789">
                    <i class="fas fa-phone"></i>
                </a> --}}
                <a href="{{ route('cart') }}">
                    <span class="ico-holder">
                        <span class="flaticon-shopping-bag"></span>
                        <em class="roundpoint" id="cart-count-mobile"
                            @if ($cartCount == 0) style="display: none" @endif>
                            {{ $cartCount }}
                        </em>
                    </span>
                </a>
            </div>


            <!-- LOGO IMAGE -->
            <div class="logo" data-mobile-logo="{{ asset('home-assets/images/logo-araya-light.png') }}"
                data-sticky-logo="{{ asset('home-assets/images/logo-araya-light.png') }}">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('home-assets/images/logo-araya-light.png') }}" alt="header-logo"
                        style="height: 50px" />
                </a>
            </div>


            <!-- BURGER MENU -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>


            <!-- MAIN MENU -->
            <nav class="navik-menu menu-caret navik-yellow">
                <ul class="top-list">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <!-- DROPDOWN MENU -->
                    <li><a href="#">Profil</a>
                        <ul>
                            <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                            <li><a href="{{ route('about') }}#lokasi">Lokasi</a></li>
                            <li><a href="#">Kontak</a></li>
                        </ul>
                    </li>

                    <!-- DROPDOWN MENU -->
                    <li><a href="#">Produk</a>
                        <ul>
                            <li><a href="#">Kue Ulang Tahun</a></li>
                            <li><a href="#">Premium Cake</a></li>
                            <li><a href="#">Brownies</a></li>
                            <li><a href="#">Donut</a></li>
                            <li><a href="#">Cupcake</a></li>
                            <li><a href="#">Kue Lainnya</a></li>
                        </ul>
                    </li>

                    <!-- DROPDOWN MENU -->
                    {{-- <li>
                        <a href="{{ route('shop') }}">Pesan Sekarang</a>
                    </li> --}}
                    <li>
                        <a href="#" class="ico-facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="ico-instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="ico-instagram">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </li>

                    <!-- HEADER BUTTON  -->
                    {{-- <li class="nav-btn yellow-color"><a href="tel:123456789">789-654-3210</a></li> --}}

                </ul>
            </nav>

            <nav class="navik-menu right menu-caret navik-yellow">
                <ul class="top-list">

                    <!-- BASKET ICON -->
                    <li class="basket-ico ico-30">
                        <a href="{{ route('cart') }}">
                            <span class="ico-holder">
                                <span class="flaticon-shopping-bag"></span>
                                <em class="roundpoint" id="cart-count"
                                    @if ($cartCount == 0) style="display: none" @endif>
                                    {{ $cartCount }}
                                </em>
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}" class="btn-member">
                            Member
                        </a>
                    </li>
                </ul>
            </nav>



        </div> <!-- END NAVIGATION MENU -->


    </div> <!-- End container -->


    <div class="position-fixed top-0 end-0 p-3" style="z-index: 999; right: 0">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-body bg-primary">
                Hello, world! This is a toast message.
            </div>
        </div>
    </div>
</header>
