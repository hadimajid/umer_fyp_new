<!-- ***** Header Area Start ***** -->
<header class="header_area" id="header">
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-12 h-100">
                <nav class="h-100 navbar navbar-expand-lg align-items-center">
                    <a class="navbar-brand" href="{{route('front.index')}}">Hopee</a>
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
                            {{--                                <li class="nav-item">--}}
                            {{--                                    <a class="nav-link" href="{{route('front.latest')}}">Latest Hopees</a>--}}
                            {{--                                </li>--}}
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
                                                {{--Credit: {{ decrypt(Auth::user()->credit->amount) }}--}}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" data-toggle="dropdown" href="#">
                                            @php
                                                $notifications=App\Notifiable::where('user_id',Auth::guard('web')->user()->id)->where('status',0)->orderBy("created_at","desc")->get();
                                                $count=App\Notifiable::where('user_id',Auth::guard('web')->user()->id)->where('status',0)->count();
                                            @endphp
                                            <i class="fa fa-bell"></i>
                                            <span class="badge badge-warning navbar-badge">{{$count}}</span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="overflow-y: scroll;max-height: 300px;">
                                            <a href="{{route("userdash.notification")}}" class="dropdown-item dropdown-header">See All Notifications</a>
                                            <div class="dropdown-divider"></div>
                                            @forelse($notifications as $notification)
                                                @php
                                                    $now=new \Carbon\Carbon('now');
                                                    $createdAt=new \Carbon\Carbon($notification->created_at);
                                                    $diff=$createdAt->diffForHumans($now);
                                                @endphp
                                                <a href="{{route("userdash.notificationDetails",$notification->id)}}" class="dropdown-item">
                                                    @if($notification->notifiable_type=="App\Loan")
                                                        @php
                                                            $type="";
                                                            if($notification->loan->approved==1){
                                                                $type="approved";
                                                            }
                                                            if($notification->loan->approved==2){
                                                                $type="rejected";
                                                            }
                                                        @endphp
                                                        {{"Loan request of amount {$notification->loan->amount} is $type"}}

                                                    @elseif($notification->notifiable_type=="App\KameetiUser")
                                                        @php
                                                            $type="";
                                                            if($notification->kameeti->registered==1){
                                                                $type="approved";
                                                            }
                                                            if($notification->kameeti->registered==2){
                                                                $type="rejected";
                                                            }
                                                        @endphp
                                                        {{"Kameeti {$notification->kameeti->kameeti->name} is $type"}}
                                                    @endif
                                                    <span class="float-right text-muted text-sm">{{$diff}}</span>
                                                </a>
                                            @empty
                                                <a href="#" class="dropdown-item">
                                                    No new notification
                                                </a>
                                            @endforelse
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