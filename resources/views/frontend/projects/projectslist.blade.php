@extends('frontend.master')
@section('content')
    <div class="page-content  bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Projects</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Projects</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner">
            <!-- Product details -->
            <div class="container-fluid">
                <!-- Gallery -->
                <div class="site-filters clearfix center m-b40">
                    <ul class="filters">
                        <a href="{{route('projects')}}" class="site-button blue m-b10 button-skew">
                            <span>Show All</span></a>

                        @foreach($categories as $category)
                            <a href="{{route('showcase.project.category',$category->id)}}"
                               class="site-button-secondry m-b10 button-skew">
                                <span>{{$category->name}}</span></a>
                        @endforeach
                    </ul>
                </div>
                <div class="clearfix">
                    <ul id="masonry" class="row dez-gallery-listing m-b0 gallery-grid-4 mfp-gallery">
                        @foreach($projects as $project)
                            <li class="home card-container col-lg-3 col-md-3 col-sm-6">
                                <div class="dez-box dez-gallery-box">
                                    <div class="dez-thum dez-img-overlay1 dez-img-effect zoom-slow"><a
                                            href="{{route('single.showcase.project',$project->id)}}"> <img
                                                src="{{asset('projectImage/'.$project->photo->pluck('small_photo')[1])}}"
                                                alt=""> </a>
                                        <div class="overlay-bx">
                                            <div class="overlay-icon">
                                                <h2 class="m-t0 text-white">{{$project->name}}</h2>
                                                <div class="clearfix m-b15">
                                                    <div class="dez-separator bg-white"></div>
                                                </div>
                                                <a href="{{route('single.showcase.project',$project->id)}}" title="visit project">
                                                    <i class="fa fa-link icon-bx-xs radius-sm"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Gallery END -->
            </div>
            <!-- Product details -->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
