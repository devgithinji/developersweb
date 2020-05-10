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
                            <h1>Product Specifications Create</h1>
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
                <div class="col-md-12 mt-3">
                    <div class="card card-statistics p-3">
                        <div class="card-header">
                            <div class="card-heading">
                                <h4 class="card-title">{{$product->name}} Specifications Create</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Specifications</h4>
                                    <form action="{{route('shop.product.storespecs',$product->id)}}" method="POST">
                                        @csrf
                                        <div class="form-row" id="inputfieldsContainer">
                                            <div class="form-group col-md-8">
                                                <input type="text" class="form-control" name="specification[]"
                                                       id="inputEmail4" placeholder="Specification">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <button class="btn btn-primary" id="addMore">Add</button>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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
    <script>
        window.onload = function () {
            $('#addMore').on('click', function (e) {
                e.preventDefault();
                $('#inputfieldsContainer').append('<div class="form-inline col-md-12 my-2"> <input type="text" class="form-control col-md-8" name="specification[]" id="inputEmail4" placeholder="Specification"> <button class="btn btn-primary ml-2" id="remove">remove</button> </div>')
            });

            $('#inputfieldsContainer').on('click','#remove',function (e) {
                e.preventDefault();
                $(this).parent('div').remove();
            });
        }
    </script>
@endsection
