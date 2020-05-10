@extends('frontend.master')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dez-bnr-inr overlay-black-middle"
             style="background-image:url({{asset('pageImages/'.$pageImagesList[array_rand($pageImagesList)])}});">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">FAQs</h1>
                </div>
            </div>
        </div>
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="#">Home</a></li>
                    <li>Faqs</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="bg-white">
            <!-- Faq -->
            <section class="section-full content-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="row">
                                <div class="col-lg-12 m-b30">
                                    <h2 class="m-b10 m-t0">General Questions</h2>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the.</p>
                                    <div class="dez-accordion space" id="accordion1">
                                        @foreach($faqs as $faq)
                                            <div class="panel">
                                                <div class="acod-head">
                                                    <h6 class="acod-title">
                                                        <a data-toggle="collapse" href="#" data-target="#collapseOne1" aria-expanded="true" class="collapsed">
                                                            <i class="fa fa-question-circle"></i>{{$faq->question}}?
                                                        </a>
                                                    </h6>
                                                </div>
                                                <div id="collapseOne1" class="acod-body collapse" data-parent="#accordion1">
                                                    <div class="acod-content">{{$faq->answer}}</div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Faq END -->
                        </div>
                        <div class="col-lg-4 col-md-5 contact-style-1">
                            <div class="p-a30 bg-gray clearfix m-b30 faqs-form">
                                <h2>Ask Your Questions</h2>
                                <div class="dzFormMsg"></div>
                                <form method="post" class="dzForm"
                                      action="https://constructzilla.dexignzone.com/xhtml/script/contact.php">
                                    <input type="hidden" value="Contact" name="dzToDo">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="m-b20">
                                                <div class="input-group">
                                                    <input name="dzName" type="text" required class="form-control"
                                                           placeholder="Your Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="m-b20">
                                                <div class="input-group">
                                                    <input name="dzEmail" type="email" class="form-control" required
                                                           placeholder="Your Email Id">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="m-b20">
                                                <div class="input-group">
                                                    <input name="dzOther[Subject]" type="text" required
                                                           class="form-control" placeholder="Subject">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="m-b20">
                                                <div class="input-group">
                                                    <textarea name="dzMessage" rows="4" class="form-control" required
                                                              placeholder="Your Message..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="m-b20">
                                                <div class="input-group">
                                                    <div class="g-recaptcha"
                                                         data-sitekey="<!-- Put Here reCaptcha Site Key -->"
                                                         data-callback="verifyRecaptchaCallback"
                                                         data-expired-callback="expiredRecaptchaCallback"></div>
                                                    <input class="form-control d-none" style="display:none;"
                                                           data-recaptcha="true" required
                                                           data-error="Please complete the Captcha">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button name="submit" type="submit" value="Submit" class="site-button ">
                                                <span>Submit</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Faq END -->
        </div>
        <!-- contact area  END -->
    </div>
@endsection
