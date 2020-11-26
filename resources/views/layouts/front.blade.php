<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/front/mystyle.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('/dashboard/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
  <!-- Other CSS -->
  <link rel="stylesheet" href="{{ asset('css/front/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/front/login.css') }}">
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script> 
  <!--Selected-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
  <!-- Other JS -->

  <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body class="kanin">
  <!--start  menu2 -->
  <div class="container">
    <div class="row">
      <div class="col col-sm-12 col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>          
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-center">
              <li class="nav-item mt-1 mb-1 d-block d-sm-none d-md-none nav-home">
                <a href="{{ route('welcome') }}" class="nav-link @if(Request::is('welcome')|Request::is('/')|Request::is('home')) active-menu2 @endif">
                  Home
                </a>
              </li>              
              @if (Session::get('status')=='1'||Session::get('status')=='2') 
                <li class="nav-item mt-1 mb-1 d-block d-sm-none d-md-none nav-home">
                <a href="{{ route('calendarEvent') }}" class="nav-link">
                  Create Event
                </a>
              </li>
              @endif
              @if (Session::get('status')=='1') 
                <li class="nav-item mb-1 d-block d-sm-none d-md-none nav-dashboard">
                  <a href="{{ route('calendarEvent') }}" class="nav-link @if(Request::is('calendarEvent')) active-menu2 @endif">
                    <i class="fas fa-user-cog"></i> Admin Dashboard
                  </a>
                </li>
              @endif
            </ul>

            <div class="collapse navbar-collapse">
              <ul class="navbar-nav mr-auto">
                <a class="navbar-brand" href="{{ route('welcome') }}">
                  <img src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30" alt="">
                  Logo Event
                </a>
                <form class="form-inline my-2 my-lg-0">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search mr-0"></i></span>
                    </div>
                    <input type="text" class="form-control form-control-custom" id="searchNavInput" name="searchNavInput" autocomplete="off" placeholder="Search By Name, Location">
                  </div>
                </form>
              </ul>              
            </div>

            <a href="{{ route('welcome') }}" class="nav-link d-none d-sm-none d-md-none d-lg-block @if(Request::is('welcome')|Request::is('/')|Request::is('home')) active-menu @endif">
                Home
            </a>       
            @if (Session::get('status')=='1'||Session::get('status')=='2') 
              <div class="decoration-inside"></div>
              <a href="{{ route('calendarEvent') }}" class="nav-link d-none d-sm-none d-md-none d-lg-block">
                Create Event
              </a>
            @endif   
            @if (Session::get('status')=='1') 
              <div class="decoration-inside"></div>
              <a href="{{ route('calendarEvent') }}" class="nav-link d-none d-sm-none d-md-none d-lg-block">
                <i class="fas fa-user-cog"></i> Admin Dashboard
              </a>
            @endif  
            

            <div class="text-right">
              @if (Session::get('status')) 
                <!--Desktop-->
                <a class="btn btn-danger btn-sm rounded-pill mt-1 d-none d-sm-none d-md-none d-lg-block" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </a>
                <!--Mobile-->
                <a class="btn btn-danger btn-sm rounded-pill mt-1 d-block d-sm-block d-md-block d-lg-none" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                  <i class="fas fa-sign-out-alt"></i> Sign Out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              @else
                <!--Desktop-->
                <button type="button" class="btn btn-success btn-sm rounded-pill mt-1 d-none d-sm-none d-md-none d-lg-block" data-toggle="modal" data-target="#loginModal">
                  <i class="fas fa-unlock mr-1"></i> Log In / Sign Up
                </button>
                <!--Mobile-->
                <a class="btn btn-success btn-sm rounded-pill mt-1 d-block d-sm-block d-md-block d-lg-none" href="{{ route('login') }}">
                  <i class="fas fa-unlock mr-1"></i> Log In / Sign Up
                </a>
              @endif
            </div>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!--end  menu -->
  <!--start  image slide -->
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/front/pichead.jpg') }}" class="d-block w-100" height="400" alt="pichead">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/front/pichead.jpg') }}" class="d-block w-100" height="400" alt="pichead">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/front/pichead.jpg') }}" class="d-block w-100" height="400" alt="pichead">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!--end  image slide  -->
  <!--start  main -->
  <div class="container">
    <div class="row">
      <!--start content -->
      <div class="col col-sm-12 col-md-12">
        <br>
        @if (Session::get('status'))
        ID = {{ Auth::user()->id }}
        Status = {{ Session::get('status') }}
        @endif

        @yield('content')
      </div>
      <!--end content -->
    </div>
  </div>
  <!--end  main  -->

  <!--start  footer -->
  @for ($i = 0; $i < 10; $i++)
    <br>
  @endfor 
  <div class="container-fluid" style="background-color: #260176de;">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12">
        <div class="d-flex justify-content-center myfooter">
          @yield('footer')
        </div>
      </div>
    </div>
  </div>
  <div class="card-header text-right">
    CopyRight © 2020
  </div>
  <!--end  footer -->
</body>

</html>

<!-- Modal Login-->
<div class="modal fade in" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="form-title text-center">
        <h4>Log In</h4>
      </div>
      <form method="POST" action="{{ route('login') }}">
      @csrf
        <div class="modal-body">
          <div class="d-flex flex-column text-left mt-3">
            <div class="form-group">
              <?= Form::label('email', '* Email'); ?>
              <input type="email" class="form-control form-control-custom @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Your email address...">
            </div>
            <div class="form-group">
              <?= Form::label('password', '* Password'); ?>
              <input type="password" class="form-control form-control-custom @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Your password...">
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <button type="submit" class="btn btn-block rounded-pill" style="background-color: #260176;color:white">
            <i class="fas fa-sign-in-alt"></i> Log In
          </button>
        </div><br>
      </form>
      <div class="modal-footer d-flex justify-content-center">
        Don’t have an account ? 
        <a href="{{ route('register') }}" class="nav-link" id="btnSignUp">
          Sign Up
        </a>  
      </div>
    </div>
  </div>
</div>