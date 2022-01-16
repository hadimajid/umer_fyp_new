
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

@include("frontend.layout.header")





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





    @include("frontend.layout.foot")

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
