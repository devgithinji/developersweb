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
                            <h1>Task List</h1>
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
                                <div class="col-md-8">
                                    <h3>Task List</h3>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('project.create')}}" class="btn btn-primary float-right">create
                                        new</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task Details</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Dates</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tasks as $row=>$task)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">
                                            Task: {{ucwords($task->name)}}
                                            <br>
                                            Project: {{ucwords($task->milestone->project->name)}}
                                            <br>
                                            Milestone: {{ucwords($task->milestone->name)}}
                                        </td>

                                        <td class="text-center">{{Str::limit($task->description,20)}}</td>

                                        <td class="text-center">
                                            @if($task->status == 0)
                                                <a type="button"
                                                   href="{{route('project.status.update',[$task->id,1])}}"
                                                   class="badge badge-danger-inverse">Incomplete</a>
                                            @elseif($task->status == 1)
                                                <a type="button"
                                                   href="{{route('project.status.update',[$task->id,0])}}"
                                                   class="badge badge-success-inverse">Complete</a>
                                            @elseif($task->status == 2)
                                                <a type="button"
                                                   href="{{route('project.status.update',[$task->id,0])}}"
                                                   class="badge badge-warning-inverse">In Progress</a>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            {{date('F d, Y',strtotime($task->start_date))}}
                                            <br>
                                            to
                                            <br>
                                            {{date('F d, Y',strtotime($task->completion_date))}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('milestone.task.edit',$task->id)}}"
                                               class="btn btn-round btn-inverse-success" type="button">edit</a>
                                            <a href="{{route('milestone.task.view',$task->id)}}"
                                               class="btn btn-round btn-inverse-primary" type="button">view</a>
                                            <a href="{{route('milestone.task.delete',$task->id)}}"
                                               class="btn btn-round btn-inverse-danger" id="delete"
                                               type="button">delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
