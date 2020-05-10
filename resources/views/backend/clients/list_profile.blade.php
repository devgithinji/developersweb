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
                            <h1>Users Profiles</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Tables
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Data Table</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-statistics">
                        <div class="card-header container-fluid">
                            <div class="row">
                                <h3 class="ml-3">User Profiles Details</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($users as $user)
                                <div class="col-xl-4 col-sm-6">
                                    <div class="card card-statistics employees-contant px-2">
                                        <div class="card-body pb-5 pt-4">
                                            <div class="text-center">
                                                <div class="text-right">
                                                    <h4><span class="badge badge-primary badge-pill px-3 py-2">{{$user->projects->count()}} projects</span>
                                                    </h4>
                                                </div>
                                                <div class="pt-1 bg-img m-auto"><img
                                                        src="{{asset('userAvatars/'.$user->profile->avatar)}}"
                                                        class="img-fluid" alt="employees-img"></div>
                                                <div class="mt-3 employees-contant-inner">
                                                    <h4 class="mb-1">{{$user->name}}</h4>
                                                    <h5 class="mb-0 text-muted">{{$user->profile->occupation}}</h5>
                                                    <h5 class="mb-0 text-muted">{{$user->profile->phone}}</h5>
                                                    <h5 class="mb-0 text-muted">{{$user->email}}</h5>
                                                    <h5 class="mb-0 text-muted">{{$user->profile->address}}</h5>
                                                    <div class="mt-3 ">
                                                        @if($user->projects->count() == null)
                                                            No projects
                                                        @else
                                                            @foreach($user->projects->pluck('name') as $project)
                                                                <span
                                                                    class="badge badge-pill badge-success-inverse px-3 py-2">{{$project->name}}</span>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
