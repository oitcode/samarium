@if (false)
@include ('collection.login.login-1' {{-- . \App\CmsTheme::first()->login_page --}} )
@endif

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

<body style="height: 100% !important;" style="background-color: #ccc;">


    {{--
    | 
    | Right side
    |
    --}}
    <div class="h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-center">
            <div class="text-center">
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

            <div class="px-3">
              <div class="py-4-rm bg-primary-rm text-dark font-weight-bold rounded border-rm shadow-rm" style="{{-- background-color: #eee; --}}">
                <div class="h5 font-weight-bold text-center" style="">
                  Login
                </div>
              </div>
              <div class="bg-light-rm d-flex pt-5" style="{{--background-color: #eee;--}}">
                <div class="px-3 py-3 border bg-white">
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
                            style="font-size: 1.2rem;"
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
                              style="font-size: 1.2rem;"
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
                      <div class="form-group mt-4 mb-0">
                          <button type="submit" class="btn btn-dark badge-pill-rm btn-block py-3 text-white shadow-rm"
                              style="">
                              {{ __('Login') }}
                              @if (false)
                              <i class="fas fa-chevron-right ml-2"></i>
                              @endif
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
            </div>

            {{--
            | 
            | Display date at bottom
            |
            --}}
            <div class="my-3 text-muted">
              <div class="text-center">
                @if (false)
                {{ date('Y M d') }}
                <br/>
                @endif
                <small>
                  OIT Ozone v0.8.5
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
