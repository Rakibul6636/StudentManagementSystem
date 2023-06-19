<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/image/sms_logo.png" />

    <title>SMS</title>

    <!-- Scripts -->
   <script src="{{ asset('js/app.js') }} " defer></script> 

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300&display=swap');
</style>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   
</head>
<body style="background:#f5f5f5;">
    <div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-red shadow-sm topbar">
    <div class="container">
             
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->username }}
                            </a>
                            <?php $user = Auth::user();?>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                               
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="/profile/{{$user->id}}">Profile</a></li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm stroke bottom-nav">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div><img src="/image/sms_logo.png"  class="pe-2" ></div>
                   <div class="ps-2 pt-1 fw-bold"> Student Management System </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">Home</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.create') }}">Add Student</a>
                        </li> 
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students.delete') }}">Delete Student</a>
                        </li>  
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('students') }}">Student</a>
                        </li> 
                    </ul>
                        
                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ms-auto">
                      
                    </ul> -->
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <style type="text/css">
    .topbar{
    height: 30px; 
    background-color:#c81631; 
    justify-content:right;
    text-decoration:none;
    color:white;
}

.bottom-nav li a{
    font-size: 16px;
    color: #272727;
    display: block;
    text-decoration: none;
    text-transform: uppercase;
    font-weight: 600;
    font-family: "Open Sans",serif;
  }

 /* stroke */
 nav.stroke ul li a,
nav.fill ul li a {
  position: relative;
}
nav.stroke ul li a:after,
nav.fill ul li a:after {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  width: 0%;
  content: '.';
  color: transparent;
  background: #8e0016;
  height: 5px;
  transition: all ease 0.3s;

}
nav.stroke ul li a:hover:after {
  width: 100%;
}

nav.fill ul li a {
  transition: all 2s;
}

nav.fill ul li a:after {
  text-align: left;
  content: '.';
  margin: 0;
  opacity: 0;
}
nav.fill ul li a:hover {
  color: #fff;
  z-index: 1;
}
nav.fill ul li a:hover:after {
  z-index: -10;
  animation: fill 1s forwards;
  -webkit-animation: fill 1s forwards;
  -moz-animation: fill 1s forwards;
  opacity: 1;
}

  /* Animation */
  .animate{
    padding: 0px 10px 0px 0px;
    transition: all ease 0.4s;
  }
    </style> 
</body>
</html>
