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
                            <h1>Career Details View</h1>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <nav>
                                <ol class="breadcrumb p-0 m-b-0">
                                    <li class="breadcrumb-item">
                                        <a href="index-2.html"><i class="ti ti-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        Forms
                                    </li>
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Elements</li>
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
                <div class="col-md-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">{{$career->title}} position
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Job Description</h5>
                                    <p> {{$career->description}}</p>
                                    <h5>Work Status</h5>
                                    <p>{{$career->work_status}}</p>
                                    <h5>Qualifications</h5>
                                    <p>{{$career->qualifications}}</p>
                                    <h5>Experience</h5>
                                    <p>{{$career->experience}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Salary</h5>
                                    <p>{{$career->salary}}</p>
                                    <h5>Published At</h5>
                                    <p><strong>{{date('F j, Y',strtotime($career->created_at))}}</strong>
                                    <h5>Application Deadline</h5>
                                    <p><strong>{{date('F j, Y',strtotime($career->deadline))}}</strong>
                                </div>
                            </div>
                            <hr>
                           <h5>Responsibilities</h5>
                            <br>
                            @if($career->resposibility->count() > 0)
                                @foreach($career->resposibility->pluck('description') as $i=>$desc)
                                    <p> <strong>{{++$i}}:</strong> {{$desc}}</p>
                                    <br>
                                @endforeach
                            @else
                                <p>No responsibilities added</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
