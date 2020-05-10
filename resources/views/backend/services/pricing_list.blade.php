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
                            <h1>Service Pricing</h1>
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
                                    <h3>Service Pricing</h3>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('prices.create')}}" class="btn btn-primary float-right">create
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
                                    <th>Price</th>
                                    <th>Desc one</th>
                                    <th>Desc two</th>
                                    <th>Desc three</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prices as $row=>$price)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td class="text-center">{{ucwords($price->name)}}</td>

                                        <td class="text-center">{{ucwords($price->price)}}</td>

                                        <td class="text-center">
                                            {{$price->desc1}}
                                        </td>

                                        <td class="text-center">
                                            {{$price->desc2}}
                                        </td>

                                        <td class="text-center">
                                            {{$price->desc3}}
                                        </td>

                                        <td class="text-center">{{date('F d, Y',strtotime($price->created_at))}}</td>
                                        <td class="text-center">
                                            <a href="{{route('prices.edit',$price->id)}}" class="btn btn-round btn-inverse-success" type="button">edit</a>
                                            <a href="{{route('prices.delete',$price->id)}}" class="btn btn-round btn-inverse-danger" id="delete" type="button">delete</a>
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
