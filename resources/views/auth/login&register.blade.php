@extends('layouts.app')


@section('content')
    <div class="form-body">
        <div class="welcome col-lg-6">
            <h1><i class="fa-solid fa-folder"></i>welcome to files </h1>
            <h3>the best soluation to store files and share it with friends</h3>
        </div>
        <div class="contain">
            <div class="bluebg">
                <div class="box signin">
                    <h2>Already have an account?</h2>
                    <button  class="signinbtn">sign in</button>
                </div>
                <div class="box signup">
                    <h2>Don't have an account?</h2>
                    <button class="signupbtn">sign up</button>
                </div>
            </div>
            <div class="formbx">
                <div class="form signinform">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h3>sign in</h3>

                        <input id="email" type="email" placeholder="Email"
                            class="form-control input @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}"  autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback position" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror




                        <input id="password" type="password" placeholder="password"
                            class="form-control input @error('password') is-invalid @enderror" name="password"
                            autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback position" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <button type="submit" class="submit">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class=" forget" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif



                    </form>
                </div>
                <div class="form signupform">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h3>sign up</h3>
                        <input id="name" type="text" class="form-control input  @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}"  autocomplete="name" autofocus
                            placeholder="name">
                        @error('name')
                            <span class="invalid-feedback position" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="email" type="email" class="form-control input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback position" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="password" type="password"
                            class="form-control input @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback position" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input id="password-confirm" type="password" class="form-control input" name="password_confirmation"
                             autocomplete="new-password" placeholder="Confirm Password">
                        <button type="submit" class="submit">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
