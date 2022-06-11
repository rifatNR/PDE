


          <header id="header" class="fixed-top d-flex align-items-center no-padding">
            <div class="container d-flex align-items-center">
        
              <div class="logo mr-auto">
        {{--        <h1 class="text-light"><a href="{{ route('index')}}">PDE</a></h1>--}}
                <!-- Uncomment below if you prefer to use an image logo -->
                  <a href="{{ route('index')}}"><img src="{{ asset('assets/img/logo.png')}}" alt="" class="img-fluid"></a>
              </div>
        
              <nav class="nav-menu d-none d-lg-block">
                <ul>
                  <li class="{{ Request::path() ==='/' ? 'active' : ''}}"><a href="{{ route('index')}}">Home</a></li>
                  <li class="{{ Request::path() ==='about' ? 'active' : ''}}"><a href="{{ route('about') }}">About</a></li>
                  {{-- <li><a href="#services">Services</a></li> --}}
                  
                    <li class="drop-down {{Request::route()->getName() == 'servicess' ? 'active' : ''}}"><a href="#services">Services</a>
                        <ul>@if(isset($services))
                            @foreach ($services as $service)
                                <li><a href="{{ route('servicess', ['slug'=>$service->slug])}}">{{ $service->name }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </li>


                  <li class="{{Request::route()->getName() == 'allPortfolio' ? 'active' : ''}}"><a href="{{ route('allPortfolio') }}">Portfolio</a></li>
                  <li class="{{ Request::route()->getName() == 'pricing' ? 'active' : ''}}"><a href="{{ route('pricing')}}">Pricing</a></li>
                  <li class="{{ Request::path() ==='contact' ? 'active' : ''}}"><a href="{{ route('contact')}}">Contact</a></li>
                    @guest
                        <li>
                            <a href="#" data-toggle="modal" data-target="#loginModal">Login</a>
                        </li>
                    @else
                        <li class="drop-down">
                            <a class="text-white text-capitalize">
                                {{ Auth::user()->name }}
                            </a>
                            <ul>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>

                                @if(Auth::user()->hasRole('admin'))
                                <li><a href="{{ route('admin.indexx') }}">Dashboard</a></li>
                                @else
                                    @if(Auth::user()->email_verified_at != null)
                                        <li><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                    @endif
                                @endif
                             </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
        
                </ul>
              </nav><!-- .nav-menu -->
        
            </div>
          </header>


          @include('users.include.login_modal')
        
          @include('users.include.registration_modal')
        
        
        
        <div class="modal fade no-padding" id="resetPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Password Reset</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                        <!--<div class="mt-3">Have an account?<a class="ml-2" href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal" aria-label="Close">Log In</a></div>-->
                        <!--<div class="mt-3">Don't have an account?<a class="ml-2" href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal" aria-label="Close">Sign Up</a></div>-->
                        <p class="text-center mt-3">Don't have an account?<a class="ml-2" href="#" data-toggle="modal" data-target="#signinModal" data-dismiss="modal" aria-label="Close">Sign Up</a> </p>
                        <p class="text-center">Have an account?<a class="ml-2" href="#" data-toggle="modal" data-target="#loginModal" data-dismiss="modal" aria-label="Close">Log In</a> </p>
                    </div>
                </div>
            </div>
        </div>
        
        <script>

            $(document).ready(function() {
                $('.loginError').hide()
            })


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            function loginsubmit()
            {
                let email = $('#email').val()
                let password = $('#password').val()

                if(email == "" && password == "")
                {
                    $('#loginEmailError').text('Email can not be empty');
                    $('#loginPassError').text('Password can not be empty');
                }
                else if(email == "")
                {
                    $('#loginPassError').hide()
                    $('#loginEmailError').text('Email can not be empty');
                }
                else if(password == "")
                {
                    $('loginEmailError').hide()
                    $('#loginPassError').text('Password can not be empty');
                }
                else
                {
                    $('loginEmailError').hide()
                    $('#loginPassError').hide()


                    $("#overlay").fadeIn(300);

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('login') }}",
                        data: {
                            'email': email,
                            'password': password,
                            "_token": "{{ csrf_token() }}",
                            },
                        success: function (response) {
                            console.log(response)
                            if (response.success == true) {
                                if(response.flag == 1)
                                {
                                    // window.location.replace("/admin/index");
                                    window.location = "{{ route('admin.indexx') }}"
                                }
                                else{
                                    window.location.replace("/email/verify");
                                }
                
                            }
                            if(response.success == false)
                            {
                                $("#overlay").fadeOut(300)
                                $('.loginError').show()
                                $('.loginError').text(response.msg)
                            }
                        }
                    });
                }
            }


            $(document).keypress(function(event){
                var keycode = (event.keyCode ? event.keyCode : event.which);
                if(keycode == 13) 
                {
                    if($('#loginModal').hasClass('show'))
                    {
                        loginsubmit();
                        console.log('aaa');
                    }
                }
            });
        </script>
        
        