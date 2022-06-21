
<!-- <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="error"></div>
                        <form  >
                            {{-- @csrf --}}
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus id="email" aria-describedby="emailHelp" placeholder="Enter email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" id="password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                            <button onclick="loginsubmit()" type="button" class="btn btn-primary">Submit</button>
                        </form>
                        <div class="mt-3">Don't have an account?<a class="ml-2" href="#" data-toggle="modal" data-target="#signinModal" data-dismiss="modal" aria-label="Close">Sign Up</a></div>
                        <div class="mt-3"><a href="#" data-toggle="modal" data-target="#resetPassModal" data-dismiss="modal" aria-label="Close">Forgot Password?</a></div>
                    </div>
                </div>
            </div>
        </div> -->

<div class="modal fade no-padding z-10000" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger loginError text-center"></div>
        <form>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email" class="form-control" placeholder="Enter your email address" type="email" id="email" required>
            </div>
            <small class="text-danger error-msg" id="loginEmailError"></small>

            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" id="password"class="form-control" placeholder="Enter the password" type="password" required>
            </div> 
            <small class="text-danger error-msg" id="loginPassError"></small>                                 
            <div class="form-group">
                <button type="button" onclick="loginsubmit()" class="btn btn-primary btn-block"> Login  </button>
            </div>    
            <!-- <p class="text-center">Have an account? <a href="">Log In</a> </p>                                                                  -->
        </form>

        <p class="text-center">Don't have an account?<a class="ml-2" href="#" data-toggle="modal" data-target="#signinModal" data-dismiss="modal" aria-label="Close">Sign Up</a> </p> 
        <p class="text-center"><a href="#" data-toggle="modal" data-target="#resetPassModal" data-dismiss="modal" aria-label="Close">Forgot Password?</a> </p> 

      </div>
    </div>
  </div>
</div>

