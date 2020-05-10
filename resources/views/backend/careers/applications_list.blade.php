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
                            <h1>Careers</h1>
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
                                    <h3>Job Application List</h3>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('career.create')}}" class="btn btn-primary float-right">create
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
                                    <th>Details</th>
                                    <th>Description</th>
                                    <th>Dates</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applications as $row=>$application)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td>
                                            <strong>Applicant Name:</strong> {{$application->user->name}}
                                            <br>
                                            <strong>Job name:</strong> {{$application->job->title}}
                                            <br>
                                        </td>
                                        <td class="text-center">
                                            {{Str::limit($application->description,20)}}
                                        </td>

                                        <td class="text-center">
                                            {{date('F d, Y',strtotime($application->created_at))}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('career.application.view',$application->id)}}"
                                               class="btn btn-icon btn-outline-success btn-round mr-2 mb-2 mb-sm-0"
                                               type="button"><i class="ti ti-eye"></i></a>
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
