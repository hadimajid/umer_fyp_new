<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="@yield('description')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="z7USgi76WF3qDJskXQnvcBUQoRh1tn5p5W55t9t05HA" />
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>
    <style>
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
        label.error{
            padding: 0.5rem;
            border-radius: 5px;
            margin-top: 1rem;
            margin-bottom: 1rem;
            background: #ec5252;
            color: white;
            width: 100%;
        }
        .hide-caret::after{
                display: none !important;
        }
    </style>
    @yield('head')

    @include('frontend.layout.head')

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed" oncontextmenu="return false">


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


@yield('content')

    @include("frontend.layout.foot")



</div>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Kameeti Calculator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="" id="kameeti-calculator">

                <div class="col-md-12">
                        <div class="form-group">
                            <label for="">
                                Name Of Item
                            </label>
                            <input type="text" id="cal_name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">
                                Price Of Item
                            </label>
                            <input type="number" id="cal_price" name="price" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">
                                Duration (In Months)
                            </label>
                            <input type="number" id="cal_duration" name="duration" required>
                        </div>
                    </div>
            </form>

        </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="cal">Calculate</button>
                </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
           <div class="row">
               <div class="col-md-12 text-center">
                   <p id="new_name"></p>
                   <p id="new_required_time"></p>
               </div>
           </div>
        </div>
    </div>
</div>
@include('frontend.layout.footer')
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/pagination.min.js')}}"></script>
@if($errors->any())
    <script>alert('{{$errors->first()}}')</script>
@endif
@yield('footer')
<script>
    $.validator.methods.email = function( value, element ) {
        return this.optional( element ) || /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([gmail|yahoo|outlook|hotmail]+\.)+[a-zA-Z]{2,}))$/.test( value );
    }
    jQuery.validator.addMethod("isAlphaSpace", function(value, element, params) {
        return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
    }, jQuery.validator.format("Please enter alphabets or space."));

    jQuery.validator.addMethod("isAlphaNumeric", function(value, element, params) {
        return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
    }, jQuery.validator.format("Please enter alphabets or numbers."));
    $.validator.addMethod('filesize', function (value, element, param) {
        console.log(element.files[0].size)
        return this.optional(element) || (((parseFloat(element.files[0].size)/1000)/1000) <= param)
    }, 'File size must be less than {0} MB');
    $.validator.addMethod('ge', function(value, element, param) {
        return this.optional(element) || parseInt(value) >= parseInt($(param).val());
    }, 'To value must be greater than or equal to From');
    $.validator.addMethod('lessThanSalary', function(value, element, param) {
        let grocery_from=parseInt($('#grocery_from').val()) || 0;
        let grocery_to=parseInt($('#grocery_to').val()) || 0;
        let utility_from=parseInt($('#utility_from').val()) || 0;
        let utility_to=parseInt($('#grocery_to').val()) || 0;
        let home_rent=parseInt($('#home_rent').val()) || 0;
        let others=parseInt($('#others').val()) || 0;
        let total=grocery_from+grocery_to+utility_from+utility_to+home_rent+others;
        console.log(total)
        console.log(value)
        return this.optional(element) || value >=total ;
    }, 'Expense value must be less than salary.');
    let cal_name='';
    let cal_price=0;
    let cal_duration=0;

    $('#kameeti-calculator').validate({
        rules:{
          name: 'required',
          price: 'required',
          duration: 'required',
        },
    })
    $('#cal').on('click',function (e) {
        e.preventDefault();
        if($('#kameeti-calculator').valid()){

        cal_name=$('#cal_name').val();
        cal_price=$('#cal_price').val();
        cal_duration=$('#cal_duration').val();
        let requiredAmount=cal_price/cal_duration;

        $('#new_name').text('For Item '+cal_name);
        $('#new_required_time').text('You have to save RS '+requiredAmount +' for '+cal_duration+" Months");
            $('#kameeti-calculator').trigger("reset");
        $('#exampleModalLong').modal('hide')

        $('.bd-example-modal-lg').modal('show')
        }

    })

</script>
@yield('scripts')
</body>
</html>
