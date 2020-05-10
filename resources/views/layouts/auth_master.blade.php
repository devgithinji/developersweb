<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="" />
    <meta property="og:title" content="Constructzilla - Construction Template"/>
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('frontend/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.png')}}" />

    <!-- PAGE TITLE HERE -->
    <title>Constructzilla - Construction Template</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.min.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{asset('frontend/css/skin/skin-1.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/templete.min.css')}}">

</head>
<body id="bg"><div id="loading-area"></div>
<div class="page-wrapers">
    <!-- Content -->
    @yield('content')
    <!-- Content END-->
</div>
<!-- JavaScript  files ========================================= -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('frontend/plugins/bootstrap/js/popper.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('frontend/plugins/bootstrap/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('frontend/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script src="{{asset('frontend/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->
{{--<script src="{{asset('frontend/plugins/magnific-popup/magnific-popup.js')}}"></script><!-- MAGNIFIC POPUP JS -->--}}
<script src="{{asset('frontend/plugins/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('frontend/plugins/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('frontend/plugins/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED -->
<script src="{{asset('frontend/plugins/masonry/masonry-3.1.4.js')}}"></script><!-- MASONRY -->
<script src="{{asset('frontend/plugins/masonry/masonry.filter.js')}}"></script><!-- MASONRY -->
<script src="{{asset('frontend/plugins/owl-carousel/owl.carousel.js')}}"></script><!-- OWL SLIDER -->
<script src="{{asset('frontend/js/custom.min.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{asset('frontend/js/dz.carousel.min.js')}}"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{asset('frontend/js/dz.ajax.js')}}"></script><!-- CONTACT JS  -->
{{--<script src="{{asset('frontend/plugins/switcher/js/switcher.min.js')}}"></script><!-- CONTACT JS  -->--}}
<script src="{{asset('frontend/plugins/particles/particles.js')}}"></script><!-- PARTICLES  -->
<script src="{{asset('frontend/plugins/particles/particles.app.js')}}"></script><!-- PARTICLES  -->

</body>

</html>
