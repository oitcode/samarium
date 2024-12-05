<!doctype html>


{{--
|
| Login page blade file.
|
| This is the blade file of our login page. Many options from default laravel
| login page are removed or disabled. Please modify this file if you need
| any changes.
|
--}}


<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100% !important;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Chartjs -->
    <script src="{{ asset('js/chart.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style>
      html, body {
        overflow-x: hidden;
      }
    </style>

    <!-- Livewire -->
    @livewireStyles
</head>

<body style="height: 100% !important; background-color: #ddd;">


    {{--
    | 
    | Right side
    |
    --}}
    <div class="h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-center">

            <div class="px-3">
              <div class="bg-white text-dark py-3 font-weight-bold rounded-rm border-rm shadow-rm" style="{{-- background-color: #eee; --}}">
                <div class="h5 font-weight-bold text-center mb-0" style="">
                  @if (\App\Company::first())
                    <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
                        class="img-fluid-rm"
                        alt="{{ \App\Company::first()->name }} logo"
                        style="height: 40px !important;">

                  @else
                    <i class="fas fa-check-circle mr-1"></i>
                  @endif
                  <div>
                    Login
                  </div>
                </div>
              </div>
              <div class="bg-light-rm d-flex pt-5-rm" style="{{--background-color: #eee;--}}">
                <div class="px-3 py-3 border-rm bg-white">
                  <form method="POST" action="{{ route('login') }}">
                      @csrf

                      {{--
                      | 
                      | User email
                      |
                      --}}
                      <div class="form-group shadow-sm-rm mb-3">
                        <label>
                          Email
                        </label>
                        <input id="email" type="email"
                            class="form-control @error('email') is-invalid @enderror badge-pill-rm px-4-rm"
                            name="email" value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            {{--
                            placeholder="Email"
                            --}}
                            autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      {{--
                      | 
                      | Password
                      |
                      --}}
                      <div class="form-group shadow-sm-rm mb-2">

                          <label>
                            Password
                          </label>
                          <input id="password" type="password"
                              class="form-control @error('password') is-invalid @enderror badge-pill-rm px-4-rm"
                              name="password"
                              required
                              {{--
                              placeholder="Password"
                              --}}
                              autocomplete="current-password">

                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>

                      {{--
                      | 
                      | Remember option
                      |
                      --}}
                      {{--
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                              <label class="form-check-label" for="remember">
                                  {{ __('Remember Me') }}
                              </label>
                          </div>
                      </div>
                      --}}

                      {{--
                      | 
                      | Login button
                      |
                      --}}
                      <div class="form-group mt-4 mb-0">
                          <button type="submit" class="btn btn-dark badge-pill-rm btn-block py-3 text-white shadow-rm"
                              style="">
                              {{ __('Login') }}
                          </button>

                          {{--
                          @if (Route::has('password.request'))
                              <a class="btn btn-link" href="{{ route('password.request') }}">
                                  {{ __('Forgot Your Password?') }}
                              </a>
                          @endif
                          --}}
                      </div>

                  </form>
                </div>
              </div>
            </div>

            {{--
            | 
            | Display version at bottom
            |
            --}}
            <div class="pb-3-rm px-3">
              <div class="text-center bg-white text-muted pb-3">
                <small>
                  v0.8.7
                </small>
              </div>
            </div>

        </div>
      </div>
    </div>


  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
