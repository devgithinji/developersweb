@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Blog</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area">
            <div class="container">
                <div class="row">
                    <!-- left part start -->
                    <div class="col-lg-9 col-md-8 col-sm-6">
                        <div class="clearfix">
                            <!-- blog grid  -->
                            <div id="masonry" class="row dez-blog-grid-2">
                                @foreach($posts as $post)
                                    <div class="post card-container col-lg-6 col-md-6 col-sm-12">
                                        <div class="blog-post blog-grid date-style-2">
                                            <div class="dez-post-media dez-img-effect zoom-slow"><a href="#"><img
                                                        src="{{asset('postImage/'.$post->small_image)}}" alt=""></a>
                                            </div>
                                            <div class="dez-post-info">
                                                <div class="dez-post-title ">
                                                    <h3 class="post-title"><a href="{{route('single.blog',$post->id)}}">{{$post->title}}</a></h3>
                                                </div>
                                                <div class="dez-post-meta ">
                                                    <ul>
                                                        <li class="post-date"><i
                                                                class="fa fa-calendar"></i><strong>{{date('F j',strtotime($post->created_at))}}</strong>
                                                            <span>{{date('Y',strtotime($post->created_at))}}</span></li>
                                                        <li class="post-author"><i class="fa fa-user"></i>By <a
                                                                href="#">{{$post->creator}}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="dez-post-text">
                                                    <p>{!! substr(strip_tags($post->desc),0,150) !!}</p>
                                                </div>
                                                <div class="dez-post-readmore"><a
                                                        href="{{route('single.blog',$post->id)}}" title="READ MORE"
                                                        rel="bookmark" class="site-button-link">READ MORE<i
                                                            class="fa fa-angle-double-right"></i></a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- blog grid END -->
                            <!-- Pagination start -->
                            <div class="row">
                                <div class="col-lg-12 pagination-bx clearfix">
                                    {{$posts->links()}}
                                </div>
                            </div>
                            <!-- Pagination END -->
                        </div>
                    </div>
                    <!-- left part start -->
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
            </div>
        </div>
    </div>
@endsection
