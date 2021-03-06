
<div class="shadow bg-light header-bar" style="min-width: 1300px">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg justify-content-left"  style="padding: 5px">
            <a href="{{url('/')}}" class="navbar-brand d-flex w-50 mr-auto">
                <img id="kaiparaLogo" src="{{url('images/KaiparaLogo.png')}}" class="mr-auto float-left" alt="">
            </a>

                @if($guard = session()->get('guardString'))
                    <ul class="nav navbar-nav ml-auto w-100 justify-content-end align-items-end  dropdown">
                        <li class="nav-item border-0 "  >
                            <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button" style="cursor:pointer;">
                            @if(auth()->guard('admin')->check())
                                    {{auth()->guard('admin')->user()->name}}
                            @elseif(auth()->guard('service_provider')->check())
                                    {{auth()->guard($guard)->user()->firstname}} {{auth()->guard($guard)->user()->lastname}}
                            @else
                                    {{auth()->guard($guard)->user()->first_name}} {{auth()->guard($guard)->user()->last_name}}
                            @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right rounded-0" aria-labelledby="dropdownMenuButton">
                                @if(Auth::guard('staff')->check())
                                    <a class="dropdown-item" href="{{route('security.index')}}">My Profile</a>
                                    <a class="dropdown-item" href="{{route('staff.logout')}}">Logout</a>
                                @elseif(Auth::guard('service_provider')->check())
                                    <a class="dropdown-item" href="{{route('service.home')}}">My Profile</a>
                                    <a class="dropdown-item" href="{{route('service.logout')}}">Logout</a>
                                @elseif(Auth::guard('admin')->check())
                                    <a class="dropdown-item" href="{{route('admin.index')}}">Administration Center</a>
                                    <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                                @else
                                    <a class="dropdown-item" href="{{route('client.home')}}">My Profile</a>
                                    <a class="dropdown-item" href="{{url('client/logout')}}">Logout</a>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item" id="headerProfileImage">
                            <img class="float-right rounded-circle shadow dropdown-toggle text-nowrap" style="display: block; width: 54px; height: 54px" src="{{isset(auth()->guard($guard)->user()->imgPath) ? url(auth()->guard($guard)->user()->imgPath) : url("images/Profile_Placeholder.png")}}" alt="profileImage">
                        </li>
                    </ul>

                @else
                    <ul class="nav navbar-nav ml-auto w-100 justify-content-end align-items-end">
                        <li class="nav-item border-0">
                            <a href="{{ url('/selectuser') }}" class="text-dark mx-1 align-self-start ">Login</a>
                        </li>
                        <li class="nav-item border-0">
                            <a href="{{ url('/registration/usertype') }}" class="text-dark mx-1 align-self-start">Sign up</a>
                        </li>
                    </ul>

                @endif

            </div>
        </nav>
    </div>
</div>
