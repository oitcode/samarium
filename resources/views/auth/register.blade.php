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
    <link href="{{ asset('vendor/fontawesome-free/css/all.css') }}" rel="stylesheet">

    <style>
      html, body {
        overflow-x: hidden;
      }
    </style>

    <!-- Livewire -->
    @livewireStyles
</head>

<body style="height: 100% !important;">
  <div class="container p-3">
    <div class="d-flex-rm justify-content-center-rm h-100">
      <div class="d-flex flex-column justify-content-center py-3">

        <div class="card-rm bg-light-rm bg-secondary-rm shadow-lg-rm mb-3" {{-- style="min-width: 700px !important;" --}}>

          <div class="card-body bg-light">
            <div class="d-flex justify-content-center">
              <div class="col-md-6-rm">
                @if (true)
                <div class="bg-white-rm text-dark-rm d-flex-rm justify-content-center-rm py-4 text-center">
                  <div class="mb-5">
                    <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                        class="img-fluid"
                        alt="{{ $company->name }} logo"
                        style="height: 75px !important; {{-- max-width: 75px !important; --}}">
                  </div>
                  <h1 class="h3 font-weight-bold pl-3-rm">
                    Signup
                  </h1>
                </div>
                @endif
                <form method="POST" action="{{ route('register') }}" class="border bg-white p-3">
                    @csrf
        
                    <div class="form-group row-rm">
                        <label for="email" class="col-md-4-rm col-form-label text-md-right-rm">{{ __('E-Mail Address') }}</label>
        
                        <div class="col-md-6-rm">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row-rm">
                        <label for="password" class="col-md-4-rm col-form-label text-md-right-rm">{{ __('Password') }}</label>
        
                        <div class="col-md-6-rm">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
        
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row-rm mb-0">
                        <div class="col-md-6-rm offset-md-4-rm">
                            <button type="submit" class="btn btn-block btn-danger py-3">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

                <div class="py-3 px-3 text-center-rm">
                  <small>
                    By continuing, you agree to our Terms of Use and Privacy policy.
                  </small>
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
