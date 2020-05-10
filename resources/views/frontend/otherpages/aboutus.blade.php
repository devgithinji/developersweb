@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">About Us</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="clearfix">
            <!-- About Company -->
            <div class="section-full content-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-head text-left">
                                <h2 class="text-uppercase"> About {{config('app.name')}}</h2>
                                <div class="aon-separator bg-primary"></div>
                                <p class="m-b50">{{$companyData['company_description']}}</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
                                        <div class="icon-bx-sm bg-primary radius"><a href="#" class="icon-cell"><i
                                                    class="fa fa-building-o"></i></a></div>
                                        <div class="icon-content p-l40">
                                            <h5 class="aon-tilte text-uppercase">Mission</h5>
                                            <p>{{$companyData['company_mission']}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="icon-bx-wraper bx-style-2 m-l40 m-b30 p-a30 left">
                                        <div class="icon-bx-sm bg-primary radius"><a href="#" class="icon-cell"><i
                                                    class="fa fa-file-text-o"></i></a></div>
                                        <div class="icon-content p-l40">
                                            <h5 class="aon-tilte text-uppercase">Vision</h5>
                                            <p>{{$companyData['company_vision']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Company END -->
            <!-- counter -->
            <div class="section-full aon-our-services bg-gray bg-img-fix content-inner overlay-black-middle"
                 style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3 col-sm-6 m-b30">
                            <div class="p-a30 text-white text-center border-3">
                                <div class="icon-lg m-b20">
                                    <div class="icon-cell text-white"><i class="fa fa-building-o"></i></div>
                                </div>
                                <div class="counter font-26 font-weight-800 text-primary m-b5">1035</div>
                                <span>Completed Project</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-6 m-b30">
                            <div class="p-a30 text-white text-center border-3">
                                <div class="icon-lg m-b20">
                                    <div class="icon-cell text-white"><i class="fa fa-male"></i></div>
                                </div>
                                <div class="counter font-26 font-weight-800 text-primary m-b5">1124</div>
                                <span>Active Experts</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-6 m-b30">
                            <div class="p-a30 text-white text-center border-3">
                                <div class="icon-lg m-b20">
                                    <div class="icon-cell text-white"><i class="fa fa-male"></i></div>
                                </div>
                                <div class="counter font-26 font-weight-800 text-primary m-b5">834</div>
                                <span>Happy Clients</span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 col-sm-6 m-b10">
                            <div class="p-a30 text-white text-center border-3">
                                <div class="icon-lg m-b20">
                                    <div class="icon-cell text-white"><i class="fa fa-area-chart"></i></div>
                                </div>
                                <div class="counter font-26 font-weight-800 text-primary m-b5">538</div>
                                <span>Developer Hand</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Counter END-->
            <!-- Architecture -->
            <div class="section-full aon-our-team bg-white content-inner">
                <div class="container">
                    <div class="p-a30 bg-white m-b30">
                        <div class="section-head text-center">
                            <h2 class="text-uppercase">Our Team</h2>
                            <div class="dez-separator-outer ">
                                <div class="dez-separator bg-primary style-skew"></div>
                            </div>
                        </div>
                        <div class="section-content">
                            <div class="row">
                                @foreach($team as $tm)
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div class="dez-box m-b30">
                                            <div class="dez-media dez-media-right dez-img-overlay2 dez-img-effect zoom"> <a href="javascript:;"> <img width="358" height="460" src="{{asset('staffavatar/'.$tm->profile->avatar_medium)}}" alt=""> </a>
                                                <div class="dez-info-has ">
                                                    <ul class="dez-social-icon dez-social-icon-lg dez-border">
                                                        <li><a href="{{$tm->profile->facebook_account}}" class="fa fa-facebook fb-btn"></a></li>
                                                        <li><a href="{{$tm->profile->twitter_account}}" class="fa fa-twitter tw-btn"></a></li>
                                                        <li><a href="{{$tm->profile->linkedin_account}}" class="fa fa-linkedin link-btn"></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="p-a15">
                                                <h4 class="dez-title m-b5 text-capitalize"><a href="{{route('dev.profile',$tm->id)}}">{{$tm->name}}</a></h4>
                                                <span class="dez-member-position">{{$tm->profile->position}}</span> </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Architecture END -->
            <!-- What peolpe are saying -->
            <div class="section-full overlay-black-middle bg-img-fix content-inner-1"
                 style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
                <div class="container">
                    <div class="section-head text-white text-center">
                        <h2 class="text-uppercase">What peolpe are saying</h2>
                        <span class="title-small">Best Cleaning Deals</span>
                        <div class="after-titile-line"></div>
                    </div>
                    <div class="section-content">
                        <div class="testimonial-four owl-carousel owl-theme">
                            @foreach($reviews as $review)
                                <div class="item">
                                    <div class="testimonial-4 style-2">
                                        <div class="testimonial-pic"><img
                                                src="{{asset('userAvatars/'.$review->user->profile->avatar)}}" width="100"
                                                height="100" alt=""></div>
                                        <div class="testimonial-text">
                                            <p>{{$review->review}}</p>
                                        </div>
                                        <div class="testimonial-detail"><strong class="testimonial-name">{{$review->user->name}}</strong> <span class="testimonial-position">{{$review->user->profile->occupation}}</span></div>
                                        <div class="quote-right"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- What peolpe are saying END-->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
