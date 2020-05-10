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
                            <h1>Product Details View</h1>
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
                                <h4 class="card-title">{{$product->name}} </h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Description</h5>
                                    <p> {{$product->description}}</p>
                                    <h5>Price</h5>
                                    <p>{{$product->price}}</p>
                                    <h5>Quantity</h5>
                                    <p>{{$product->quantity}}</p>
                                    <h5>Status</h5>
                                    @if($product->status > 0)
                                        <p class="badge badge-success">active</p>
                                    @else
                                        <p class="badge badge-danger">inactive</p>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <h5>Published At</h5>
                                    <p><strong>{{date('F j, Y',strtotime($product->created_at))}}</strong>
                                    <h5>Image</h5>
                                    <img class="img-thumbnail" src="{{asset('productImage/'.$product->medium_image)}}" alt="">
                                </div>
                            </div>
                            <hr>
                            <h5>Specifications</h5>
                            <br>
                            @if($product->specification->count() > 0)
                                @foreach($product->specification->pluck('specification') as $i=>$desc)
                                    <p><strong>{{++$i}}:</strong> {{$desc}}</p>
                                    <br>
                                @endforeach
                            @else
                                <p>No specifications added</p>
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
