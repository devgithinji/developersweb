@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Contact Us 4</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Contact us 4</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="section-full content-inner bg-white contact-style-1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a30 center">
                            <div class="icon-xl text-primary m-b20"><a href="#" class="icon-cell"><i
                                        class="fa fa-map-marker"></i></a></div>
                            <div class="icon-content">
                                <h5 class="dez-tilte text-uppercase">Address</h5>
                                <p>{{$contactus->address}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a30 center">
                            <div class="icon-xl text-primary m-b20"><a href="#" class="icon-cell"><i
                                        class="fa fa-envelope"></i></a></div>
                            <div class="icon-content">
                                <h5 class="dez-tilte text-uppercase">Email</h5>
                                <p>{{$contactus->emailone}} <br/> {{$contactus->emailtwo}}
                                    <br>Shop: {{$contactus->emailthree}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a30 center">
                            <div class="icon-xl text-primary m-b20"><a href="#" class="icon-cell"><i
                                        class="fa fa-phone"></i></a></div>
                            <div class="icon-content">
                                <h5 class="dez-tilte text-uppercase">Phone</h5>
                                <p>{{$contactus->phoneone}} <br/>{{$contactus->phonetwo}} <br>{{$contactus->phonethree}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 m-b30">
                        <div class="icon-bx-wraper bx-style-1 p-a30 center">
                            <div class="icon-xl text-primary m-b20"><a href="#" class="icon-cell"><i
                                        class="fa fa-globe"></i></a></div>
                            <div class="icon-content">
                                <h5 class="dez-tilte text-uppercase">Social Media</h5>

                                <p class="d-inline">
                                    <a href="{{$contactus->facebookLink}}" class="btn btn-inverse-primary" ><i class="fa fa-facebook text-primary fa-2x mr-2"></i></a>
                                    <a href="{{$contactus->twitterLink}}"  class="btn btn-inverse-primary"><i class="fa fa-twitter text-primary fa-2x mr-2"></i></a>
                                    <a href="{{$contactus->linkedInLink}}" class="btn btn-inverse-primary"><i class="fa fa-linkedin text-primary fa-2x"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Left part start -->
                    <div class="col-lg-6">
                        <div class="p-a30 bg-gray clearfix m-b30 ">
                            <h2>Send Message Us</h2>
                            <div class="dzFormMsg"></div>
                            <form method="post" class="dzForm"
                                  action="https://constructzilla.dexignzone.com/xhtml/script/contact.php">
                                <input type="hidden" value="Contact" name="dzToDo">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="dzName" type="text" required class="form-control"
                                                       placeholder="Your Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="dzEmail" type="email" class="form-control" required
                                                       placeholder="Your Email Id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="dzOther[Phone]" type="text" required class="form-control"
                                                       placeholder="Phone">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="dzOther[Subject]" type="text" required class="form-control"
                                                       placeholder="Subject">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea name="dzMessage" rows="4" class="form-control" required
                                                          placeholder="Your Message..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="g-recaptcha"
                                                     data-sitekey="6LefsVUUAAAAADBPsLZzsNnETChealv6PYGzv3ZN"
                                                     data-callback="verifyRecaptchaCallback"
                                                     data-expired-callback="expiredRecaptchaCallback"></div>
                                                <input class="form-control d-none" style="display:none;"
                                                       data-recaptcha="true" required
                                                       data-error="Please complete the Captcha">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button name="submit" type="submit" value="Submit" class="site-button "><span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Left part END -->
                    <!-- right part start -->
                    <div class="col-lg-6 d-flex m-b30">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.3825624477!2d75.65046970649679!3d26.88544791796718!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396c4adf4c57e281%3A0xce1c63a0cf22e09!2sJaipur%2C+Rajasthan!5e0!3m2!1sen!2sin!4v1500819483219"
                            class="align-self-stretch m-b30"
                            style="border:0; width:100%; min-height:350px; height: 100%;" allowfullscreen></iframe>
                    </div>
                    <!-- right part END -->
                </div>
            </div>
        </div>
        <!-- contact area  END -->
    </div>
@endsection
