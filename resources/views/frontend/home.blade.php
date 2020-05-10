@extends('frontend.master')
@section('content')
    <!-- Slider -->
    <div class="section-full bg-img-fix p-t100 p-b80 overlay-black-light our-projects-galery" style="background-image:url({{asset('frontendImages/'.$sharedData['hero_img'])}});">
        <div class="container m-t50">
            <div class="row">
                <div class="col-lg-7 col-md-6 m-b30 d-flex">
                    <div class="dez-book-now-content text-white">
                        <h2 class="h2">{{$sharedData['hero_title']}}</h2>
                        <div class="dez-separator bg-white"></div>
                        <p>{{$sharedData['hero_description']}}</p>
                        <a href="#" class="site-button ">Read More</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="p-lr40 p-t30 dez-book-now-form p-b40 tp-dark clearfix bg-black ">
                        <form action="{{route('unauth.proposal.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-white text-center m-b30">
                                    <h2 class=" m-t0 m-b10 ">Request <span class="text-primary">Quotation </span> Now
                                    </h2>
                                    <div class="dez-separator-outer">
                                        <div class="dez-separator bg-primary style-liner"></div>
                                    </div>
                                    <p class="title-small ">Get in touch, to get your dream products developed in the
                                        most professional way possible. </p>

                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="name" class="form-control" placeholder="Your Name" type="text">
                                        @if($errors->has('name'))
                                            <p class="text-primary d-block">{{$errors->first('name')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input name="contact" class="form-control" placeholder="Email / Phone number"
                                               type="text">
                                        @if($errors->has('contact'))
                                            <p class="text-primary d-block">{{$errors->first('contact')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Select Service</label>
                                        <select class="bs-select-hidden" name="service">
                                            @foreach($services as $service)
                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="description" placeholder="Message" rows="4"
                                                      class="form-control" required=""></textarea>
                                        </div>
                                        @if($errors->has('description'))
                                            <p class="text-primary d-block">{{$errors->first('description')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <button name="submit" type="submit" class="site-button skew-secondry">
                                        <span>Submit</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider END -->
    <!-- meet & ask -->
    <div class="section-full z-index100 meet-ask-outer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 meet-ask-row p-tb30">
                    <div class="row d-flex">
                        <div class="col-lg-6">
                            <div class="icon-bx-wraper clearfix text-white left">
                                <div class="icon-xl "><span class=" icon-cell"><i class="fa fa-building-o"></i></span>
                                </div>
                                <div class="icon-content">
                                    <h3 class="dez-tilte text-uppercase m-b10">Meet & Ask</h3>
                                    <p>You will share your project needs, dreams and goals with us. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 m-t20">
                            <a href="#" class="site-button-secondry button-skew m-l10">
                                <span>Contact Us</span><i class="fa fa-angle-right"></i></a>
                            <a href="#" class="site-button-secondry button-skew m-l20">
                                <span>View more</span><i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- meet & ask END -->
    <!-- About Company -->
    <div class="section-full  bg-gray content-inner"
         style="background-image: url({{asset('frontend/images/bg-img.png')}}); background-repeat: repeat-x; background-position: left bottom -37px;">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-5">
                        <div class="dez-thu m"><img src="{{asset('frontendImages/'.$sharedData['company_img'])}}"
                                                    alt=""></div>
                    </div>
                    <div class="col-md-7">
                        <h2 class="text-uppercase"> About Company</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-secondry style-skew"></div>
                        </div>
                        <div class="clear"></div>
                        <p><strong>{{$sharedData['company_decription']}}</strong></p>
                        <h4>Mission</h4>
                        <p>{{$sharedData['company_mission']}}</p>
                        <h4>Vision</h4>
                        <p>{{$sharedData['company_vision']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Company END -->
    <!-- Our Projects  -->
    <div class="section-full bg-img-fix content-inner-1 overlay-black-middle"
         style="background-image:url({{asset('frontend/images/background/bg1.jpg')}});">
        <div class="container">
            <div class="section-head  text-center text-white">
                <h2 class="text-uppercase">Our Projects</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-white style-skew"></div>
                </div>
                <p>{{$sharedData['projects_description']}}</p>
            </div>
            <div
                class="section-content portfolio-carousel mfp-gallery gallery owl-carousel owl-btn-center-lr lightgallery">
                @foreach($projects as $project)
                    <div class="item">
                        <div class="ow-portfolio">
                            <div class="ow-portfolio-img dez-img-overlay1 dez-img-effect zoom-slow"><img
                                    src="{{asset('projectImage/'.$project->photo->pluck('small_photo')[0])}}" alt="">
                                <div class="overlay-bx">
                                    <div class="overlay-icon">
                                        <h2 class="text-white">{{$project->name}}</h2>
                                        <a href="{{route('single.showcase.project',$project->id)}}"> <i
                                                class="fa fa-link icon-bx-xs"></i> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <a href="{{route('projects')}}" class="site-button blue m-b10 button-skew m-l20">
                        <span>See All</span><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Projects END -->
    <!-- Architecture -->
    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="text-uppercase"> Services</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-secondry style-skew"></div>
                </div>
                <p>{{$sharedData['services_descrpition']}}</p>
            </div>
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="icon-bx-wraper bx-style-1 p-a30 center m-b30">
                            <div class="icon-bx-sm bg-secondry m-b20"><span class="icon-cell"><i
                                        class="{{$service->icon}} text-primary"></i></span></div>
                            <div class="icon-content">
                                <h5 class="dez-tilte text-uppercase">{{$service->name}}</h5>
                                <p>{{$service->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row text-center">
                <div class="col-md-12">
                    <a href="{{route('services')}}" class="site-button blue m-b10 button-skew m-l20">
                        <span>See All</span><i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Architecture END-->
    <!-- Company staus -->
    <div class="section-full text-white bg-img-fix content-inner overlay-black-middle" style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="p-a30 text-white text-center border-3">
                        <div class="icon-lg m-b20"><i class="fa fa-building-o"></i></div>
                        <div class="counter font-26 font-weight-800 text-primary m-b5">1035</div>
                        <span>Active Experts</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="p-a30 text-white text-center border-3">
                        <div class="icon-lg m-b20"><i class="fa fa-group"></i></div>
                        <div class="counter font-26 font-weight-800 text-primary m-b5">1226</div>
                        <span>Happy Client</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                    <div class="p-a30 text-white text-center border-3">
                        <div class="icon-lg m-b20"><i class="fa fa-slideshare"></i></div>
                        <div class="counter font-26 font-weight-800 text-primary m-b5">1552</div>
                        <span>Developer Hand</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 m-b10">
                    <div class="p-a30 text-white text-center border-3">
                        <div class="icon-lg m-b20"><i class="fa fa-home"></i></div>
                        <div class="counter font-26 font-weight-800 text-primary m-b5">1156</div>
                        <span>Completed Project</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Company staus END -->
    <!-- Team member -->
    <div class="section-full bg-white content-inner">
        <div class="container">
            <div class="section-head text-center ">
                <h2 class="text-uppercase"> Meet The Team</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-secondry style-skew"></div>
                </div>
                <p>{{$sharedData['team_description']}}</p>
            </div>
            <div class="section-content text-center ">
                <div class="row">
                    @foreach($staffs as $i=>$staff)
                        @if($i == 1 || $i == 4 || $i == 7 || $i ==10)
                            <div class="col-lg-4 col-md-4 col-sm-6 dez-team-1">
                                <div class="dez-box m-b30 team-skew ">
                                    <div class="dez-media"><a href="{{route('dev.profile',$staff->id)}}">
                                            @if($staff->profile->avatar_medium == null)
                                                <img width="358" height="460"
                                                     src="{{asset('staffavatar/avatar_medium.png')}}" alt=""> </a>
                                        @else
                                            <img width="358" height="460"
                                                 src="{{asset('staffavatar/'.$staff->profile->avatar_medium)}}"
                                                 alt=""> </a>
                                        @endif
                                        <div class="dez-info-has">
                                            <ul class="dez-social-icon bg-primary">
                                                <li><a href="{{$staff->profile->facebook_account}}"
                                                       class="fa fa-facebook"></a></li>
                                                <li><a href="{{$staff->profile->twitter_account}}"
                                                       class="fa fa-twitter"></a></li>
                                                <li><a href="{{$staff->profile->linkedin_account}}"
                                                       class="fa fa-linkedin"></a></li>
                                                <li><a href="{{$staff->profile->website_url}}" class="fa fa-globe"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-a20 bg-secondry text-center text-white team-info ">
                                        <h4 class="dez-title text-uppercase m-t0 m-b5"><a
                                                href="{{route('dev.profile',$staff->id)}}"
                                                class=" text-white">{{$staff->name}}</a></h4>
                                        <span class="dez-member-position">{{$staff->profile->position}}</span>
                                    </div>
                                </div>
                            </div>
                        @elseif($i == 0 || $i == 3 || $i == 6 || $i ==9)
                            <div class="col-lg-4 col-md-6 col-sm-6 dez-team-1 left">
                                <div class="dez-box m-b30 team-skew ">
                                    <div class="dez-media"><a href="{{route('dev.profile',$staff->id)}}">
                                            @if($staff->profile->avatar_medium == null)
                                                <img width="358" height="460"
                                                     src="{{asset('staffavatar/avatar_medium.png')}}" alt=""> </a>
                                        @else
                                            <img width="358" height="460"
                                                 src="{{asset('staffavatar/'.$staff->profile->avatar_medium)}}"
                                                 alt=""> </a>
                                        @endif
                                        <div class="dez-info-has">
                                            <ul class="dez-social-icon bg-primary">
                                                <li><a href="{{$staff->profile->facebook_account}}"
                                                       class="fa fa-facebook"></a></li>
                                                <li><a href="{{$staff->profile->twitter_account}}"
                                                       class="fa fa-twitter"></a></li>
                                                <li><a href="{{$staff->profile->linkedin_account}}"
                                                       class="fa fa-linkedin"></a></li>
                                                <li><a href="{{$staff->profile->website_url}}" class="fa fa-globe"></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-a20 bg-secondry text-center text-white team-info ">
                                        <h4 class="dez-title text-uppercase m-t0 m-b5"><a
                                                href="{{route('dev.profile',$staff->id)}}"
                                                class=" text-white">{{$staff->name}}</a></h4>
                                        <span class="dez-member-position">{{$staff->profile->position}}</span>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-4 col-sm-6 dez-team-1 right">
                                <div class="dez-box m-b30 team-skew ">
                                    <div class="dez-media"><a href="{{route('dev.profile',$staff->id)}}">
                                            @if($staff->profile->avatar_medium == null)
                                                <img width="358" height="460"
                                                     src="{{asset('staffavatar/avatar_medium.png')}}" alt=""> </a>
                                        @else
                                            <img width="358" height="460"
                                                 src="{{asset('staffavatar/'.$staff->profile->avatar_medium)}}"
                                                 alt=""> </a>
                                        @endif
                                        <div class="dez-info-has">
                                            <ul class="dez-social-icon bg-primary">
                                                <li><a href="{{$staff->profile->facebook_account}}"
                                                       class="fa fa-facebook"></a></li>
                                                <li><a href="{{$staff->profile->twitter_account}}"
                                                       class="fa fa-twitter"></a></li>
                                                <li><a href="{{$staff->profile->linkedin_account}}"
                                                       class="fa fa-linkedin"></a></li>
                                                <li><a href="{{$staff->profile->website_url}}" class="fa fa-globe"></a>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="p-a20 bg-secondry text-center text-white team-info ">
                                        <h4 class="dez-title text-uppercase m-t0 m-b5"><a
                                                href="{{route('dev.profile',$staff->id)}}"
                                                class=" text-white">{{$staff->name}}</a></h4>
                                        <span class="dez-member-position">{{$staff->profile->position}}</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <a href="{{route('aboutus')}}" class="site-button blue m-b10 button-skew m-l20">
                            <span>See All</span><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team member END -->
    <!-- Latest blog -->
    <div class="section-full content-inner-1">
        <div class="container">
            <div class="section-head text-center">
                <h2 class="text-uppercase">Latest blog post</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-secondry style-skew"></div>
                </div>
            </div>
            <div class="section-content">
                <div class="blog-carousel mfp-gallery gallery owl-carousel owl-btn-center-lr">
                    @foreach($posts as $post)
                        <div class="item">
                            <div class="ow-blog-post date-style-2">
                                <div class="ow-post-media dez-img-effect zoom-slow"><img
                                        src="{{asset('postImage/'.$post->large_image)}}" alt=""></div>
                                <div class="ow-post-info ">
                                    <div class="ow-post-title">
                                        <h4 class="post-title"><a href="#" title="Video post">{{$post->title}}</a></h4>
                                    </div>
                                    <div class="ow-post-meta">
                                        <ul>
                                            <li class="post-date"><i
                                                    class="fa fa-calendar"></i><strong>{{date('F j'),strtotime($post->created_at)}}</strong>
                                                <span>{{date('Y'),strtotime($post->created_at)}}</span></li>
                                            <li class="post-author"><i class="fa fa-user"></i>By <a href="#"
                                                                                                    title="Posts by {{$post->creator}}"
                                                                                                    rel="author">{{$post->creator}}</a>
                                            </li>
                                            <li class="post-comment"><i class="fa fa-comments"></i> <a href="#"
                                                                                                       class="comments-link">1
                                                    Comment</a></li>
                                        </ul>
                                    </div>
                                    <div class="ow-post-text">
                                        <span>{!! substr(strip_tags($post->desc),0,150) !!}</span>
                                    </div>
                                    <div class="ow-post-readmore ">
                                        <a href="#" title="READ MORE" rel="bookmark" class=" site-button-link">
                                            READ MORE <i class="fa fa-angle-double-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Latest blog END -->
    <!-- Testimonials blog -->
    <div class="section-full overlay-black-middle bg-img-fix content-inner-1"
         style="background-image:url({{asset('frontendImages/'.$sharedData['reviews_image'])}});">
        <div class="container">
            <div class="section-head text-white text-center">
                <h2 class="text-uppercase">What people are saying</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-white  style-skew"></div>
                </div>
            </div>
            <div class="section-content">
                <div class="testimonial-one owl-carousel owl-theme">
                    @foreach($reviews as $review)
                        <div class="item">
                            <div class="testimonial-1 testimonial-bg">
                                <div class="testimonial-pic quote-left radius shadow"><img
                                        src="{{asset('userAvatars/'.$review->user->profile->avatar)}}" width="100"
                                        height="100"
                                        alt=""></div>
                                <div class="testimonial-text">
                                    <p>{{$review->review}}</p>
                                </div>
                                <div class="testimonial-detail"><strong
                                        class="testimonial-name">{{$review->user->name}}</strong> <span
                                        class="testimonial-position">{{$review->user->profile->occupation}}</span></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonials blog END -->
    <!-- Client logo -->
    <div class="section-full dez-we-find bg-img-fix p-t50 p-b50 ">
        <div class="container">
            <div class="section-head text-center ">
                <h2 class="text-uppercase">Our Clients</h2>
                <div class="dez-separator-outer ">
                    <div class="dez-separator bg-secondry style-skew"></div>
                </div>
            </div>
            <div class="section-content">
                <div class="client-logo-carousel owl-carousel mfp-gallery gallery owl-btn-center-lr">
                    @foreach($employerLogos as $logo)
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"><a href="#"><img src="{{asset('employerLogo/'.$logo->photo)}}" alt=""></a></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Client logo END -->
@endsection
