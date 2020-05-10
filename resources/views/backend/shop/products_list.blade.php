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
                            <h1>Product list</h1>
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
                                    <h3>Product list</h3>
                                </div>
                                <div class="col-md-4">
                                    <a href="{{route('shop.product.create')}}" class="btn btn-primary float-right">create
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
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Specifications</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $row=>$product)
                                    <tr>
                                        <td class="text-center">{{++$row}}</td>
                                        <td>
                                            <strong>Name:</strong> {{ucwords($product->name)}}
                                            <br>
                                            <strong> Price:</strong> {{$product->price}}
                                            <br>
                                            <strong> Quantity:</strong> {{$product->quantity}}
                                            <br>
                                            <strong> Category:</strong> {{$product->category->name}}
                                            <br>
                                            <strong> Created
                                                At:</strong> {{date('F d, Y',strtotime($product->created_at))}}
                                            <br>
                                            @if($product->status == 0)
                                                <a type="button"
                                                   href="{{route('shop.product.statusupdate',[$product->id,1])}}"
                                                   class="badge badge-danger-inverse">Inactive</a>
                                            @else
                                                <a type="button"
                                                   href="{{route('shop.product.statusupdate',[$product->id,0])}}"
                                                   class="badge badge-success-inverse">Active</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <img class="img-thumbnail"
                                                 src="{{asset('productImage/'.$product->small_image)}}" alt="">
                                        </td>
                                        <td class="text-center">{{Str::limit(ucwords($product->description),20)}}</td>

                                        <td>
                                            @if($product->specification->count() > 0)
                                                @foreach($product->specification->pluck('specification') as $i=>$specification)
                                                    <p>{{++$i}}: {{Str::limit($specification,20)}}</p>
                                                    <br>
                                                @endforeach
                                                <a type="button"
                                                   href="{{route('shop.product.editspecs',[$product->id,0])}}"
                                                   class="badge badge-warning-inverse">Edit Specs</a>
                                            @else
                                                <a type="button"
                                                   href="{{route('shop.product.createspecs',[$product->id,0])}}"
                                                   class="badge badge-success-inverse">Add Specs</a>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('shop.product.edit',$product->id)}}"
                                               class="btn btn-round btn-inverse-success" type="button">edit</a>
                                            <a href="{{route('shop.product.view',$product->id)}}"
                                               class="btn btn-round btn-inverse-warning" type="button">view</a>
                                            <a href="{{route('shop.product.delete',$product->id)}}"
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
