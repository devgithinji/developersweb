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
                            <h1>Task Details View</h1>
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
                                <h4 class="card-title">
                                    project: {{$task->milestone->project->name}}
                                    <br>
                                    milestone: {{$task->milestone->name}}
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5>Task name</h5>
                            <p>{{$task->name}}</p>
                            <h5>Description</h5>
                            <p> {{$task->description}}</p>
                            <h5>Developer</h5>
                            <p> {{$task->employee->name}}</p>
                            <h5>Duration</h5>
                            <p>{{date('F j, Y',strtotime($task->start_date))}} to {{date('F j, Y',strtotime($task->completion_date))}}</p>
                            <h5>Status</h5>
                            <p class="m-1">
                            @if($task->status == 0)
                                <p class="badge badge-danger">Not Commenced</p>
                            @elseif($$task->status == 1)
                                <p class="badge badge-warning">In progress</p>
                            @elseif($task->status == 2)
                                <p class="badge badge-success">Complete</p>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
