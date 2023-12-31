<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="Araya Cake menyediakan cake untuk setiap momen spesialmu, berdiri sejak tahun 2017 memberikan Best Product dengan harga terbaik untuk semua konsumen setia Araya" name="description" />
    <meta content="Araya Cake Pekanbaru" name="author" />
    <meta name="keywords"
        content="Birthday Cake, Event Cake, Cake Pekanbaru, Custom Cake, Spesial Cake, Kue Ulang Tahun, Kue Pekanbaru">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta property="og:title" content="Cake Untuk Momen Spesialmu - Araya Cake">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://arayacake.com/">
    <meta property="og:description" content="Araya Cake menyediakan cake untuk setiap momen spesialmu, berdiri sejak tahun 2017 memberikan Best Product dengan harga terbaik untuk semua konsumen setia Araya">
    <meta property="og:site_name" content="Araya Cake Pekanbaru">
    <!-- SITE TITLE -->
    <title>Cake Untuk Momen Spesialmu - Araya Cake</title>

    <!-- FAVICON AND TOUCH ICONS -->
    <link rel="shortcut icon" href="{{ asset('home-assets/images/logo-araya-small.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('home-assets/images/logo-araya-small.png') }}" type="image/x-icon">
    <link rel="araya-touch-icon" sizes="152x152" href="{{ asset('home-assets/images/logo-araya-small.png') }}">
    <link rel="araya-touch-icon" sizes="120x120" href="{{ asset('home-assets/images/logo-araya-small.png') }}">
    <link rel="araya-touch-icon" sizes="76x76" href="{{ asset('home-assets/images/logo-araya-small.png') }}">
    <link rel="araya-touch-icon" href="{{ asset('home-assets/images/logo-araya-small.png') }}">
    <link rel="icon" href="{{ asset('home-assets/images/logo-araya-small.png') }}" type="image/x-icon">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=KoHo:wght@300;500;700;900&family=Maven+Pro:wght@300;500;700;900&family=Poppins:wght@300;500;700;900&display=swap"
        rel="stylesheet">

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('home-assets/css/bootstrap.min.cs') }}s" rel="stylesheet">

    @stack('style')
    <!-- FONT ICONS -->
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('home-assets/css/flaticon.css') }}" rel="stylesheet">

    <!-- PLUGINS STYLESHEET -->
    <link href="{{ asset('home-assets/css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('home-assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('home-assets/css/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('home-assets/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home-assets/css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home-assets/css/jquery.datetimepicker.min.css') }}" rel="stylesheet">

    <!-- TEMPLATE CSS -->
    <link href="{{ asset('home-assets/css/style.css') }}" rel="stylesheet">

    <!-- RESPONSIVE CSS -->
    <link href="{{ asset('home-assets/css/responsive.css') }}" rel="stylesheet">

    <link href="{{ asset('home-assets/css/custom.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        [x-cloak] {
            display: none
        }
    </style>


</head>




<body>




    <!-- PRELOADER SPINNER
  ============================================= -->
    <div id="loader-wrapper">
        <div id="loader">
            <div class="cssload-spinner">
                <div class="cssload-ball cssload-ball-1"></div>
                <div class="cssload-ball cssload-ball-2"></div>
                <div class="cssload-ball cssload-ball-3"></div>
                <div class="cssload-ball cssload-ball-4"></div>
            </div>
        </div>
    </div>

    @include('partials.header')



    <!-- PAGE CONTENT
  ============================================= -->
    <div id="page" class="page">


        @yield('content')



        @include('partials.footer')




    </div>
    
    <script src="{{ asset('home-assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('home-assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('home-assets/js/modernizr.custom.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.scrollto.js') }}"></script>
    <script src="{{ asset('home-assets/js/menu.js') }}"></script>
    <script src="{{ asset('home-assets/js/materialize.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('home-assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('home-assets/js/contact-form.js') }}"></script>
    <script src="{{ asset('home-assets/js/comment-form.js') }}"></script>
    <script src="{{ asset('home-assets/js/booking-form.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('home-assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('home-assets/js/lazysizes.min.js') }}" async></script>

    <script src="{{ asset('home-assets/js/custom.js') }}"></script>


    @stack('script')

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!-- [if lt IE 9]>
   <script src="js/html5shiv.js" type="text/javascript"></script>
   <script src="js/respond.min.js" type="text/javascript"></script>
  <![endif] -->

    <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information. -->
    <!--
  <script>
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-XXXXX-X']);
      _gaq.push(['_trackPageview']);

      (function() {
          var ga = document.createElement('script');
          ga.type = 'text/javascript';
          ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
              '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0];
          s.parentNode.insertBefore(ga, s);
      })();
  </script>
  -->



</body>



</html>
