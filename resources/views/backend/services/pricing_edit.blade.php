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
                            <h1>Service Price edit</h1>
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
                                    <li class="breadcrumb-item active text-primary" aria-current="page">Form Layouts
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end page title -->
                </div>
            </div>
            <!-- end row -->
            <!-- begin row -->
            <div class="row justify-content-center">
                <div class="col-md-10 mt-3">
                    <div class="card card-statistics p-3">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">Service Price edit</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('prices.update',$price->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$price->name}}">
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback d-block">{{$errors->first('name')}}</div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="price" class="form-control" placeholder="Price" value="{{$price->price}}">
                                    @if($errors->has('price'))
                                        <div class="invalid-feedback d-block">{{$errors->first('price')}}</div>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="2" name="desc1">
                                        {{$price->desc1}}
                                    </textarea>
                                    @if($errors->has('desc1'))
                                        <div class="invalid-feedback d-block">{{$errors->first('desc1')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="2" name="desc2">
                                         {{$price->desc2}}
                                    </textarea>
                                    @if($errors->has('desc2'))
                                        <div class="invalid-feedback d-block">{{$errors->first('desc2')}}</div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="2" name="desc3">
                                         {{$price->desc3}}
                                    </textarea>
                                    @if($errors->has('desc3'))
                                        <div class="invalid-feedback d-block">{{$errors->first('desc3')}}</div>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
@endsection
