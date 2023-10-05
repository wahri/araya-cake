<header id="header-3" class="header navik-header header-shadow">
    <div class="container-fluid">


        <!-- NAVIGATION MENU -->
        <div class="navik-header-container">


            <!-- CALL BUTTON -->
            <div class="basket-ico ico-25 callusbtn">
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
            <div class="logo" data-mobile-logo="{{ asset('home-assets/images/logo-araya-horizontal.png') }}"
                data-sticky-logo="{{ asset('home-assets/images/logo-araya-light.png') }}">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('home-assets/images/logo-araya-light.png') }}" alt="header-logo"
                        style="height: 40px" />
                </a>
            </div>


            <!-- BURGER MENU -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>


            <!-- MAIN MENU -->
            <div class="group-navbar">

                <nav class="ml-2 navik-menu menu-caret navik-yellow">
                    <ul class="top-list">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <!-- DROPDOWN MENU -->
                        <li><a href="#">Profil</a>
                            <ul>
                                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('about') }}#lokasi">Lokasi</a></li>
                                <li><a href="{{ route('galleryCake') }}">Galeri Cake</a></li>
                                <li><a href="{{ route('contact') }}">Kontak</a></li>
                            </ul>
                        </li>

                        <!-- DROPDOWN MENU -->
                        <li><a href="#">Produk</a>
                            <ul>
                                @foreach ($categoryProduct as $category)
                                    <li><a
                                            href="{{ route('categoryProduct', $category->slug) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <!-- DROPDOWN MENU -->
                        {{-- <li>
                            <a href="{{ route('shop') }}">Pesan Sekarang</a>
                        </li> --}}
                        <li>
                            <a href="https://www.facebook.com/arayacakepku/" target="_blank" class="ico-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/arayacakepku/" target="_blank" class="ico-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@arayacakepekanbaru" target="_blank" class="ico-instagram">
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
                        <li class="basket-ico ico-25">
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

                        @guest
                            <li>
                                <a href="{{ route('login') }}" class="btn-member">
                                    Member
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="#" class="btn-member">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="right">
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                    <li><a href="{{ route('member.setting') }}">Pengaturan Akun</a></li>
                                    <li><a href="#"
                                            onclick="event.preventDefault();
                                        document.getElementById('logoutForm').submit();">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>



        </div> <!-- END NAVIGATION MENU -->


    </div> <!-- End container -->


</header>
