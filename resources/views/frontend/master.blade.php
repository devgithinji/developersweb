<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Densoft Developers"/>
    <meta name="author" content="dennis githinji"/>
    <meta name="robots" content=""/>
    <meta name="description" content="Densoft Developers"/>
    <meta property="og:title" content="Densoft Developers"/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content=""/>
    <meta name="format-detection" content="telephone=no">
    <!-- FAVICONS ICON -->
    <link rel="icon" href="{{asset('frontend/images/favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/images/favicon.png')}}"/>
    <!-- PAGE TITLE HERE -->
    <title>Densoft Developers</title>
    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--[if lt IE 9]>
    <script src="{{asset('frontend/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('frontend/js/respond.min.js')}}"></script>
    <![endif]-->
    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/plugins.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.min.css')}}">
    <link class="skin" rel="stylesheet" type="text/css" href="{{asset('frontend/css/skin/skin-3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/templete.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/plugins/datepicker/css/bootstrap-datetimepicker.min.css')}}"/>
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/plugins/revolution/revolution/css/settings.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('frontend/plugins/revolution/revolution/css/navigation.css')}}">
    <!-- REVOLUTION SLIDER CSS END -->
</head>

<body id="bg">
<div id="loading-area"></div>
<div class="page-wraper">
    <!-- header -->
    <header class="site-header header mo-left header-style-5">
        <!-- top bar -->
        <div class="top-bar">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="dez-topbar-left"></div>
                    <div class="dez-topbar-right">
                        <ul class="social-bx list-inline pull-right">
                            <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-facebook"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-twitter"></a></li>
                            <li><a href="javascript:void(0);" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- top bar END-->
        <!-- main header -->
        <div class="sticky-header header-curve main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix ">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
                        <a href="{{route('hometwo')}}">
                            <img src="{{asset('frontendImages/'.$logoMain->value)}}" width="193" height="89" alt="">
                        </a>
                    </div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                            data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- extra nav -->
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
                        <ul class=" nav navbar-nav">
                            <li class="active"><a href="{{route('hometwo')}}">Home</a></li>
                            <li><a href="{{route('services')}}">Services <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('services.pricing')}}">Pricing </a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('projects')}}">Projects</a></li>
                            <li><a href="{{route('shop')}}">Shop <i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('cart.list')}}">Cart </a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('blog')}}">Blog</a></li>
                            <li><a href="{{route('careers')}}">Careers</a></li>
                            <li><a href="{{route('aboutus')}}">About Us<i class="fa fa-chevron-down"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('downloads')}}">Downloads</a></li>
                                    <li><a href="{{route('faq')}}">F.A.Q </a></li>
                                    <li><a href="{{route('terms.conditions')}}">Terms and Conditions</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('contactus')}}">Contact us</a></li>
                            @guest
                                <li class="active"><a href="{{route('login')}}" type="button">Login <i
                                            class="fa fa-user"></i></a></li>
                            @else
                                <li class="active"><a href="{{route('account')}}" type="button">Account <i
                                            class="fa fa-chevron-down"></i></a>
                                    <ul class="sub-menu">
                                        <li><a href="contact.html"><span>Logout</span></a></li>
                                    </ul>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
        @yield('content')
    </div>
    <!-- Content END-->
    <!-- Footer -->
    <footer class="site-footer">
        <!-- newsletter part -->
        <div class="bg-primary dez-newsletter">
            <div class="container equal-wraper">
                <form class="dzSubscribe" action="https://constructzilla.dexignzone.com/xhtml/script/mailchamp.php"
                      method="post">
                    <div class="row">
                        <div class="col-md-4 col-lg-4">
                            <div class="icon-bx-wraper equal-col p-t30 p-b20 left">
                                <div class="icon-lg text-primary radius"><a href="#" class="icon-cell"><i
                                            class="fa fa-envelope-o"></i></a></div>
                                <div class="icon-content"><strong
                                        class="text-black text-uppercase font-18">Subscribe</strong>
                                    <h2 class="dez-tilte text-uppercase">Our Newsletter</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="dzSubscribeMsg"></div>
                            <div class="input-group equal-col p-t40 p-b20">
                                <input name="dzEmail" required placeholder="Email address" required="required"
                                       class="form-control" type="email">
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 offset-lg-1 offset-md-1">
                            <div class="equal-col p-t40 p-b20 skew-subscribe">
                                <button name="submit" value="Submit" type="submit"
                                        class="site-button-secondry button-skew z-index1">
                                    <span>Subscribe</span><i class="fa fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- footer top part -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_about">
                            <div class="logo-footer"><img src="{{asset('frontendImages/'.$logoMain->value)}}" alt="">
                            </div>
                            <p><strong>Our mission </strong><br>{{$mission->value}}</p>
                            <ul class="dez-social-icon dez-border">
                                <li><a class="fa fa-facebook" href="{{$maincontactus->twitterLink}}"></a></li>
                                <li><a class="fa fa-twitter" href="{{$maincontactus->facebookLink}}"></a></li>
                                <li><a class="fa fa-linkedin" href="{{$maincontactus->linkedInLink}}"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget recent-posts-entry">
                            <h4 class="m-b15 text-uppercase">Recent Post</h4>
                            <div class="dez-separator-outer m-b10">
                                <div class="dez-separator bg-white style-skew"></div>
                            </div>
                            <div class="widget-post-bx">
                                @foreach($postsList as $post)
                                    <div class="widget-post clearfix">
                                        <div class="dez-post-media"><img
                                                src="{{asset('postImage/'.$post->small_image)}}" alt=""
                                                width="200" height="143"></div>
                                        <div class="dez-post-info">
                                            <div class="dez-post-header">
                                                <h6 class="post-title text-uppercase"><a
                                                        href="blog-single.html">{{$post->name}}</a></h6>
                                            </div>
                                            <div class="dez-post-meta">
                                                <ul>
                                                    <li class="post-author">By <a href="#">{{$post->creator}}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_services">
                            <h4 class="m-b15 text-uppercase">Our services</h4>
                            <div class="dez-separator-outer m-b10">
                                <div class="dez-separator bg-white style-skew"></div>
                            </div>
                            <ul>
                                @foreach($servicesList as $ser)
                                    <li><a href="services-2.html">{{$ser->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_getintuch">
                            <h4 class="m-b15 text-uppercase">Contact us</h4>
                            <div class="dez-separator-outer m-b10">
                                <div class="dez-separator bg-white style-skew"></div>
                            </div>
                            <ul>
                                <li><i class="fa fa-map-marker"></i><strong>address</strong>{{$maincontactus->address}}
                                </li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <li><i class="fa fa-phone"></i><strong>phone</strong>{{$maincontactus->phoneone}}</li>
                                        <li><i class="fa fa-phone"></i><strong>phone</strong>{{$maincontactus->phonetwo}}</li>
                                        <li><i class="fa fa-phone"></i><strong>Shop</strong>{{$maincontactus->phonethree}}</li>
                                    </div>
                                    <div class="col-md-6">
                                        <li><i class="fa fa-envelope"></i><strong>email</strong>{{$maincontactus->emailone}}</li>
                                        <li><i class="fa fa-envelope"></i><strong>projects  email</strong>{{$maincontactus->emailtwo}}</li>
                                        <li><i class="fa fa-envelope"></i><strong>Shop</strong>{{$maincontactus->emailthree}}</li>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom footer-line">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 text-left">
                        <span>© Copyright {{date('Y')}}</span>
                    </div>
                    <div class="col-lg-4 col-md-4 text-center">
                        <span> Built By {{config('app.name')}} </span>
                    </div>
                    <div class="col-lg-4 col-md-4 text-right">
                        <a href="{{route('aboutus')}}"> About Us</a>
                        <a href="{{route('faq')}}"> FAQs</a>
                        <a href="{{route('contactus')}}"> Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END-->
    <!-- scroll top button -->
    <button class="scroltop fa fa-arrow-up style3"></button>
</div>
<!-- JavaScript  files ========================================= -->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script><!-- JQUERY.MIN JS -->
<script src="{{asset('frontend/plugins/bootstrap/js/popper.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('frontend/plugins/bootstrap/js/bootstrap.min.js')}}"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{asset('frontend/plugins/bootstrap-select/bootstrap-select.min.js')}}"></script><!-- FORM JS -->
<script src="{{asset('frontend/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script><!-- FORM JS -->

<script src="{{asset('frontend/plugins/counter/waypoints-min.js')}}"></script><!-- WAYPOINTS JS -->
<script src="{{asset('frontend/plugins/counter/counterup.min.js')}}"></script><!-- COUNTERUP JS -->
<script src="{{asset('frontend/plugins/imagesloaded/imagesloaded.js')}}"></script><!-- IMAGESLOADED -->
<script src="{{asset('frontend/plugins/masonry/masonry-3.1.4.js')}}"></script><!-- MASONRY -->
<script src="{{asset('frontend/plugins/masonry/masonry.filter.js')}}"></script><!-- MASONRY -->
<script src="{{asset('frontend/plugins/owl-carousel/owl.carousel.js')}}"></script><!-- OWL SLIDER -->
<script src="{{asset('frontend/plugins/lightgallery/js/lightgallery-all.js')}}"></script><!-- LIGHT GALLERY -->
<script src="{{asset('frontend/js/custom.min.js')}}"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{asset('frontend/js/dz.carousel.min.js')}}"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{asset('frontend/plugins/datepicker/js/moment.js')}}"></script><!-- DATEPICKER JS -->
<script src="{{asset('frontend/plugins/datepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<!-- DATEPICKER JS -->
<script src="{{asset('frontend/js/dz.ajax.js')}}"></script><!-- CONTACT JS  -->

<script>
    jQuery(document).ready(function () {

        $('#datetimepicker4').datetimepicker();

    }); /*ready*/
</script>
</body>
</html>
