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
                                    <h3>Careers List</h3>
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
                                    <th>Career Details</th>
                                    <th>Description</th>
                                    <th>Responsibilities</th>
                                    <th>Dates</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($careers as $row=>$career)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td>
                                            <strong>Title:</strong> {{$career->title}}
                                            <br>
                                            <strong>Work status:</strong> {{$career->work_status}}
                                            <br>
                                            <strong>Experience:</strong> {{$career->experience}}
                                            <br>
                                            <strong>Qualifications:</strong>
                                            <br>
                                            {{Str::limit($career->qualifications,20)}}
                                            <br>
                                            <strong>Location:</strong> {{$career->location}}
                                            <br>
                                            <strong>Salary:</strong> {{$career->salary}}
                                        </td>
                                        <td class="text-center">
                                            {{Str::limit($career->description,20)}}
                                        </td>
                                        <td>

                                            @if($career->resposibility->count() > 0)
                                                @foreach($career->resposibility->pluck('description') as $i=>$desc)
                                                    {{++$i}}: {{Str::limit($desc,20)}}
                                                    <br>
                                                @endforeach
                                                    <br>
                                                <a type="button"
                                                   href="{{route('career.res.edit',[$career->id])}}"
                                                   class="badge badge-warning-inverse">Edit</a>
                                            @else

                                                <a type="button"
                                                   href="{{route('career.res.create',[$career->id])}}"
                                                   class="badge badge-danger-inverse">Add</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            {{date('F d, Y',strtotime($career->created_at))}}
                                            <br>
                                            To
                                            <br>
                                            {{date('F d, Y',strtotime($career->deadline))}}
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('career.view',$career->id)}}"
                                               class="btn btn-icon btn-outline-success btn-round mr-2 mb-2 mb-sm-0"
                                               type="button"><i class="ti ti-eye"></i></a>
                                            <a href="{{route('career.edit',$career->id)}}"
                                               class="btn btn-icon btn-outline-primary btn-round mr-2 mb-2 mb-sm-0"
                                               type="button"><i class="ti ti-pencil"></i></a>
                                            <a href="{{route('career.delete',$career->id)}}" class="btn btn-icon btn-outline-danger btn-round"
                                               type="button"><i class="ti ti-close"></i></a>
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
