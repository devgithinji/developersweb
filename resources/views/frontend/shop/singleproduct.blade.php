@extends('frontend.master')
@section('content')
    <div class="page-content  bg-white">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Product Details</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Product Details</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- Product details -->
            <div class="container woo-entry">
                <div class="row m-b30 blog-post blog-md date-style-2">
                    <div class="col-md-4 col-lg-4 m-b30"><a href="#"><img
                                src="{{asset('productImage/'.$product->large_image)}}" alt=""></a></div>
                    <div class="col-md-8 col-lg-8">
                        <div class="dez-post-title ">
                            <h3 class="post-title"><a href="#">{{$product->name}}</a></h3>
                        </div>
                        <h2 class="m-tb15">${{$product->price}}</h2>
                        <div class="dez-post-text">
                            <p class="m-b10">{{$product->description}}</p>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td>Pricing</td>
                                <td>${{$product->price}}</td>
                            </tr>
                            <tr>
                                <td>Stock Availability</td>
                                <td>AVAILABLE</td>
                            </tr>
                            <tr>
                                <td>Rating</td>
                                <td><span class="rating-bx"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i
                                            class="fa fa-star-o"></i> </span></td>
                            </tr>
                        </table>
                        <form method="post" class="cart">
                            <div class="quantity btn-quantity pull-left m-r10">
                                <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                            </div>
                            <button class="btn btn-primary site-button pull-left"><i class="fa fa-cart-plus"></i> Add To
                                Cart
                            </button>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="dez-tabs border-tp product-description bg-tabs">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                        href="#web-design-5"><i class="fa fa-globe"></i> Description
                                    </a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#graphic-design-5"><i
                                            class="fa fa-photo"></i> Additional Information </a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="web-design-5" class="tab-pane active">
                                    <h4>Product Details</h4>
                                    <ul class="list-check-circle primary">
                                        @if($product->specification->count() > 0)
                                            @foreach($product->specification->pluck('specification') as $i=>$desc)
                                                <li>{{$desc}}</li>
                                                <br>
                                            @endforeach
                                        @else
                                            <li>No specifications added</li>
                                        @endif
                                    </ul>
                                </div>
                                <div id="graphic-design-5" class="tab-pane">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Pricing</td>
                                            <td>$52.00</td>
                                        </tr>
                                        <tr>
                                            <td>Stock Availability</td>
                                            <td>AVAILABLE</td>
                                        </tr>
                                        <tr>
                                            <td>Rating</td>
                                            <td><span class="rating-bx"> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
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
