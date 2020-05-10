<!DOCTYPE html>
<html lang="en">


<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc."/>
    <meta name="author" content="Potenza Global Solutions"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{asset('backend/img/favicon.ico')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/vendors.css')}}"/>
    <!-- DataTables -->
    <link href="{{asset('backend/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('backend/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Responsive datatable examples -->
    <link href="{{asset('backend/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('backend/css/style.css')}}"/>
</head>

<body>
<!-- begin app -->
<div class="app">
    <!-- begin app-wrap -->
    <div class="app-wrap">
        <!-- begin pre-loader -->
        <div class="loader">
            <div class="h-100 d-flex justify-content-center">
                <div class="align-self-center">
                    <img src="{{asset('backend/img/loader/loader.svg')}}" alt="loader">
                </div>
            </div>
        </div>
        <!-- end pre-loader -->
    @guest()
        @yield('login_content')
    @else
        <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">
                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="index-2.html">
                            <img src="{{asset('backend/img/logo.png')}}" class="img-fluid logo-desktop" alt="logo"/>
                            <img src="{{asset('backend/img/logo-icon.png')}}" class="img-fluid logo-mobile" alt="logo"/>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            <ul class="navbar-nav nav-left">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                        <i class="ti ti-align-right"></i>
                                    </a>
                                </li>
                                <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                                    <a href="javascript:void(0)" class="nav-link expand">
                                        <i class="icon-size-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav nav-right ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown2"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="ti ti-email"></i>
                                    </a>
                                    <div class="dropdown-menu extended animated fadeIn"
                                         aria-labelledby="navbarDropdown">
                                        <ul>
                                            <li class="dropdown-header bg-gradient p-4 text-white text-left">Messages
                                                <label class="label label-info label-round">6</label>
                                                <a href="#"
                                                   class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                                    <span class="font-13"> Mark all as read</span></a>
                                            </li>
                                            <li class="dropdown-body">
                                                <ul class="scrollbar scroll_dark max-h-240">
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid"
                                                                         src="{{asset('backend/img/avtar/03.jpg')}}"
                                                                         alt="user3">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Brianing Leyon</p>
                                                                    <small>You will sail along until you...</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid"
                                                                         src="{{asset('backend/img/avtar/01.jpg')}}"
                                                                         alt="user">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Jimmyimg Leyon</p>
                                                                    <small>Okay</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid"
                                                                         src="{{asset('backend/img/avtar/02.jpg')}}"
                                                                         alt="user2">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Brainjon Leyon</p>
                                                                    <small>So, make the decision...</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid"
                                                                         src="{{asset('backend/img/avtar/04.jpg')}}"
                                                                         alt="user4">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Smithmin Leyon</p>
                                                                    <small>Thanks</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid"
                                                                         src="{{asset('backend/img/avtar/05.jpg')}}"
                                                                         alt="user5">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Jennyns Leyon</p>
                                                                    <small>How are you</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <img class="img-fluid"
                                                                         src="{{asset('backend/img/avtar/06.jpg')}}"
                                                                         alt="user6">
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Demian Leyon</p>
                                                                    <small>I like your themes</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-footer">
                                                <a class="font-13" href="javascript:void(0)"> View All messages </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="navbarDropdown3"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-bell"></i>
                                        <span class="notify">
                                            <span class="blink"></span>
                                            <span class="dot"></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu extended animated fadeIn"
                                         aria-labelledby="navbarDropdown">
                                        <ul>
                                            <li class="dropdown-header bg-gradient p-4 text-white text-left">
                                                Notifications
                                                <a href="#"
                                                   class="float-right btn btn-square btn-inverse-light btn-xs m-0">
                                                    <span class="font-13"> Clear all</span></a>
                                            </li>
                                            <li class="dropdown-body min-h-240 nicescroll">
                                                <ul class="scrollbar scroll_dark max-h-240">
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md">
                                                                        <span>HY</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">New registered user</p>
                                                                    <small>Just now</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md bg-success">
                                                                        <span>GM</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">New invoice received</p>
                                                                    <small>22 min</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md bg-danger">
                                                                        <span>FR</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Server error report</p>
                                                                    <small>7 min</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md bg-info">
                                                                        <span>HT</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Database report</p>
                                                                    <small>1 day</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">
                                                            <div
                                                                class="notification d-flex flex-row align-items-center">
                                                                <div class="notify-icon bg-img align-self-center">
                                                                    <div class="bg-type bg-type-md">
                                                                        <span>DE</span>
                                                                    </div>
                                                                </div>
                                                                <div class="notify-message">
                                                                    <p class="font-weight-bold">Order confirmation</p>
                                                                    <small>2 day</small>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown-footer">
                                                <a class="font-13" href="javascript:void(0)"> View All Notifications
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link search" href="javascript:void(0)">
                                        <i class="ti ti-search"></i>
                                    </a>
                                    <div class="search-wrapper">
                                        <div class="close-btn">
                                            <i class="ti ti-close"></i>
                                        </div>
                                        <div class="search-content">
                                            <form>
                                                <div class="form-group">
                                                    <i class="ti ti-search magnifier"></i>
                                                    <input type="text" class="form-control autocomplete"
                                                           placeholder="Search Here" id="autocomplete-ajax"
                                                           autofocus="autofocus">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4"
                                       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{asset('backend/img/avtar/02.jpg')}}" alt="avtar-img">
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">{{ucwords(Auth::user()->name)}}</h4>
                                                    <small class="text-white">{{Auth::user()->email}}</small>
                                                </div>
                                                <a href="{{route('employee.logout')}}"
                                                   class="text-white font-20 tooltip-wrapper"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="" data-original-title="Logout"> <i
                                                        class="zmdi zmdi-power"></i></a>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <a class="dropdown-item d-flex nav-link"
                                               href="{{route('staff.profile.edit',[Auth::user()->id])}}">
                                                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-envelope pr-2 text-primary"></i> Inbox
                                                <span class="badge badge-primary ml-auto">6</span>
                                            </a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class=" ti ti-settings pr-2 text-info"></i> Settings
                                            </a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-compass pr-2 text-warning"></i> Need help?</a>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <a class="bg-light p-3 text-center d-block" href="#">
                                                        <i class="fe fe-mail font-20 text-primary"></i>
                                                        <span class="d-block font-13 mt-2">My messages</span>
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="bg-light p-3 text-center d-block" href="#">
                                                        <i class="fe fe-plus font-20 text-primary"></i>
                                                        <span class="d-block font-13 mt-2">Compose new</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Main</li>
                            <li class="active">
                                <a href="{{route('admin.dashboard')}}" aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboard</span>
                                </a>
                            </li>
                            <li><a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-calendar"></i><span class="nav-title">Users</span></a>
                                <ul aria-expanded="false">
                                    <li><a href='calendar-full.html'>Clients</a></li>
                                    <li><a href='{{route('users.list')}}'>Users</a></li>
                                    <li><a href='{{route('staff.list')}}'>Staff</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-bag"></i> <span class="nav-title">Permissions</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="ui-alerts.html">Permissions</a></li>
                                    <li><a href="ui-accordions.html">Roles</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-info"></i> <span class="nav-title">Services</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('services.list')}}">Services Listing</a></li>
                                    <li><a href="{{route('prices.list')}}">Pricing</a></li>
                                    <li><a href="{{route('reviews.list')}}">Reviews</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-info"></i> <span class="nav-title">Documents</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('services.list')}}">Invoices</a></li>
                                    <li><a href="{{route('prices.list')}}">Receipts</a></li>
                                    <li><a href="{{route('reviews.list')}}">Other Docs</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i
                                        class="nav-icon ti ti-layout-grid4-alt"></i><span
                                        class="nav-title">Projects</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('projects.list')}}">Internal Projects</a></li>
                                    <li><a href="{{route('projects.showcase')}}">ShowCase Projects</a></li>
                                    <li><a href="{{route('projects.proposal.list')}}">Quotations / Proposals</a></li>
                                    <li><a href="{{route('task.view')}}">Tasks</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-layout-column3-alt"></i><span
                                        class="nav-title">Shop</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('shop.categories.list')}}">Categories</a></li>
                                    <li><a href="{{route('shop.products.list')}}">Products</a></li>
                                    <li><a href="tables-datatable.html">Orders</a></li>
                                    <li><a href="tables-editable.html">Payments</a></li>
                                    <li><a href="tables-export.html">Deliverlies</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-map-alt"></i><span class="nav-title">Careers</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('career.list')}}">Careers List</a></li>
                                    <li><a href="{{route('career.applications.list')}}">Applications</a></li>
                                </ul>
                            </li>
                            <li class="nav-static-title">Others</li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-map-alt"></i><span class="nav-title">Policies</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('terms.list')}}">Terms & Conditions</a></li>
                                    <li><a href="{{route('faq.list')}}">Faq</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-map-alt"></i><span class="nav-title">Blog</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('post.categories.list')}}">Categories</a></li>
                                    <li><a href="{{route('post.list')}}">Posts</a></li>
                                </ul>
                            </li>
                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"><i
                                        class="nav-icon ti ti-layers"></i><span
                                        class="nav-title">Page Settings</span></a>
                                <ul aria-expanded="false">
                                    <li><a href="{{route('general.settings.list')}}">Default Settings</a></li>
                                    <li><a href="{{route('contactus.settings.create')}}">Contact Us</a></li>
                                    <li><a href="{{route('page.images.list')}}">Page Images</a></li>
                                    <li><a href="{{route('logo.list')}}">Employers Logo</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->
                <!-- begin app-main -->
            @yield('content')
            <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <!-- begin footer -->
            <footer class="footer">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright 2019. All rights reserved.</p>
                    </div>
                    <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p>Hand-crafted made with <i class="fa fa-heart text-danger mx-1"></i> by Potenza</p>
                    </div>
                </div>
            </footer>
            <!-- end footer -->
        @endguest
    </div>
    <!-- end app-wrap -->
</div>
<!-- end app -->
<!-- plugins -->
<script src="{{asset('backend/js/vendors.js')}}"></script>
<!-- Required datatable js -->
<script src="{{asset('backend/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('backend/datatables/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/datatables/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('backend/datatable/datatables.init.js')}}"></script>
<!-- custom app -->
<script src="{{asset('backend/js/app.js')}}"></script>

<script>
        @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"
    switch (type) {
        case 'info':
            toastr['info']("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr['success']("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr['warning']("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr['error']("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

<script>
    $(document).on("click", "#delete", function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
        })
            .then((result) => {
                if (result.value) {
                    swal(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    window.location.href = link;
                } else {
                    swal("Safe Data!");
                }
            });
    });
</script>
</body>

</html>
