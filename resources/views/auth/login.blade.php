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
  <link href="{{ asset('css/custom-style.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

  <style>
    html, body {
      overflow-x: hidden;
    }

    .o-linear-gradient {
        background-image: linear-gradient(135deg, {{ config('app.app_linear_gradient_color_1') }}, {{ config('app.app_linear_gradient_color_2') }});
        color: {{ config('app.app_linear_gradient_text_color') }};
    }
  </style>

  <!-- Livewire -->
  @livewireStyles
</head>

<body style="height: 100% !important; background-color: #f8fafc;">
  <div class="h-100 d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center col-md-3">
      <div class="px-3 bg-white border shadow-sm o-border-radius">
        <div class="text-center p-3 pt-5">
          <div class="">
            <i class="fas fa-user-circle fa-4x o-package-color-darker-text"></i>
            <div class="h4 my-3 o-heading o-package-color-darker-text">
              Login
            </div>
          </div>
        </div>

        <div class="d-flex">
          <div class="px-3 pb-3 w-100">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{--
                | 
                | User email
                |
                --}}
                <div class="form-group mb-4">
                  <label class="o-heading">
                    Email Address
                  </label>
                  <input id="email" type="email"
                      class="form-row form-control o-border-radius-sm @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}"
                      required
                      autocomplete="email"
                      placeholder="Enter you email address"
                      autofocus>

                  @error ('email')
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
                <div class="form-group mb-2">

                    <label class="o-heading">
                      Password
                    </label>
                    <input id="password" type="password"
                        class="form-control o-border-radius-sm @error('password') is-invalid @enderror"
                        name="password"
                        required
                        placeholder="Enter your password"
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
                <div class="form-group mt-4 mb-2">
                    <button type="submit" class="btn btn-block py-3 text-white o-border-radius-sm o-linear-gradient o-heading">
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

        {{--
        |
        | Display version at bottom
        |
        --}}
        <div class="px-3 mb-5">
          <div class="text-center text-muted">
            <small>
              v0.9.6
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
