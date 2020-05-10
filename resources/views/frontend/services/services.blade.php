@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Services </h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner bg-white">
            <!-- Services  -->
            <div class="container">
                <div class="row ">
                    @foreach($services as $service)
                        <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                            <div class="dez-box">
                                <div class="dez-media"><a href="#"><img src="{{asset('serviceImages/'.$service->large_photo)}}" alt=""></a></div>
                                <div class="dez-info p-a30 border-1">
                                    <h4 class="dez-title m-t0"><a href="#">{{$service->name}}</a></h4>
                                    <p>{{$service->description}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Services END -->
        </div>
        <!-- contact area END -->
    </div>
@endsection
