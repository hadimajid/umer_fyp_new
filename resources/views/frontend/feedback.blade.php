
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Our FeedBack</title>
    <style>
        .custom-text {
            font-weight: bold;
            font-size: 1.9em;
            border: 1px solid #cfcfcf;
            padding-left: 10px;
            padding-right: 10px;
            border-radius: 5px;
            color: #999;
            background: #fff;
        }
        .btn-grey{
            background-color:#D8D8D8;
            color:#FFF;
        }
        .review-block{
            background-color:#FAFAFA;
            border:1px solid #EFEFEF;
            padding:15px;
            border-radius:3px;
            margin-bottom:15px;
        }
        .review-block-name{
            font-size:12px;
            margin:10px 0;
        }
        .review-block-date{
            font-size:12px;
        }
        .review-block-rate{
            font-size:13px;
            margin-bottom:15px;
        }
        .review-block-title{
            font-size:15px;
            font-weight:700;
            margin-bottom:10px;
        }
        /*	Reset & General ---------------------------------------------------------------------- */
        * { margin: 0px; padding: 0px; }
        body {
            background: #ecf1f5;
            font:14px "Open Sans", sans-serif;
            text-align:center;
        }

        .tile{
            width: 100%;
            background:#fff;
            border-radius:5px;
            box-shadow:0px 2px 3px -1px rgba(151, 171, 187, 0.7);
            float:left;
            transform-style: preserve-3d;
            margin: 10px 5px;

        }

        .header{
            border-bottom:1px solid #ebeff2;
            padding:19px 0;
            text-align:center;
            color:#59687f;
            font-size:19px;
            position:relative;
        }

        .banner-img {
            padding: 5px 5px 0;
        }

        .banner-img img {
            width: 100%;
            border-radius: 5px;
        }
        .dates{
            border:1px solid #ebeff2;
            border-radius:5px;
            padding:20px 0px;
            margin:10px 20px;
            font-size:16px;
            color:#5aadef;
            font-weight:600;
            overflow:auto;
        }
        .dates div{
            float:left;
            width:50%;
            text-align:center;
            position:relative;
        }
        .dates strong,
        .stats strong{
            display:block;
            color:#adb8c2;
            font-size:11px;
            font-weight:700;
        }
        .dates span{
            width:1px;
            height:40px;
            position:absolute;
            right:0;
            top:0;
            background:#ebeff2;
        }
        .stats{
            border-top:1px solid #ebeff2;
            background:#f7f8fa;
            overflow:auto;
            padding:15px 0;
            font-size:16px;
            color:#59687f;
            font-weight:600;
            border-radius: 0 0 5px 5px;
        }
        .stats div{
            border-right:1px solid #ebeff2;
            width: 33.33333%;
            float:left;
            text-align:center
        }

        .stats div:nth-of-type(3){border:none;}

        div.footer {
            text-align: right;
            position: relative;
            margin: 20px 5px;
        }
        div.footerss {
            text-align: left;
            position: relative;
            margin: 20px 5px;
        }
        .footerss strong{
            display:block;
            color:#adb8c2;
            font-size:11px;
            font-weight:700;
        }

        .footerss div{
            font-size:16px;
            color:#59687f;
            font-weight:600;
            overflow:auto;        }
        div.footer a.Cbtn{
            padding: 10px 25px;
            background-color: #DADADA;
            color: #666;
            margin: 10px 2px;
            text-transform: uppercase;
            font-weight: bold;
            text-decoration: none;
            border-radius: 3px;
        }

        div.footer a.Cbtn-primary{
            background-color: #5AADF2;
            color: #FFF;
        }

        div.footer a.Cbtn-primary:hover{
            background-color: #7dbef5;
        }

        div.footer a.Cbtn-danger{
            background-color: #fc5a5a;
            color: #FFF;
        }

        div.footer a.Cbtn-danger:hover{
            background-color: #fd7676;
        }
    </style>


    <link rel="icon" href="{{asset('frontend/img/core-img/favicon.ico')}}">


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Core Stylesheet -->
    <link href="{{asset('frontend/style.css')}}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{asset('frontend/css/responsive/responsive.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

<!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


<div id="app">


    <!-- Preloader Start -->
    <div id="preloader">
        <div class="loader">
            <span class="inner1"></span>
            <span class="inner2"></span>
            <span class="inner3"></span>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area" id="header">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <nav class="h-100 navbar navbar-expand-lg align-items-center">
                        <a class="navbar-brand" href="{{route('front.index')}}">Hope</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fancyNav" aria-controls="fancyNav" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
                        <div class="collapse navbar-collapse" id="fancyNav">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{route('front.index')}}">Home <span class="sr-only">(current)</span></a>
                                </li>
                                {{--                                <li class="nav-item dropdown">--}}
                                {{--                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>--}}
                                {{--                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                {{--                                        <a class="dropdown-item" href="index.html">Home</a>--}}
                                {{--                                        <a class="dropdown-item" href="static-page.html">Static Page</a>--}}
                                {{--                                        <a class="dropdown-item" href="contact.html">Contact</a>--}}
                                {{--                                    </div>--}}
                                {{--                                </li>--}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.about')}}">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.latest')}}">Latest Hopees</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.feedbacks')}}">Feedbacks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('front.contact')}}">Contact</a>
                                </li>
                            </ul>
                            <!-- Search & Shop Btn Area -->
                            <div class="fancy-search-and-shop-area">
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('userdash.active') }}">
                                                    My Dashboard
                                                </a>
                                                <a class="dropdown-item" href="{{ route('userdash.creditdep') }}">
                                                    Credit: {{Auth::user()->credit->amount}}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                        @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->




    <!-- ***** Breadcumb Area Start ***** -->
    <div class="fancy-breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('frontend/img/bg-img/hero-1.webp')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>Feedback</h2>
                        <h4 class="text-white">Down you can find Feedbacks by our users.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <section class="content">



        <div class="row">
            <div class="col-12">
                @guest
                <detail :user="1"></detail>
                <div class="row">
                    <div class="col-12">
                        <hr/>
                        <h3 class="ml-3 my-3">Our Users Feedback:</h3>
                        <div class="review-block">
                            @foreach($feeds as $feed)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="review-block-name"><h5 class="text-capitalize ">{{$feed->user->name}}</h5></div>
                                        <div class="review-block-date">{{$feed->date}}<br/>{{$feed->updated_at->diffForHumans()}}</div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="review-block-rate">
                                            <star-rating :inline="true" active-color="#D68A7A" :read-only="true" :show-rating="false" :rating="{{$feed->rating}}" :increment="0.1" :star-size="20" active-color="#000000"></star-rating>
                                        </div>
                                        <div class="review-block-title">{{$feed->text}}</div>
                                    </div>
                                </div>
                                <hr/>
                            @endforeach

                        </div>
                    </div>
                </div>
                @else
                    <detail :user="{{auth()->user()->id}}"></detail>
                    <div class="row">
                        <div class="col-12">
                            <hr/>
                            <h3 class="ml-3 my-3">Our Users Feedback:</h3>
                            <div class="review-block">
                                @foreach($feeds as $feed)
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="review-block-name"><h5 class="text-capitalize ">{{$feed->user->name}}</h5></div>
                                            <div class="review-block-date">{{$feed->date}}<br/>{{$feed->updated_at->diffForHumans()}}</div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="review-block-rate">
                                                <star-rating :inline="true" active-color="#D68A7A" :read-only="true" :show-rating="false" :rating="{{$feed->rating}}" :increment="0.1" :star-size="20" active-color="#000000"></star-rating>
                                            </div>
                                            <div class="review-block-title">{{$feed->text}}</div>
                                        </div>
                                    </div>
                                    <hr/>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    @endguest

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>            <!-- /.content -->
    <!-- ***** Contact Area End ***** -->






    <!-- ***** Footer Area Start ***** -->
    <footer class="fancy-footer-area fancy-bg-dark">
        <div class="footer-content section-padding-80-50">
            <div class="container">
                <div class="row">
                    <!-- Footer Widget -->
                    <div class="col-4 offset-1">
                        <div class="single-footer-widget">
                            {{--                            <h6>Our Newsletter</h6>--}}
{{--                            <p>Subscribe to our mailing list to get the updates to your email inbox.</p>--}}
{{--                            <form action="#" method="get">--}}
{{--                                <input type="search" name="search" id="footer-search" placeholder="E-mail">--}}
{{--                                <button type="submit">Subscribe</button>--}}
{{--                            </form>--}}
                            <h6>Follow us on</h6><div class="footer-social-widegt d-flex align-items-center">
                                <a href="https://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://www.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Footer Widget -->
                {{--                    <div class="col-12 col-sm-6 col-lg-3">--}}
                {{--                        <div class="single-footer-widget">--}}
                {{--                            <h6>Twitter Feed</h6>--}}
                {{--                            <div class="single-tweet">--}}
                {{--                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i> With the popularity of podcast shows growing with each year, you might consider starting it yourself as well. <br>https://buff.ly/2zttoJb </a>--}}
                {{--                                <span>About 20 hours ago</span>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <!-- Footer Widget -->
                {{--                    <div class="col-12 col-sm-6 col-lg-3">--}}
                {{--                        <div class="single-footer-widget">--}}
                {{--                            <h6>Link Categories</h6>--}}
                {{--                            <nav>--}}
                {{--                                <ul>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Agency</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Home</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Studio</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> About</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Studio</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Services</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Blogs</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Work</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Shop</a></li>--}}
                {{--                                    <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i> Privacy</a></li>--}}
                {{--                                </ul>--}}
                {{--                            </nav>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                <!-- Footer Widget -->
                    <div class="col-4 offset-1">
                        <div class="single-footer-widget">
                            <h6>Contact Us</h6>
                            <p>+92347-5500987 <br>Fawadlang@gmail.com
                            </p>
                            <p>Muhammad Fawad Ur Rehman
                            </p>
                            <p>+92316-4643920 <br>iumersocial@gmail.com</p>
                            <p>Umer Farooq</p>
                            {{--                            <p>40 Baria Sreet 133/2 <br>NewYork City, US</p>--}}
                            {{--                            <p>Open hours: 8.00-18.00 Mon-Fri</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Copywrite -->
        <div class="footer-copywrite-area">
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 h-100">
                        <div class="copywrite-content h-100 d-flex align-items-center justify-content-between">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;{{date('Y')}} All rights reserved                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                            <!-- Footer Nav -->
                            <div class="footer-nav">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>

<script src="{{asset('frontend/js/jquery/jquery-2.2.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('frontend/js/bootstrap/popper.min.js')}}"></script>
<!-- Bootstrap-4 js -->
<script src="{{asset('frontend/js/bootstrap/bootstrap.min.js')}}"></script>
<!-- All Plugins js -->
<script src="{{asset('frontend/js/others/plugins.js')}}"></script>
<!-- Active JS -->
<script src="{{asset('frontend/js/active.js')}}"></script>

@if($errors->any())
    <script>alert('{{$errors->first()}}')</script>
@endif
</body>
</html>
