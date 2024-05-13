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

<body style="height: 100% !important;  {{-- background-image: linear-gradient(45deg, {{ env('OC_SELECT_COLOR') }} , {{ env('OC_SELECT_COLOR') }} 15%, {{
env('OC_SELECT_COLOR') }} 15%, #fff 15%, #fff 100%);  background-color: #55a; --}}">

  <div class="row h-100">
    @if (true)

    {{--
    | 
    | Left side
    |
    --}}
    <div class="col-md-4 bg-primary text-white py-2">
      <div class="d-flex flex-column justify-content-center h-100">
        <div class="px-5 py-3-rm">
          <h2 class="h4 font-weight-bold text-center">
            Ozone
          </h2>
          <div class="my-4-rm p-3-rm-rm border-rm text-center">
            Version 0.8.4
          </div>
        </div>
      </div>
    </div>
    @endif

    {{--
    | 
    | Right side
    |
    --}}
    <div class="col-md-8">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-center">
            <div class="mb-3 text-center">
              <div class="my-3">
                @if (\App\Company::first())
                  <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
                      class="img-fluid-rm"
                      alt="{{ \App\Company::first()->name }} logo"
                      style="height: 75px !important;">

                @else
                  <i class="fas fa-check-circle mr-1"></i>
                @endif
              </div>
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
              <div class="col-md-8-rm px-5 py-3">
                <div class="text-secondary text-center-rm mb-5-rm">
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{--
                    | 
                    | User email
                    |
                    --}}
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

                    {{--
                    | 
                    | Password
                    |
                    --}}
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

                    {{--
                    | 
                    | Remember option
                    |
                    --}}
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

                    {{--
                    | 
                    | Login button
                    |
                    --}}
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

            {{--
            | 
            | Display date at bottom
            |
            --}}
            <div class="my-3 text-muted">
              <div class="d-flex flex-column justify-content-center">
                <div class="d-flex justify-content-center">
                  <div class="w-50-rm text-center">
                    {{ date('Y M d') }}
                  </div>
                </div>
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
