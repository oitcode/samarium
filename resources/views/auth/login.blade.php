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

<body style="height: 100% !important; background-color: #eee;">

  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center">
        <div class="py-5 bg-primary text-white">
          @if (true)
          <div class="h2 text-center">
            <i class="fas fa-check-circle mr-1"></i>
            Ozone
          </div>
          @endif
        </div>
        <div class="row-rm border shadow bg-white d-flex" style="">
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
            @if (true)
            <h2 class="text-center h4 font-weight-bold text-secondary">
              Login
            </h2>
            @endif
            <div class="text-secondary text-center-rm mb-4">
              @if (false)
              Welcome back.
              Please login to your account.
              @endif
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <input id="email" type="email"
                      class="form-control @error('email') is-invalid @enderror"
                      style="font-size: 1.3rem;"
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

                <div class="form-group">
                    @if (false)
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                    @endif

                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        style="font-size: 1.3rem;"
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

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-block" style="font-size: 1.5rem;">
                        {{ __('Login') }}
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

        <div class="my-5">
          <div class="d-flex justify-content-center">
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
          </div>
        </div>
    </div>
  </div>

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
@endif
