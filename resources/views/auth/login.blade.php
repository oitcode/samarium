@if (false)
@include ('collection.login.login-1' {{-- . \App\CmsTheme::first()->login_page --}} )
@endif

@if (true)
<!doctype html>
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

<body style="height: 100% !important;  background-image: linear-gradient(45deg, {{ env('OC_SELECT_COLOR') }} , {{ env('OC_SELECT_COLOR') }} 15%, {{
env('OC_SELECT_COLOR') }} 15%, #fff 15%, #fff 100%);  {{-- background-color: #55a; --}}">

  <div class="row h-100">
    @if (true)
    <div class="col-md-4 bg-primary text-white">
      <div class="d-flex flex-column justify-content-center h-100">
        <div class="p-5">
          <h2 class="h4 font-weight-bold">
            Ozone
          </h2>
          <div class="my-4 p-3-rm-rm border-rm">
            Version 0.8.3
          </div>
          @if (false)
          <ul class="list-group bg-transparent">
            <li class="list-group-item bg-transparent border-0 p-0">
              <i class="fas fa-check-circle mr-1"></i>
              Modular
            </li>
            <li class="list-group-item bg-transparent border-0 p-0">
              <i class="fas fa-check-circle mr-1"></i>
              PHP
            </li>
            <li class="list-group-item bg-transparent border-0 p-0">
              <i class="fas fa-check-circle mr-1"></i>
              Open source
            </li>
            <li class="list-group-item bg-transparent border-0 p-0">
              <i class="fas fa-check-circle mr-1"></i>
              Version 0.8.2
            </li>
          </ul>
          @endif
        </div>
      </div>
    </div>
    @endif
    <div class="col-md-8">
  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center">
        <div class="mb-3 text-center">
          <div class="mb-3">
            @if (\App\Company::first())
              <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
                  class="img-fluid-rm"
                  alt="{{ \App\Company::first()->name }} logo"
                  style="height: 75px !important;">

              @if (false)
              <div class="h5 font-weight-bold my-3">
                {{ \App\Company::first()->name }}
              </div>
              @endif
            @else
              <i class="fas fa-check-circle mr-1"></i>
            @endif
          </div>
          @if (false)
          <div class="h6 font-weight-bold">
            @if (\App\Company::first())
              {{ \App\Company::first()->name }}
            @else
              Ozone
            @endif
          </div>
          @endif
        </div>

        <div class="py-4 bg-primary-rm text-primary-rm rounded border shadow-rm" style="background-color: #eee; color: {{ env('OC_SELECT_COLOR') }};">
          @if (true)
          <div class="h4 text-center" style="text-shadow: 1px 0 {{ env('OC_SELECT_COLOR') }};text-shadow: -1px 0 {{ env('OC_SELECT_COLOR') }};
          {{-- font-family: Mono; --}}">
            Login
          </div>
          @endif
        </div>
        <div class="row-rm border shadow-sm bg-white d-flex py-3" style="">
          <div class="bg-primary text-white">
            <div class="h2-rm text-center text-white-rm p-0">
              @if (false)
              @if (false)
              <div class="h1">
                <i class="fas fa-check-circle mr-1"></i>
                Ozone
              </div>
              @endif

              <ul>
                <li>WEB</li>
                <li>SHOP</li>
                <li>ERP</li>
              </ul>
              @endif
            </div>
          </div>
          <div class="col-md-4-rm d-flex flex-column justify-content-center bg-white p-3-rm px-5-rm p-0 bg-warning">
            <div class="d-flex justify-content-center bg-danger-rm p-3-rm px-5-rm">
              @if (false)
              <div class="mr-4 p-0">
                <i class="fas fa-check-circle fa-2x text-primary"></i>
              </div>
              @endif
              <div class="p-0 text-center">
                @if (false)
                <h1 class="h2 text-primary p-0 m-0">
                  WebCMS
                </h1>
                <div class="h4 text-primary">
                  Content management
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-8-rm px-5 py-3">
            @if (false)
            <h2 class="text-center h4 font-weight-bold text-secondary mb-4">
              Login
            </h2>
            @endif
            <div class="text-secondary text-center-rm mb-5-rm">
              @if (false)
              Welcome back.
              Please login to your account.
              @endif
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group shadow-sm mb-3">
                  <input id="email" type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      style="font-size: 1.2rem;"
                      name="email" value="{{ old('email') }}"
                      required
                      autocomplete="email"
                      placeholder="Email"
                      autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

                <div class="form-group shadow-sm mb-2">
                    @if (false)
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    @endif

                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        style="font-size: 1.2rem;"
                        name="password"
                        required
                        placeholder="Password"
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                @if (false)
                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                @endif

                <div class="form-group mt-3 mb-1">
                    <button type="submit" class="btn btn-success-rm badge-pill btn-block py-3 text-white shadow"
                        style="{{-- font-size: 1.3rem; --}} background-image: linear-gradient(to right, {{ env('OC_SELECT_COLOR') }}, {{ env('OC_SELECT_COLOR') }});">
                        <span class="h5">
                          {{ __('Login') }}
                        </span>
                        <i class="fas fa-chevron-right ml-2"></i>
                    </button>

                    @if (false)
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                    @endif
                </div>
            </form>
          </div>
        </div>

        <div class="my-3 text-muted">
          <div class="d-flex flex-column justify-content-center">
            <div class="d-flex justify-content-center">
              <div class="w-50-rm text-center">
                &copy; 2023 
                @if (\App\Company::first())
                  {{ \App\Company::first()->name }}
                @endif
                <br />
                @if (false)
                Ozone v0.8.2
                @endif
              </div>
            </div>

            @if (false)
            <div class="mr-3">
              <a href="">
                Terms
              </a>
            </div>
            <div class="mr-3">
              <a href="">
                Privacy
              </a>
            </div>
            <div class="mr-3">
              <a href="">
                Security
              </a>
            </div>
            <div class="mr-3">
              <a href="">
                About Ozone
              </a>
            </div>
            @endif
          </div>
        </div>
    </div>
  </div>
    </div>
  </div>


  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
@endif
