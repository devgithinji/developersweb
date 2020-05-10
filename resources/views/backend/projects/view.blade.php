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
                            <h1>Projects Details View</h1>
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
                                    project: {{$project->name}}
                                </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Project Type</h5>
                                    <p>{{$project->service->name}}</p>
                                    <h5>Description</h5>
                                    <p> {{$project->description}}</p>
                                    <h5>Duration</h5>
                                    <p><strong>{{date('F j, Y',strtotime($project->start_date))}}</strong>
                                        To <strong>{{date('F j, Y',strtotime($project->completion_date))}}</strong></p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Client</h5>
                                    <p>{{$project->client->name}}</p>
                                    <h5>Status</h5>
                                    <p class="m-1">
                                    @if($project->status == 0)
                                        <p class="badge badge-danger">Not Commenced</p>
                                    @elseif($project->status == 1)
                                        <p class="badge badge-warning">In progress</p>
                                    @elseif($project->status == 2)
                                        <p class="badge badge-success">Complete</p>
                                        @endif
                                        </p>
                                </div>
                                <div class="col-md-4">
                                    <h5>Developers</h5>
                                    <p>
                                    @if($project->task->count()>0)
                                        @foreach(collect($project->task)->unique('developer_id') as $k=>$task)
                                            <p>{{++$k}}: {{$task->employee->name}} </p>
                                            <br>
                                        @endforeach
                                    @else
                                        <p>project has no defined tasks so no developers allocated</p>
                                    @endif
                                    </p>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 col-lg-12">
                                <div>
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title">Project Milestone(s)</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @foreach($project->milestone as $i=>$milestone)
                                            <div class="accordion" id="accord-{{$milestone->id}}">
                                                <div class="mb-2 acd-group">
                                                    <div class="card-header bg-primary rounded-0">
                                                        <h5 class="mb-0">
                                                            <a href="#collapse"
                                                               class="btn-block text-white text-left acd-heading collapsed"
                                                               data-toggle="collapse">{{++$i}}: {{$milestone->name}}</a>
                                                        </h5>
                                                    </div>
                                                    <div id="collapse" class="collapse"
                                                         data-parent="#accord-{{$milestone->id}}">
                                                        <div class="card-body">
                                                            <p>{{$milestone->description}}</p>
                                                            <h4 class="mt-3">Task(s)</h4>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless mb-0">
                                                                    <tbody>
                                                                    @foreach($milestone->task as $s=>$task)
                                                                        <tr>
                                                                            <th scope="row">{{++$s}}
                                                                                : {{$task->name}}</th>
                                                                            <td style="word-break: break-word;">{{$task->description}}</td>
                                                                            <td>
                                                                                {{$task->start_date}}
                                                                                <br>
                                                                                To:
                                                                                <br>
                                                                                {{$task->completion_date}}
                                                                            </td>
                                                                            <td>
                                                                                @if($task->status == 0)
                                                                                    <p class="badge badge-danger">Not
                                                                                        Commenced</p>
                                                                                @elseif($task->status == 1)
                                                                                    <p class="badge badge-warning">In
                                                                                        progress</p>
                                                                                @elseif($task->status == 2)
                                                                                    <p class="badge badge-success">
                                                                                        Complete</p>
                                                                                @endif
                                                                            </td>
                                                                            <td>{{$task->employee->name}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
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
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
