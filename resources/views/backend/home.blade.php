@extends('backend.master')
@section('content')
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-lg-flex flex-nowrap align-items-center">
                        <div class="page-title mr-4 pr-4 border-right">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="breadcrumb-bar align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Dashboard
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- Notification -->
            <div class="row">
                <div class="col-md-12">
                    <div class="alert border-0 alert-primary bg-gradient m-b-30 alert-dismissible fade show border-radius-none" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those
                        fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ti ti-close"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-statistics">
                        <div class="row no-gutters">
                            <div class="col-xxl-3 col-lg-6">
                                <div class="p-20 border-lg-right border-bottom border-xxl-bottom-0">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Visits</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics7"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> 15,640</h3>
                                            <p>Monthly visitor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-6">
                                <div class="p-20 border-xxl-right border-bottom border-xxl-bottom-0">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Cost</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics8"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i> 16,656</h3>
                                            <p>This month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-6">
                                <div class="p-20 border-lg-right border-bottom border-lg-bottom-0">
                                    <div class="d-flex m-b-10">
                                        <p class="mb-0 font-regular text-muted font-weight-bold">Total Sales</p>
                                        <a class="mb-0 ml-auto font-weight-bold" href="#"><i class="ti ti-more-alt"></i> </a>
                                    </div>
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics9"></div>
                                        </div>
                                        <div class="statistics mt-3 mt-sm-0 ml-sm-auto text-center text-sm-right">
                                            <h3 class="mb-0"><i class="icon-arrow-up-circle"></i>569</h3>
                                            <p>Avg. Sales per day</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-3 col-lg-6">
                                <div class="p-20">
                                    <div class="d-block d-sm-flex h-100 align-items-center">
                                        <div class="apexchart-wrapper">
                                            <div id="analytics10"></div>
                                        </div>
                                        <div class="statistics ml-sm-auto mt-4 mt-sm-0 pr-sm-5">
                                            <ul class="list-style-none p-0">
                                                <li class="d-flex py-1">
                                                    <span><i class="fa fa-circle text-primary pr-2"></i> Redirect Visits</span> <span class="pl-2 font-weight-bold">456</span></li>
                                                <li class="d-flex py-1"><span><i class="fa fa-circle text-warning pr-2"></i> New Visits</span> <span class="pl-2 font-weight-bold">256</span></li>
                                                <li class="d-flex py-1"><span><i class="fa fa-circle text-info pr-2"></i> Direct Visits</span> <span class="pl-2 font-weight-bold">128</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
