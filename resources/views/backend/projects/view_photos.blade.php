@extends('backend.master')
@section('content')
    <div class="app-main" id="main">
        <!-- begin container-fluid -->
        <div class="container-fluid">
            <!-- begin row -->
            <div class="row">
                <div class="col-md-12 m-b-30">
                    <!-- begin page title -->
                    <div class="d-block d-sm-flex flex-nowrap align-items-center">
                        <div class="page-title mb-2 mb-sm-0">
                            <h1>{{$project->name}} Gallery</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Pages
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->


            <!--start gallery -->
            <div class="row magnific-wrapper">
                @foreach($photos as $photo)
                    <div class="col-xl-3 col-md-4 col-sm-6">
                        <div class="card card-statistics text-center">
                            <div class="card-body p-0">
                                <div class="portfolio-item">
                                    <img src="{{asset('projectImage/'.$photo->small_photo)}}" alt="gallery-img">
                                    <div class="portfolio-overlay">
                                        <h4 class="text-white"><a href="{{route('project.photo.delete',$photo->id)}}">Delete Image</a></h4>
                                    </div>
                                    <a class="popup portfolio-img view" href="{{asset('projectImage/'.$photo->large_photo)}}"><i class="fa fa-arrows-alt"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--end gallery-->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
