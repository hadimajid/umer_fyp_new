@extends('frontend.layout.app')

@section('title','Latest Hopees')

@section('content')


    <!-- ***** Breadcumb Area Start ***** -->
    <div class="fancy-breadcumb-area bg-img bg-overlay" style="background-image: url({{asset('frontend/img/bg-img/hero-1.webp')}});">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content text-center">
                        <h2>Latest Hopees</h2>
                        <h4 class="text-white">Here see latest hopees and their transaction receipts</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Breadcumb Area End ***** -->
    <!-- ***** About Us Area Start ***** -->
    <section class="fancy-about-us-area bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="about-us-text">
                        <h2>Instructions! (Please Read Carefully)</h2>
                        <h4>Before you invest in our Sets, We highly recommend you to read our instructions below:</h4>
                        <h5 class="text-primary"><b>(NOTE)  </b>   You should deposit funds to increase your credits so that you can make security payment and perday payment</h5>
                        <ul>
                            <li class=" h5">1- Read the info of the given Sets and select the sets you want to register in.</li>
                            <li class=" h5">2- After a set has been selected register into that set by paying the security specified.</li>
                            <li class=" h5">3- After you have been registered into a set you have to pay daily the perday amount via your dashboard</li>
                            <li class=" h5">4- Set will be ended when total days has been completed.</li>
                            <li class=" h5">5- When the set will end out of the total users 3 users will be randomly selected by <b>Google implemented random number generator</b></li>
                            <li class=" h5">6- Those 3 number will be given 1st,2nd and 3rd hopee respectively (specified in each Set)</li>
                            <li class=" h5">7- The users that won't be selected for the hopee will be refunded by 79% of there total invested amount</li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-0 col-md-4">
                    <div class="about-us-thumb wow fadeInUp" data-wow-delay="0.5s">
                        <img src="{{asset('frontend/img/bg-img/about-1.webp')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About Us Area End ***** -->

    <!-- ***** Skills Area Start ***** -->
    <section class="fancy-skills-area section-padding-200">
        <!-- Side Thumb -->
        <div class="skills-side-thumb">
            <img src="{{asset('frontend/img/laptop.webp')}}" alt="">
        </div>
        <!-- Skills Content -->
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-5 ml-auto">
                    <div class="section-heading">
                        <h2>Frequently Asked Questions!</h2>
                        <p>All the points that should be noted are listed below:</p>
                    </div>
                    <div class="skills-content">
                        <!-- Single Progress Bar -->
                        <ol>
                            <li class="pb-1">1- If for some reasons you would'nt be able to pay perday amount, it will be deducted out of your security</li>
                            <li class="pb-1">2- If you will leave paying perday amount and your security of that has ended you will be unregistered from that set</li>
                            <li class="pb-1">3- You can register into more than one set.</li>
                            <li class="pb-1">4- You should be a jazzcash user to be able to pay amount.</li>
                            <li class="pb-1">5- <b>(IMPORTANT)</b>   You can pay as much security you want in start. If you will deposit complete total amount you won't have to worry for perday. Once total days are completed you will be informed about your hopee status.</li>
                            {{--                            <li class="pb-1"></li>--}}
                        </ol>
                    </div>
                    {{--                    <a href="#" class="btn fancy-btn fancy-dark"></a>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Skills Area End ***** -->

    <!-- ***** Service Area Start ***** -->
    <section id="set" class="fancy-services-area bg-img bg-overlay section-padding-100-70" style="background-image: url({{asset('frontend/img/bg-img/hero-2.webp')}})">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading heading-white text-center">
                        <h2>Latest Sets</h2>
                        <p>Latest Sets Opened For Registration</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Service -->
                @if($openSets != null)
                    @foreach($openSets as $set)
                        <div class="col-12 col-md-4">
                            <div class="single-service-area text-center wow fadeInUp" data-wow-delay="0.5s">
                                <div class="tile">
                                    <div class="wrapper">
                                        <div class="header"></div>

                                        <div class="banner-img">
                                            <img src="{{asset('frontend/img/featureset.webp')}}" alt="Image 1">
                                        </div>

                                        <div class="dates">
                                            <div class="start">
                                                <strong>Current Users</strong> {{$set->currentusers}}/{{$set->totalusers}}
                                                <span></span>
                                            </div>
                                            <div class="ends">
                                                <strong>Per Day</strong> {{$set->perday}}
                                            </div>
                                            <div class="col-6 offset-3 mt-3">
                                                <strong>Total Days</strong> {{$set->totalday}}
                                            </div>
                                        </div>

                                        <div class="stats">

                                            <div>
                                                <strong>1st Hopee</strong> {{$set->firsthopee}}
                                            </div>

                                            <div>
                                                <strong>2nd Hopee</strong> {{$set->secondhopee}}
                                            </div>

                                            <div>
                                                <strong>3rd Hopee</strong> {{$set->thirdhopee}}
                                            </div>

                                        </div>

                                        <div class="stats">

                                            <div>
                                                <strong>Current Users</strong> {{$set->currentusers}}
                                            </div>

                                            <div>
                                                <strong>Total Users</strong> {{$set->totalusers}}
                                            </div>

                                            <div>
                                                <strong>Security To Deposit</strong> {{(int)round($set->totalamountperperson / 100 * 20 + 50,-2)}}
                                            </div>

                                        </div>

                                        <div class="stats">

                                            <div>
                                                <strong>Total Days</strong> {{$set->totalday}}
                                            </div>

                                            <div>
                                                <strong>Total For Each User</strong> {{$set->totalamountperperson}}
                                            </div>

                                            <div>
                                                <strong>Total Refund</strong> 79%({{$set->returnperperson}})
                                            </div>

                                        </div>

                                        <div class="footer">
                                            <form role="form" action="{{route('frontset.security',$set->id)}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="security" class="float-left ml-1">Security To Deposit <b>(in multiple of {{$set->perday}})</b></label>
                                                    <input type="number" class="form-control" id="security" name="security" placeholder="Security" value="{{(int)round($set->totalamountperperson / 100 * 20 + 50,-2)}}">
                                                </div>

                                                <button type="submit" class="btn btn-primary" onclick="return confirm('Have you read the instructions?');">Register</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ***** Service Area End ***** -->
    <!-- ***** Contact Area Start ***** -->
    <div class="fancy-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <!-- Single Service -->
                @if($sets != null)
                    @foreach($sets as $set)
                        @foreach($set->hopees()->get() as $hopee)
                            <div class="col-md-4">
                                <div class="single-service-area text-center wow fadeInUp" data-wow-delay="0.5s">
                                    <div class="tile">
                                        <div class="wrapper">
                                            <div class="header"></div>

                                            <div class="banner-img">
                                                <img src="{{asset('frontend/img/featureset.webp')}}" alt="Image 1">
                                            </div>

                                            <div class="dates">
                                                <div class="start">
                                                    <strong>User Name</strong>{{$hopee->user()->get()->first()->name}}
                                                    <span></span>
                                                </div>
                                                <div class="ends">
                                                    <strong>Hopee Amount</strong>
                                                        @if($hopee->number == '1st')
                                                            {{$set->firsthopee}}
                                                        @endif
                                                        @if($hopee->number == '2nd')
                                                            {{$set->secondhopee}}
                                                        @endif
                                                        @if($hopee->number == '3rd')
                                                            {{$set->thirdhopee}}
                                                        @endif
                                                </div>
                                                <div class="col-6 offset-3 mt-3">
                                                    <strong>Invested Amount</strong> {{$set->totalamountperperson}}
                                                </div>
                                            </div>

                                            <div class="stats">
                                                <div>
                                                    <strong>Total Days</strong> {{$set->totalday}}
                                                </div>

                                                <div>
                                                    <strong>Per Day Amount</strong> {{$set->perday}}
                                                </div>

                                                <div>
                                                    <strong>Total Refund</strong> 79%({{$set->returnperperson}})
                                                </div>
                                            </div>
                                            <div class="footerss">
                                                @if($hopee->feedback)
                                                    <div class="ml-1">{{$hopee->feedback}}<strong>-{{$hopee->user()->get()->first()->name}}</strong></div>
                                                @else
                                                    @if($hopee->user()->get()->first()->id == \Illuminate\Support\Facades\Auth::id())
                                                        <form action="{{route('frontset.feedupdate',$hopee)}}" method="post">
                                                            @csrf
                                                            <textarea name="feedback" id="feedback" cols="40" rows="10"></textarea>
                                                            <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                                        </form>
                                                    @endif
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->


@endsection
