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

</head>

<body style="height: 100% !important; background-color: #ded;">

  <div class="d-flex justify-content-center h-100">
    <div class="d-flex flex-column justify-content-center">
        <div class="row-rm border shadow bg-white" style="">
          <div class="col-md-4-rm d-flex flex-column justify-content-center bg-white p-3-rm px-5-rm p-0 bg-warning">
            <div class="d-flex justify-content-center bg-danger-rm p-3 px-5">
              <div class="mr-4 p-0">
                <i class="fas fa-check-circle fa-2x text-primary"></i>
              </div>
            </div>
          </div>
          <div class="col-md-8-rm px-5 py-3">
            <h2 class="text-center">
              Login
            </h2>
            <div class="text-secondary text-center mb-4">
              Welcome back. Please login to your account.
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
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

                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
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

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-danger btn-block">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
          </div>
        </div>
    </div>
  </div>

</body>
</html>
