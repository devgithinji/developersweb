@extends('frontend.master')
@section('content')
    <div class="page-content bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Career</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Career</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- Career -->
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-9 col-md-8 m-b30">
                        <h1 class="m-b20 m-t0">Openings </h1>
                        <div class="dez-separator bg-primary"></div>
                        <p><strong>To respond to the current job openings please click the apply button or email the
                                Human resource Manager </strong></p>
                        @foreach($careers as $career)
                            <h2 class="m-t30 m-b10 ">{{$career->title}}</h2>
                            <ul class="list-angle-right">
                                <li><strong>Work Status:</strong>{{$career->work_status}}</li>
                                <li><strong>Qualifications:</strong>{{$career->qualifications}}</li>
                                <li><strong>Experience:</strong>{{$career->experience}}</li>
                                <li><strong>Location:</strong>{{$career->location}} </li>
                                <li><strong>Salary:</strong>{{$career->salary}} </li>
                                <li><strong>Deadline:</strong>{{date('F j, Y',strtotime($career->deadline))}} </li>
                            </ul>
                            <p>{{$career->description}}</p>

                            <h3>Responsibilities</h3>
                            <ul class="list-check-circle primary">
                                @if($career->resposibility->count() > 0)
                                    @foreach($career->resposibility->pluck('description') as $i=>$desc)
                                        <li> {{$desc}}</li>
                                    @endforeach
                                @else
                                    <p>No responsibilities added</p>
                                @endif
                            </ul>
                            <a href="{{route('careers.application',$career->id)}}" class="site-button button-skew"><span>Apply Now</span><i class="fa fa-angle-right"></i></a>
                        @endforeach
                    </div>
                    <!-- Left part start END -->
                    <!-- Right part start -->
                    <div class="col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center m-b15">
                                    <div class="icon-bx-sm text-primary bg-white radius border-2 m-b20"><a href="#"
                                                                                                           class="icon-cell"><i
                                                class="fa fa-user"></i></a></div>
                                    <div class="icon-content">
                                        <h5 class="dez-tilte text-uppercase">Recent Highlights</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                            nibh euismod [...]</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-6">
                                <div class="icon-bx-wraper bx-style-1 p-a30 center m-b15">
                                    <div class="icon-bx-sm text-primary bg-white radius border-2 m-b20"><a href="#"
                                                                                                           class="icon-cell"><i
                                                class="fa fa-building-o"></i></a></div>
                                    <div class="icon-content">
                                        <h5 class="dez-tilte text-uppercase">Recent Highlights</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy
                                            nibh euismod [...]</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="icon-bx-wraper bx-style-1 p-a20 left">
                                    <div class="icon-bx-xs text-primary bg-white radius border-2 "><a href="#"
                                                                                                      class="icon-cell"><i
                                                class="fa fa-code"></i></a></div>
                                    <div class="icon-content">
                                        <h5 class="dez-tilte text-uppercase">Content title</h5>
                                        <p>Lorem ipsum dolor sit elit nonummy dolor is euismod end [...]</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Right part start END -->
                </div>
            </div>
            <!-- Career END -->
        </div>
        <!-- contact area END -->
    </div>
@endsection
