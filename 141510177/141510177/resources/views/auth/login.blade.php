@extends('layouts.app')
@section('judul')
    Login
@endsection
@section('content')
    <div class="wrapper">
        <form method="post" name="Login_Form" class="form-signin" action="{{ url('/login') }}">       {{ csrf_field() }}
            <h3 class="form-signin-heading">Welcome Back! Please Sign In</h3>
              <hr class="colorgraph"><br>
              
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">
                                 @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus placeholder="Password">
                                 
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>    
             
              <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Login" type="Submit">Login</button>            
        </form>         
    </div>
               
@endsection
