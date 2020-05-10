@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Project View</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Project View</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area tabs-section">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Project View</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                    </div>
                    <div class="section-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <p>{{$project->name}}</p>
                                    <label for="">Description</label>
                                    <p>{{$project->description}}</p>
                                    <label for="">Dates</label>
                                    <p>{{date('F j,Y',strtotime($project->start_date))}}
                                        To {{date('F j,Y',strtotime($project->completion_date))}}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Developers</label>
                                    @if($project->task->count()>0)
                                        @foreach(collect($project->task)->unique('developer_id') as $k=>$task)
                                            <p>{{++$k}}: {{$task->employee->name}}</p>
                                            <br>
                                        @endforeach
                                    @else
                                        <p>project has no defined tasks so no developers allocated</p>
                                    @endif
                                    <label for="">Project Status</label>
                                    <br>
                                    @if($project->status == 2)
                                        <span class="badge badge-success">complete</span>
                                    @elseif($project->status == 1)
                                        <span class="badge badge-warning">incomplete</span>
                                    @else
                                        <span class="badge badge-danger">not started</span>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12 m-b30">
                                <h2 class="m-b10 m-t0">Project Milestones</h2>
                                <p>This shows a clear prose of the project development process.</p>
                                @if($project->milestone->count()>0)
                                    @foreach($project->milestone as $milestone)
                                        <div class="dez-accordion space" id="accordion1">
                                            <div class="panel">
                                                <div class="acod-head">
                                                    <h6 class="acod-title">
                                                        <a data-toggle="collapse" href="#" data-target="#collapseTwo1"
                                                           aria-expanded="false" class="collapsed">
                                                            <i class="fa fa-question-circle"></i> {{$milestone->name}}
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="collapseTwo1" class="acod-body collapse"
                                                     data-parent="#accordion1">
                                                    <div class="m-3">
                                                        <h5>Milestone description</h5>
                                                        <p>{{$milestone->description}}</p>
                                                        <h5>Project Task(s)</h5>
                                                        @foreach($milestone->task as $i=>$task)
                                                            <h6> {{++$i}}: {{$task->name}}</h6>
                                                            <p> Dates: {{date('F j,Y',strtotime($task->start_date))}}
                                                                To {{date('F j,Y',strtotime($task->completion_date))}} </p>
                                                            <p>
                                                                Status:
                                                                @if($task->status > 0)
                                                                    <span class="badge badge-success">complete</span>
                                                                @else
                                                                    <span class="badge badge-warning">incomplete</span>
                                                                @endif
                                                            </p>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No milestones allocated to this project</p>
                                @endif
                               <div class="text-center">
                                   <span class="badge badge-warning p-3">for any issues <br><br> <strong class="text-white m-3">projectmanager@densoftdevelopers.com</strong></span>
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
