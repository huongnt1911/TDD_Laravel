@extends('layouts.app') 
<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="headersheet" href="img/header.png">
</head>
@section('content')

    <div class="khung">         
    <form method="POST" action="{{ route('login') }}">
                        @csrf  
            <div class="item-header drop-shadow" style="margin-bottom: 160px;"> <!--style="margin-bottom: 150px;"-->
                
                <img class="img-header" width="365" height="147" src="img/header.png">
                
                <div class="welcome">Welcome</div>
                <div class="text-center bysign">By signing in you are agreeing our</div>
                <a href="#" class="term">Term and privacy policy</a>
               <div class="emailpass">
                    

                        <div class="email emailpass-fz">
                            <!-- <input for="email" class="col-md-4 col-form-label text-md-end" placeholder="Email"> -->
                            <input id="email" type="email" class="forminput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Email Address">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <!-- <span style="position: absolute; right: 50px; top: 8px;">1</span> -->
                            <img class="icon" src="./img/mail.svg" alt="mail">
                            
                        </div>

                        <div class="pass emailpass-fz">
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->                          
                            <input id="password" type="password" class="forminput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"
                            placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror    
                            <img class="icon" src="./img/lock.svg" alt="lock">
                        </div>
                        
                           <div class="textbox">
                                <div class="formcheck">
                                    <input class=" addformcheck" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <!-- form-check-input -->
                                    <label class="form-check-label btn-log rmbpass" for="remember">
                                        {{ __('Remember Password') }}
                                    </label>
                                </div>

                                <!-- <div class="forget-pass"> -->
                                
                                <!-- </div> -->
                            </div>
               </div>
                              
            </div>

            <div class="item-footer drop-shadow">
                <div>
                @if (Route::has('password.request'))
                    <a class="forget-pass" href="{{ route('password.request') }}">
                        {{ __('Forget Password') }}
                    </a>
                @endif
                </div>
                
                <div class="login">    
                    <div>
                    <button type="submit" class="btn-log btn-login">
                        {{ __('Login') }}
                    </button>

                    <button class="btn-log btn-register">
                        <a class="decoration" href="{{ route('register') }}" target="_blank">{{ __('Register') }}</a>
                    </button>
                    </div>
                </div>  
                <div class="height">
                    <div class="touchid">Login with touch ID</div>
                    <img width="69" height="72" src="https://mobi-iot.com/wp-content/uploads/2020/04/Biometrics_Full-color-1.svg">
                    <div class="connect">or connect with</div>
                </div>
                            
                <div class="social">
                    <a href="#" class="btn-social facebook" target="_blank">
                        <img width="39" height="39" src="./img/facebook.svg" alt="Facebook" >
                    </a>

                    <a href="#" class="btn-social instagram" target="_blank">
                        <img width="39" height="39" src="./img/instagram.svg" alt="Instagram">
                    </a>

                    <a href="#" class="btn-social pinterest" target="_blank">
                        <img width="39" height="39" src="./img/pinterest.svg" alt="Pinterest">
                    </a>

                    <a href="#" class="btn-social linkedin" target="_blank">
                        <img width="39" height="39" src="./img/linkedin.svg" alt="LinkedIn">
                    </a>
                </div> 
            </div>
    </div>
    </form> 
@endsection
