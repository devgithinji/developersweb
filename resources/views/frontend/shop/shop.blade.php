@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">{{config('app.name')}} Shop</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>{{config('app.name')}} Shop</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-inner section-full bg-white">
            <!-- Product -->
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 col-sm-6">
                        <div class="widget bg-white">
                            <h4 class="widget-title">Search</h4>
                            <div class="search-bx">
                                <form role="search" method="post">
                                    <div class="input-group">
                                        <input name="text" class="form-control" placeholder="Write your text"
                                               type="text">
                                        <span class="input-group-btn">
										<button type="submit" class="site-button"><i class="fa fa-search"></i></button>
										</span></div>
                                </form>
                            </div>
                        </div>
                        <div class="widget bg-white widget_services">
                            <h4 class="widget-title">Product Categories</h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li><a href="{{route('category.products',$category->id)}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-7 col-sm-6">
                        <div class="text-center m-b30">
                            <h2 class="m-t0">Our Products</h2>
                            <div class="dez-separator-outer ">
                                <div class="dez-separator bg-primary style-skew"></div>
                            </div>
                        </div>
                        <div class="row" id="masonry">
                            @foreach($products as $product)
                                <div class="col-md-6 col-lg-4 col-sm-12 m-b30 product-item card-container">
                                    <div class="dez-box ">
                                        <div class="dez-thum-bx  dez-img-effect "><img
                                                src="{{asset('productImage/'.$product->medium_image)}}" alt="">
                                            <div class="overlay-bx">
                                                <div class="overlay-icon">
                                                    <a href="{{route('cart.add',$product->id)}}"> <i
                                                            class="fa fa-cart-plus icon-bx-xs"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dez-info p-a20 text-center">
                                            <h4 class="dez-title m-t0 text-uppercase">
                                                <a href="{{route('shop.product',$product->id)}}">{{$product->name}}</a>
                                            </h4>
                                            <h2 class="m-b0">
                                                $ {{$product->price}}
                                            </h2>
                                            <div class="m-t20">
                                                <a href="{{route('cart.add',$product->id)}}" class="site-button">Add To
                                                    Cart </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row float-right">
                            {{$products->links()}}
                        </div>
                        <div class="row">
                            <div class="text-center m-b50 m-t30 col-md-12">
                                <h2 class="m-t0">Best Sellers</h2>
                                <div class="dez-separator-outer ">
                                    <div class="dez-separator bg-primary style-skew"></div>
                                </div>
                            </div>
                            @foreach($prods as $prod)
                                <div class="col-md-6 col-lg-4 col-sm-12 m-b30 product-item card-container">
                                    <div class="dez-box ">
                                        <div class="dez-thum-bx  dez-img-effect "><img
                                                src="{{asset('productImage/'.$prod->medium_image)}}"
                                                alt="">
                                            <div class="overlay-bx">
                                                <div class="overlay-icon">
                                                    <a href="{{route('cart.add',$product->id)}}"> <i class="fa fa-cart-plus icon-bx-xs"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dez-info p-a20 text-center">
                                            <h4 class="dez-title m-t0 text-uppercase"><a href="{{route('shop.product',$product->id)}}">{{$prod->name}}</a></h4>
                                            <h2 class="m-b0">
                                                {{$prod->price}}
                                            </h2>
                                            <div class="m-t20">
                                                <a href="{{route('cart.add',$product->id)}}" class="site-button">Add To Cart </a>
                                            </div>
                                        </div>
                                        <div class="sale">
                                            <span class="site-button button-sm primary">Sale</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row m-t30 product-service">
                    <div class="col-md-6 col-lg-4 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a20 left bg-primary clearfix text-white">
                            <div class="icon-bx-md  bg-white text-primary"><a href="#" class="icon-cell "><i
                                        class="fa fa-plane"></i></a></div>
                            <div class="icon-content">
                                <h3 class="dez-tilte text-uppercase m-b5">Free Shipping</h3>
                                <p>To all parts in kenya</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a20 left clearfix bg-primary text-white">
                            <div class="icon-bx-md  bg-white text-primary"><a href="#" class="icon-cell "><i
                                        class="fa fa-briefcase"></i></a></div>
                            <div class="icon-content">
                                <h3 class="dez-tilte text-uppercase m-b5">Best Prices</h3>
                                <p>Pocket friendly prices for your dream products</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a20 left bg-primary clearfix text-white">
                            <div class="icon-bx-md  bg-white text-primary"><a href="#" class="icon-cell "><i
                                        class="fa fa-cogs"></i></a></div>
                            <div class="icon-content">
                                <h3 class="dez-tilte text-uppercase m-b5">Secure Shopping</h3>
                                <p>Genuine merchandise for genuine products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
