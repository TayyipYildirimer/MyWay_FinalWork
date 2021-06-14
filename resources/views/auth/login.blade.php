@extends('layouts.app')

@section('content')
<div class="container">
    <v-card style="height: 500px;width: 100%;overflow: hidden;margin-top: 12%;">
        <v-row cols="12" style="margin: 0; max-width: 100%; height: 100%;">
            <v-col cols="8">
                <v-row style="width:100%;text-align:center;margin-top:30px;">
                    <h3 style="width:100%;color:#2ba9e1;font-weight:600;">Hallo!</h3>
                    <p style="width:100%;font-weight:500">Hier kan je inloggen op je MY WAY account.</p>
                </v-row>
                <v-row>
                    <v-btn outlined elevation="0" class="login-google-btn" style=""><i
                            class="fab fa-google login-google-icon"></i>Log in met Google</v-btn>
                    <p class="login-of"><span style="color:#959595">of</span></p>
                </v-row>
                <v-row>
                    <form method="POST" action="{{ route('login') }}" style="width:100%;">
                        @csrf

                        <div class="form-group" style="width: 100%;margin-bottom: 10px;">
                            <i class="fas fa-envelope login-input-icon"></i>
                            <input style="" id="email" type="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group" style="width: 100%;margin-bottom: 10px;">
                            <i class="fas fa-unlock-alt login-input-icon"></i>
                            <input style="" id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <v-row style="margin-top:2em;">
                          <v-col style="text-align:right;">
                            <label style="font-size: 13px;font-weight: 500;color: #7a7a7a;" class="form-check-label" for="remember">
                              {{ __('Remember Me') }}
                            </label>
                          </v-col>
                          <v-col>
                            <input style="text-align:left;font-size: 13px;font-weight: 500;color: #7a7a7a;"
                                   class="form-check-input" 
                                   type="checkbox" 
                                   name="remember" 
                                   id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                          </v-col>
                        </v-row>

                        <div class="form-group row mb-0">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Inloggen') }}
                          </button>
                          <!--@if (Route::has('password.request'))
                                  <a class="btn btn-link" href="{{ route('password.request') }}">
                                      {{ __('Forgot Your Password?') }}
                                  </a>
                              @endif -->
                        </div>
                    </form>
                </v-row>
            </v-col>

            <v-col class="login-register" cols="4">
                <v-col style="color:white;width:100%;text-align:center;margin: 155px 0;">
                    <h3 style="text-transform:uppercase;">Nieuw hier?</h3>
                    <p class="font-weight-black">Meld je aan en maak je eigen portfolio</p>
                    <v-btn style="color:white; border-width: 3px;text-decoration: none;max-width:100%;" outlined elevation="0" href="{{ route('register') }}">Nieuwe registratie</v-btn>
                </v-col>
            </v-col>
        </v-row>
    </v-card>
</div>
@endsection

<style>
.login-register{
    background-color: rgba(43,169,225,1);
}
.login-google-icon{
  margin-right:0.3em;
  transition:0.3s;
}
.login-google-btn{
  color: #828282 !important;
  border-color: #eaeaea !important;
  font-weight:600 !important;
  font-size:12px !important;
  margin:30px auto 0px !important;
}
.login-google-btn:hover .login-google-icon{
  animation: login-google-colors 5s infinite;
}
@keyframes login-google-colors {
  0%   {color:#4285F4;}
  15%  {color:#4285F4;}
  40%  {color:#DB4437;}
  75%  {color:#F4B400;}
  100% {color:#0F9D58;}
}
.login-of{
  width: 87%;
  text-align: center;
  border-bottom: 1px solid #cdcdcd;
  line-height: 0.1em;
  margin: 35px auto;
}
.login-of span { 
    background:#fff; 
    padding:0 10px; 
}
.form-group input{
  margin: auto;
  width: 70%;
  font-weight: 500;
  padding: 10px;
  text-indent: 8%;
  text-align: left;
  margin: auto;
}
.login-input-icon{
  position: absolute;
  padding: 11px;
  left: 15%;
  color: #7a7a7a;
}
.form-group button{
  width: 220px;
  margin: auto;
  color: white;
  background-color: #2BA9E1;
  border-color:#2BA9E1 !important;
  border-radius: 4px !important;
  border-width: 3px;
}
.form-group button:hover{
  color: #2BA9E1 !important;
  background-color:white !important;
  border-color:#2BA9E1 !important;
}
</style>