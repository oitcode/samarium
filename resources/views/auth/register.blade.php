<!doctype html>


{{--
|
| Register page blade file.
|
| This is the blade file of our register page. Please modify this file if you need
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
    </style>

    <!-- Livewire -->
    @livewireStyles
</head>

<body>
  <div class="container">
    <div class="d-flex justify-content-center py-3">
      <div class="col-md-4">

        {{-- Logo and signup text --}}
        <div class="py-4 text-center">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}"
              class="img-fluid mb-5"
              alt="{{ $company->name }} logo"
              style="height: 75px !important; {{-- max-width: 75px !important; --}}">
          <h1 class="h3 o-heading">
            Signup
          </h1>
        </div>

        {{--
           |
           | Register form
           |
        --}}
        <form method="POST" action="{{ route('register') }}" class="border bg-white p-3">
            @csrf
            <div class="form-group">
                <label for="name" class="col-form-label o-heading">{{ __('Name') }}</label>
                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-form-label o-heading">{{ __('E-Mail Address') }}</label>
                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="form-group">
                <label for="password" class="col-form-label o-heading">{{ __('Password') }}</label>
                <div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-form-label o-heading">{{ __('Confirm Password') }}</label>
                <div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group mb-0">
                <div>
                    <button type="submit" class="btn btn-block btn-danger o-heading text-white py-3">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>

        <div class="py-3 px-3">
          <small>
            By continuing, you agree to our Terms of Use and Privacy policy.
          </small>
        </div>
      </div>
    </div>
  </div>

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
