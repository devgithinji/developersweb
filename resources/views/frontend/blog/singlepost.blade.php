@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Blog Post</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Blog Post</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-9 col-md-8 m-b30">
                        <!-- blog start -->
                        <div class="blog-post blog-single">
                            <div class="dez-post-title ">
                                <h3 class="post-title"><a href="#">{{$post->title}}</a></h3>
                            </div>
                            <div class="dez-post-meta m-b20">
                                <ul>
                                    <li class="post-date"><i class="fa fa-calendar"></i><strong>{{date('F j',strtotime($post->created_at))}}</strong> <span>{{date('Y',strtotime($post->created_at))}}</span>
                                    </li>
                                    <li class="post-author"><i class="fa fa-user"></i>By <a href="#">{{$post->creator}}</a></li>
                                </ul>
                            </div>
                            <div class="dez-post-media dez-img-effect zoom-slow"><a href="#"><img src="{{asset('postImage/'.$post->large_image)}}" alt=""></a></div>
                            <div class="dez-post-text">
                                <p>{!! htmlspecialchars_decode($post->desc) !!}</p>
                            </div>
                        </div>
                        <!-- blog END -->
                    </div>
                    <!-- Left part END -->
                    <!-- Side bar start -->
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <aside class="side-bar">
                            <div class="widget">
                                <h4 class="widget-title">Search</h4>
                                <div class="search-bx">
                                    <form role="search" method="post">
                                        <div class="input-group">
                                            <input name="text" type="text" class="form-control"
                                                   placeholder="Write your text">
                                            <span class="input-group-btn">
                                            <button type="submit" class="site-button"><i
                                                    class="fa fa-search"></i></button>
                                            </span></div>
                                    </form>
                                </div>
                            </div>

                            <div class="widget widget_categories">
                                <h4 class="widget-title">Categories List</h4>
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="{{route('category.blog',$category->id)}}">{{$category->name}}</a> {{$category->post->count()}} posts</li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                    </div>
                    <!-- Side bar END -->
                </div>
                <div class="row m-b30">
                    <div class="portfolio-carousel mfp-gallery owl-carousel gallery owl-btn-center-lr">
                        @foreach($posts as $post)
                            <div class="item">
                                <div class="ow-portfolio">
                                    <div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img src="{{asset('postImage/'.$post->small_image)}}" alt="">
                                        <div class="overlay-bx">
                                            <div class="overlay-icon"> <a href="{{route('single.blog',$post->id)}}" class="mfp-link"> <i class="fa fa-link icon-bx-xs"></i> </a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
