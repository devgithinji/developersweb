@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Projects Details</h1>
                    <div class="dez-separator bg-primary"></div>
                    <h3 class="text-white max-w800">{{$project->name}}</h3>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Projects Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full bg-white content-inner">
            <!-- About Company -->
            <div class="container">
                <div class="row m-b30">
                    <div class="col-lg-9 col-md-8 col-sm-6">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <h3>{{$project->name}}</h3>
                                <div class="dez-box">
                                    <div class="dez-media">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <a href="#"><img class="img-thumbnail"
                                                                 src="{{asset('projectImage/'.$project->photo->pluck('large_photo')[0])}}"
                                                                 alt=""></a>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="#"><img class="img-thumbnail"
                                                                 src="{{asset('projectImage/'.$project->photo->pluck('large_photo')[1])}}"
                                                                 alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dez-info m-t30 ">
                                        <h4 class="dez-title m-t0"><a href="#">Description</a></h4>
                                        <p>{{$project->description}} </p>
                                        <h4>Check it on</h4>
                                        <p><a href="{{$project->link}}">Project Link</a></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="side-sticky">
                            <div class="icon-bx-wraper bx-style-1 p-a30 center m-b15">
                                <div class="icon-bx-sm text-primary bg-white radius border-2 m-b20"><a href="#"
                                                                                                       class="icon-cell"><i
                                            class="fa fa-user"></i></a></div>
                                <div class="icon-content">
                                    <h5 class="dez-tilte text-uppercase">Recent Highlights</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                        euismod [...]</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-content m-b30">
                    <div class="portfolio-carousel mfp-gallery owl-carousel gallery owl-btn-center-lr">
                        @foreach($photos as $photo)
                            <div class="item">
                                <div class="ow-portfolio">
                                    <div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="{{asset('projectImage/'.$photo->small_photo)}}" alt="">
                                        <div class="overlay-bx">
                                            <div class="overlay-icon"> <a href="{{$project->link}}" class="mfp-link"> <i class="fa fa-link icon-bx-xs"></i> </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- About Company END -->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
