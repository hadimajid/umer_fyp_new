@extends('frontend.layout.app')

@section('title','Hopee-We Give Hopee')
@section('description','Select a set, Read the instructions, Make Investment, Be hopeful to win hopee of at least 4000%. Think we are scam check our latest hopees and feedbacks.')

@section('content')



    <!-- ***** Hero Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/hero-1.webp')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <!-- Video Overview -->
{{--                        <div class="video-overview">--}}
{{--                            <a href="https://www.youtube.com/watch?v=f5BBJ4ySgpo" class="video--play--btn"><i class="fa fa-play" aria-hidden="true"></i> Watch The Overview</a>--}}
{{--                        </div>--}}
{{--                            <div class="video-overview">--}}
{{--                                <a href="{{route('front.index')}}" ><i class="fa fa-heart-o" aria-hidden="true"></i>  We Give Hopee</a>--}}
{{--                            </div>--}}
                        <h2>Select a set, Read the instructions, Make Investment, Be hopeful to win hopee of 4000%</h2>
                        @if(auth()->guard('web')->check())
                        <h2><small>Current Wallet: @auth{{Auth::user()->credit?decrypt(Auth::user()->credit->amount):0 }} Pkr <a href="{{route('userdash.creditdepamount')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a>@else {{0}}Pkr <a href="{{route('userdash.creditdepamount')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i></a> @endauth</small></h2>
                        @endif
{{--                        <h2><small>Think we are scam? Check our:</small></h2>--}}
                        @if(auth()->guard('web')->check())
                        <a href="{{route('user.kameeti')}}" class="btn fancy-btn fancy-active" style="font-size: 12px">Saving Wallet</a>
                        <a href="{{route('user.loan')}}" class="btn fancy-btn fancy-active" style="font-size: 12px">Loan Management</a>
                        <a href="{{route('user.budget')}}" class="btn fancy-btn fancy-active" style="font-size: 12px">Budget Calculator</a>
                        <a href="{{route('front.latest')}}" class="btn fancy-btn fancy-active" style="font-size: 12px">Latest Hopees</a>
                        <a href="{{route('front.feedbacks')}}" class="btn fancy-btn" style="font-size: 12px">Our Feedback</a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Hero Area End ***** -->

    <!-- ***** Top Feature Area Start ***** -->
    <div class="fancy-top-features-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="fancy-top-features-content">
                        <div class="row no-gutters">
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> What is a hopee?</h5>
                                    <p>Hopee is a prize money or reward money that can be granted back to you at the end of each set.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-clock-o" aria-hidden="true"></i> We give Hopee!</h5>
                                    <p>Our motto is <b>We Give Hopee</b>. You trust on us, You invest on us, We give you hope to fulfil your dreams.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="single-top-feature">
                                    <h5><i class="fa fa-diamond" aria-hidden="true"></i> Can I lose all my investment?</h5>
                                    <p><b>Absolutely NO!</b> In case you don't win a hopee, you don't have to be worried. We give you <b>79%</b> of your investment back. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Top Feature Area End ***** -->

    <!-- ***** About Us Area Start ***** -->
    <section class="fancy-about-us-area bg-gray">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-4">
                    <div class="single-top-feature">
                        <h5><i class="fa fa-diamond" aria-hidden="true"></i> What other things HOPEE provides?</h5>
                        <p>Hopee is a platform where you can win upto 4000% of your invested amount or get a refund of almost 79%. Besides this, hopee also provides a KAMETI service, Loan Service, Budgeting Calculator and Kameti calculator. </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-top-feature">
                        <h5><i class="fa fa-diamond" aria-hidden="true"></i> What is loan Service?
                        </h5>
                        <p> Loan Service is the service provided by our hopee platform to help out the people in need of loan with no interest. We will charge 1.5% rent fee for giving out the loan which is not similar to interest as authenticated by Ulimahs too.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-top-feature">
                        <h5><i class="fa fa-diamond" aria-hidden="true"></i>What does Kameti service do?
                        </h5>
                        <p> Kameti is the service which every one can avail. It is basically a type of savings wallet where you can submit your desired amount for the desired period of time. And by the end of that period you can get all your money back.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-top-feature">
                        <h5><i class="fa fa-diamond" aria-hidden="true"></i>What does Kameti calculator do?

                        </h5>
                        <p>Kameti calulator helps you calculate the duration and money to be saved in the specific period of time for any specific item of your choice you want to buy. </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="single-top-feature">
                        <h5><i class="fa fa-diamond" aria-hidden="true"></i>What does Budget calculator do?

                        </h5>
                        <p> Budget Calculator simply asks you about your monthly income and other expenses, then generates the amount you should be saving after all your expenditures and expenses etc.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Testimonials Area Start ***** -->
    <section class="fancy-testimonials-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial d-md-flex align-items-center">
                            <!-- Testimonial Thumb -->
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('frontend/img/fawadquote.webp')}}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="testimonilas-content">
                                <span class="playfair-font quote">“</span>
                                <h5>I wanted to mention that with zero help i started this project. Trying hard again and again, after failing for many times, investing all I could now finally I have finally completed my dream. Concluding I will say you can acheive your dream you just have to be sincere with it.</h5>
                                <h6>M.Fawad Ur Rehman <span>CEO WeGiveHopee</span></h6>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial d-md-flex align-items-center">
                            <!-- Testimonial Thumb -->
                            <div class="testimonial-thumbnail">
                                <img src="{{asset('frontend/img/umer.jpg')}}" alt="">
                            </div>
                            <!-- Content -->
                            <div class="testimonilas-content">
                                <span class="playfair-font quote">“</span>
                                <h5>Take up one idea. Make that one idea your life - think of it, dream of it, live on that idea. Let the brain, muscles, nerves, every part of your body, be full of that idea, and just leave every other idea alone. This is the way to success.</h5>
                                <h6>Umer Farooq <span>CEO WeGiveHopee</span></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Testimonials Area End ***** -->

    <!-- ***** CTA Area Start ***** -->
    <section class="fancy-cta-area bg-img bg-overlay section-padding-100" style="background-image: url({{asset('frontend/img/bg-img/hero-3.webp')}})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2>Still not convinced? Do you want to contact us?</h2>
                        <p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
                        <a href="{{route('front.contact')}}" class="btn fancy-btn">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** CTA Area End ***** -->

    <!-- ***** Blog Area Start ***** -->
    <section class="fancy-blog-area section-padding-100-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Latest News</h2>
                        <p>We are a creative investment company. Invest in our site and you will not be regretted.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog -->
                <div class="col-12 col-md-4">
                    <div class="single-blog-area wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('frontend/img/blog-img/blog-1.webp')}}" alt="">
                        <div class="blog-content">
                            <h5>Now you can contact us easily....</h5>
                            <p>Your ease to contact us has been enhanced. Now you can contact us easily to remove your queries just leave an email with your query</p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog -->
                <div class="col-12 col-md-4">
                    <div class="single-blog-area wow fadeInUp" data-wow-delay="1s">
                        <img src="{{asset('frontend/img/blog-img/blog-2.webp')}}" alt="">
                        <div class="blog-content">
                            <h5>User Dashboard has been updated.</h5>
                            <p>The User dashboard has been updated to enhance your experience. New features has been added into it.</p>
                        </div>
                    </div>
                </div>
                <!-- Single Blog -->
                <div class="col-12 col-md-4">
                    <div class="single-blog-area wow fadeInUp" data-wow-delay="1.5s">
                        <img src="{{asset('frontend/img/blog-img/blog-3.webp')}}" alt="">
                        <div class="blog-content">
                            <h5>Our Own Hopee Payment System Implemented!</h5>
                            <p>Hopee Payment system has been implemented successfully. Now you can make payments through your Jazzcash or Easypaisa account and receive too.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Blog Area End ***** -->
@endsection
<script>
    var currentHtmlContent;
    var element = new Image();
    var elementWithHiddenContent = document.querySelector("#set");
    var innerHtml = elementWithHiddenContent.innerHTML;
    element.__defineGetter__("id", function() {
        currentHtmlContent= "";
    });
    setInterval(function() {
        currentHtmlContent= innerHtml;
        console.log(element);
        console.clear();
        elementWithHiddenContent.innerHTML = currentHtmlContent;
    }, 1000);
</script>
