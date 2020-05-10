@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Reviews Edit</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Review Create</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <div class="content-area tabs-section">
            <!-- Left & right section start -->
            <div class="container">
                <div class="p-a30 bg-white m-b10">
                    <div class="section-head text-center">
                        <h2 class="text-uppercase">Review Edit</h2>
                        <div class="dez-separator-outer ">
                            <div class="dez-separator bg-primary style-skew"></div>
                        </div>
                    </div>
                    <div class="section-content">
                        <form action="{{route('review.update',$review->id)}}" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Review</label>
                                        <textarea type="text" name="review" class="form-control" rows="5" placeholder="Write Company's Review">
                                            {{$review->review}}
                                        </textarea>
                                        @if($errors->has('review'))
                                            <p class="invalid-feedback d-block">{{$errors->first('review')}}</p>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button class="site-button outline blue m-r15" type="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Left & right section  END -->
        </div>
    </div>
@endsection
