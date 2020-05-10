@extends('frontend.master')
@section('content')
    <div class="page-content  bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Shopping Cart</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Shopping Cart</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner">
            <!-- Product details -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="woo-entry">
                            @if (Session::has('success'))
                                <div class="alert alert-success"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Success!</strong> {{session('success')}}</div>
                            @elseif(Session::has('error'))
                                <div class="alert alert-danger"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <strong>Error!</strong> {{session('error')}}</div>
                            @endif
                            <table class="table-bordered dez-cart-tbl">
                                <thead class="text-center bg-primary">
                                <tr>
                                    <th>IMAGE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>PRICE</th>
                                    <th>TOTAL</th>
                                    <th>REMOVE</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr class="alert">
                                        <td data-title="Code">
                                            <img src="{{asset('productImage/'.$product->pdct->small_image)}}" alt="">
                                        </td>
                                        <td data-title="Company">{{$product->pdct->name}}</td>
                                        <td data-title="Price">
                                           1 unit price $ {{$product->pdct->price}}
                                            <br>
                                           Quantity {{$product->quantity}}
                                        </td>
                                        <td data-title="Change %">
                                            $ {{$product->total}}
                                        </td>
                                        <td data-title="Open">
                                            <a class="site-button orange radius-xl  m-r15" href="{{route('cart.remove',$product->id)}}" type="button">Remove</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-right">
                                <a href="#" class="m-b15 site-button m-l15 text-uppercase">Continue Shopping</a>
                                <table class="table-bordered dez-cart-tbl total">
                                    <thead class="text-left bg-primary">
                                    <tr>
                                        <th>TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td data-title="Total">$ {{array_sum($products->pluck('total')->toArray())}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product details -->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
