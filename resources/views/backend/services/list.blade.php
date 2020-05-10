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
                            <h1>{{$page_name}}</h1>
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
                                    <h3>{{$page_name}}</h3>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('services.create')}}" class="btn btn-primary float-right">create
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
                                    <th>Name</th>
                                    <th>Icon/image</th>
                                    <th>Description</th>
                                    <th>status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $row=>$service)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">{{ucwords($service->name)}}</td>
                                        <td class="text-center">
                                            <span class="badge badge-success-inverse" style="font-size: 22px;"><i class="{{$service->icon}}"></i></span>
                                            <br>
                                            <img class="img-thumbnail mt-2" src="{{asset('serviceImages/'.$service->small_photo)}}" alt="">
                                        </td>

                                        <td class="text-center">{{Str::limit($service->description,50)}}</td>

                                        <td class="text-center">
                                            @if($service->status == 0)
                                                <a type="button" href="{{route('services.status.update',[$service->id,1])}}" class="badge badge-danger-inverse">Inactive</a>
                                            @else
                                                <a type="button" href="{{route('services.status.update',[$service->id,0])}}" class="badge badge-success-inverse">Active</a>
                                            @endif
                                        </td>

                                        <td class="text-center">{{date('F d, Y',strtotime($service->created_at))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('services.edit',$service->id)}}" class="btn btn-round btn-inverse-success" type="button">edit</a>
                                            <a href="{{route('services.delete',$service->id)}}" class="btn btn-round btn-inverse-danger" id="delete" type="button">delete</a>
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
