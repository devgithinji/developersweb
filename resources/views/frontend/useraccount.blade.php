@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Account: {{ucwords(Auth::user()->name)}}</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>My Account</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area tabs-section">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-12 p-b30">
                                <h2 class="text-uppercase m-b30">Account Management Portal</h2>
                                <div class="dez-tabs bg-tabs vertical  border">
                                    <ul class="nav  nav-tabs">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                                href="#web-design-10"><i class="fa fa-globe"></i> <span
                                                    class="title-head">Profile</span></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                                href="#graphic-design-10"><i class="fa fa-photo"></i>
                                                <span class="title-head">proposals</span></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#projects"><i class="fa fa-file"></i> <span
                                                    class="title-head">Projects</span></a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab"
                                                                href="#developement-10"><i class="fa fa-cog"></i> <span
                                                    class="title-head">Reviews</span></a></li>

                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#downloads"><i class="fa fa-download"></i> <span
                                                    class="title-head">Downloads</span></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="web-design-10" class="tab-pane active">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="icon-bx-wraper bx-style-2 m-t40 m-b30 p-a30 center">
                                                        <div class="icon-bx-sm text-primary bg-white radius border-2 m-b20">
                                                            <a href="#" class="icon-cell"><img src="{{asset('userAvatars/'.Auth::user()->profile->avatar)}}" width="100" height="100" alt=""></a>
                                                        </div>
                                                        <div class="icon-content p-t40">
                                                            <h5 class="dez-tilte text-uppercase">{{Auth::user()->name}}</h5>
                                                            <p>{{Auth::user()->email}}</p>
                                                            <p>{{Auth::user()->profile->phone}}</p>
                                                            <p>{{Auth::user()->profile->address}}</p>
                                                            <p><strong>Member since:</strong> {{date('F j,Y'),strtotime(Auth::user()->created_at)}}
                                                            </p>
                                                            @if(Auth::user()->projects->count() > 0)
                                                                <p>
                                                                    <strong>Projects:</strong> {{Auth::user()->projects->count()}}
                                                                </p>
                                                                <a href="{{route('proposal.create')}}"
                                                                   class="site-button outline blue m-r15"
                                                                   type="button">Make Project Proposal</a>
                                                            @else
                                                                <a href="{{route('proposal.create')}}"
                                                                   class="site-button outline blue m-r15"
                                                                   type="button">Make Project Proposal</a>
                                                                <br><br><br>
                                                            @endif
                                                            <a href="{{route('user.profile.edit')}}"
                                                               class="site-button outline blue m-r15"
                                                               type="button">Edit Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="graphic-design-10" class="tab-pane">
                                            <div class="section-head text-center">
                                                <h2 class="text-uppercase">Projects List</h2>
                                                <div class="dez-separator-outer ">
                                                    <div class="dez-separator bg-primary style-skew"></div>
                                                </div>
                                                <a href="{{route('proposal.create')}}"
                                                   class="site-button outline blue m-r15"
                                                   type="button">Make New Project Proposal</a>
                                            </div>
                                            <div class="row justify-content-center">
                                                @foreach($proposals as $proposal)
                                                    <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                                        <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                                            <div class="icon-bx-sm radius bg-primary m-b20"><a href="#" class="icon-cell"><i class="fa fa-user"></i></a></div>
                                                            <div class="icon-content">
                                                                <h5 class="dez-tilte text-uppercase">{{$proposal->name}}</h5>
                                                                <p>{{Str::limit($proposal->description,70)}}</p>
                                                                <a class="site-button outline blue m-r15"
                                                                   type="button"
                                                                   href="{{route('proposal.view',$proposal->id)}}">View</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div id="projects" class="tab-pane">
                                            <div class="section-head text-center">
                                                <h2 class="text-uppercase">Projects List</h2>
                                                <div class="dez-separator-outer ">
                                                    <div class="dez-separator bg-primary style-skew"></div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                @if($projects->count()> 0)
                                                    @foreach($projects as $project)
                                                        <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                                            <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                                                <div class="icon-bx-sm radius bg-primary m-b20"><a
                                                                        href="#"
                                                                        class="icon-cell"><i
                                                                            class="fa fa-user"></i></a></div>
                                                                <div class="icon-content">
                                                                    <h5>Name</h5>
                                                                    <p>{{$project->name}}</p>
                                                                    <h5 class="dez-tilte text-uppercase">{{date('F j,Y',strtotime($project->created_at))}}</h5>
                                                                    <p>{{Str::limit($project->description,70)}}</p>
                                                                    <a class="site-button outline blue m-r15"
                                                                       type="button"
                                                                       href="{{route('project.view',$project->id)}}">Read
                                                                        More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>No projects yet</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="developement-10" class="tab-pane">
                                            <div class="section-head text-center">
                                                <h2 class="text-uppercase">Reviews List</h2>
                                                <div class="dez-separator-outer ">
                                                    <div class="dez-separator bg-primary style-skew"></div>
                                                </div>
                                                <a href="{{route('review.create')}}"
                                                   class="site-button outline blue m-r15"
                                                   type="button">Make New Review</a>
                                            </div>
                                            <div class="row justify-content-center">
                                                @if($reviews->count()> 0)
                                                    @foreach($reviews as $review)
                                                        <div class="col-lg-4 col-md-6 col-sm-6 m-b30">
                                                            <div class="icon-bx-wraper bx-style-1 p-a30 center">
                                                                <div class="icon-bx-sm radius bg-primary m-b20"><a
                                                                        href="#"
                                                                        class="icon-cell"><i
                                                                            class="fa fa-user"></i></a></div>
                                                                <div class="icon-content">
                                                                    <h5 class="dez-tilte text-uppercase">{{date('F j,Y',strtotime($review->created_at))}}</h5>
                                                                    <p>{{Str::limit($review->review,70)}}</p>
                                                                    <a class="site-button outline blue m-r15"
                                                                       type="button"
                                                                       href="{{route('client.review.view',$review->id)}}">Read
                                                                        More</a>
                                                                    <a class="site-button outline blue m-r15"
                                                                       type="button"
                                                                       href="{{route('review.edit',$review->id)}}">Edit</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <p>No reviews made yet</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div id="downloads" class="tab-pane">
                                            <div class="section-head text-center">
                                                <h2 class="text-uppercase">Downloads</h2>
                                                <div class="dez-separator-outer ">
                                                    <div class="dez-separator bg-primary style-skew"></div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Left & right section  END -->
        </div>
    </div>
@endsection
