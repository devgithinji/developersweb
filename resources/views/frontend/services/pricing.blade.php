@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Our Prices</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="index.html">Home</a></li>
                    <li>Our Prices</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-head">
                        <h2 class="text-uppercase">Our Prices</h2>
                    </div>
                    <div class="section-content">
                        <div class="pricingtable-row m-b30 p-lr15">
                            <div class="row">
                                @foreach($prices as $price)
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="pricingtable-wrapper">
                                            <div class="pricingtable-inner">
                                                <div class="pricingtable-price">
                                                    <li style="list-style: none" class="text-primary">{{$price->name}}</li>
                                                    <br>
                                                    <span class="pricingtable-bx">${{$price->price}}</span>
                                                </div>
                                                <div class="pricingtable-title bg-primary">
                                                    <h2>As From</h2>
                                                </div>
                                                <ul class="pricingtable-features">
                                                    <li><i class="fa fa-check"></i>{{$price->desc1}}</li>
                                                    <li><i class="fa fa-check"></i>{{$price->desc2}}</li>
                                                    <li><i class="fa fa-check"></i>{{$price->desc3}}</li>
                                                </ul>
                                                <div class="pricingtable-footer"><a href="{{route('proposal.create')}}" class="site-button radius-no">Inquire</a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pricing table-1 Columns 4 with no gap END -->
            </div>
            <!-- Left & right section  END -->
        </div>
    </div>
@endsection
