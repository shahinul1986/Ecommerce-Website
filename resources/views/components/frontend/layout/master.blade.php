<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - {{ $title ?? '' }}</title>

    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Riode - Ultimate eCommerce Template">
    <meta name="author" content="D-THEMES">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('ui/frontend/assets/images') }}/icons/favicon.png">
    {{-- Preload Font --}}
    <link rel="preload" href="{{ asset('ui/frontend/assets/fonts') }}/riode.ttf?5gap68" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="{{ asset('ui/frontend/assets/vendor') }}/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('ui/frontend/assets/vendor') }}/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:300,400,500,600,700,800' ] }
        };
        ( function ( d ) {
            var wf = d.createElement( 'script' ), s = d.scripts[ 0 ];
            wf.src = '{{ asset('ui/frontend/assets/js') }}/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore( wf, s );
        } )( document );
    </script>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/vendor') }}/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/vendor') }}/animate/animate.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/vendor') }}/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/vendor') }}/owl-carousel/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/vendor') }}/sticky-icon/stickyicon.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/css') }}/demo1.min.css">

    @stack('css')

	<link rel="stylesheet" type="text/css" href="{{ asset('ui/frontend/assets/css') }}/style.min.css">

</head>

<body class="{{ $bodyClass ?? '' }}">

    <div class="page-wrapper">
        {{-- Header Start --}}
        <x-frontend.layout.partials.header />
        {{-- Header End --}}
        
        {{-- Main Content of Start --}}
        {{ $slot }}
        {{-- Main Content End --}}
        
        {{-- Footer Start --}}
        <x-frontend.layout.partials.footer />
        {{-- Footer End --}}
    </div>
    
    {{-- Sticky Footer Start --}}
    <x-frontend.layout.partials.stickyfooter />
    {{-- Sticky Footer End --}}
    
    {{-- Scroll Top Start --}}
    <x-frontend.layout.partials.scrolltop />
    {{-- Scroll Top End --}}

    {{-- MobileMenu Start --}}
    <x-frontend.layout.partials.mobilemenu />
    {{-- MobileMenu End --}}

    {{-- newsletter-popup default Start --}}
    <x-frontend.layout.partials.newsletter_popup />
    {{-- newsletter-popup default End --}}

    {{-- sticky icons Start--}}
    <x-frontend.layout.partials.stickyicons />
    {{-- sticky icons End--}}
	
	{{-- Plugins JS File --}}
    <script src="{{ asset('ui/frontend/assets/vendor') }}/jquery/jquery.min.js"></script>
    <script src="{{ asset('ui/frontend/assets/vendor') }}/parallax/parallax.min.js"></script>
    <script src="{{ asset('ui/frontend/assets/vendor') }}/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('ui/frontend/assets/vendor') }}/elevatezoom/jquery.elevatezoom.min.js"></script>
    <script src="{{ asset('ui/frontend/assets/vendor') }}/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('ui/frontend/assets/vendor') }}/owl-carousel/owl.carousel.min.js"></script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    @stack('js')

    {{-- Main JS File --}}
    <script src="{{ asset('ui/frontend/assets/js') }}/main.min.js"></script>

    
</body>

</html>