@if (false)
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

      @if (false)
      <div class="d-flex justify-content-center mb-3">
        @if (\App\Company::first())
          <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
              class="img-fluid-rm"
              alt="{{ \App\Company::first()->name }} logo"
              style="height: 75px !important;">
        @else
          <i class="fas fa-check-circle mr-1"></i>
        @endif
      </div>
      @endif
      
      @if (false)
      <div class="my-4 d-flex justify-content-between bg-white border py-4">
        <div>
          <h2 class="h6 font-weight-bold p-0 bg-warning-rm text-dark-rm p-3">
            Register to get below benefits
          </h2>
          <ul class="p-0-rm">
            <li>
              5% OFF
            </li>
            <li>
              Purchase history
            </li>
            <li>
              Discounts
            </li>
            <li>
              Many more ...
            </li>
          </ul>
        </div>
        <div class="p-4">
          <a href="/">
            <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ \App\Company::first()->name }} logo"
                style="height: 75px !important;">
          </a>
        </div>
      </div>
      @endif

      <div class="card" style="min-width: 700px !important;">
          @if (true)
          <div class="card-header bg-success-rm text-white-rm d-flex justify-content-center-rm py-3">
            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center-rm">
                <h1 class="h5 font-weight-bold">
                  Register
                </h1>
              </div>
            </div>
          </div>
          @endif

          <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                  @csrf
      
                  <div class="form-group row-rm">
                      <label for="name" class="col-md-4 col-form-label text-md-right-rm">{{ __('Name') }}</label>
                      <br/>
      
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="form-group row-rm">
                      <label for="email" class="col-md-4 col-form-label text-md-right-rm">{{ __('E-Mail Address') }}</label>
      
                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="form-group row-rm">
                      <label for="password" class="col-md-4 col-form-label text-md-right-rm">{{ __('Password') }}</label>
      
                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="form-group row-rm">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right-rm">{{ __('Confirm Password') }}</label>
      
                      <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>
      
                  <div class="form-group row-rm mb-0">
                      <div class="col-md-6 offset-md-4-rm">
                          <button type="submit" class="btn btn-block btn-success">
                              {{ __('Register') }}
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <div class="py-3 text-center">
        <small>
          By continuing, you aggree to our <a href="">Terms of Use</a> and <a href="">Privacy policy</a>.
        </small>
      </div>
    </div>
  </div>

  <!-- Livewire scripts -->
  @livewireScripts
</body>
</html>
@endif




@extends ('ecomm-website.base')

@section ('content')
  <div class="container p-3">
  <div class="d-flex-rm justify-content-center-rm h-100">
    <div class="d-flex flex-column justify-content-center py-3">

      @if (false)
      <div class="d-flex justify-content-center mb-3">
        @if (\App\Company::first())
          <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
              class="img-fluid-rm"
              alt="{{ \App\Company::first()->name }} logo"
              style="height: 75px !important;">
        @else
          <i class="fas fa-check-circle mr-1"></i>
        @endif
      </div>
      @endif
      
      @if (false)
      <div class="my-4 d-flex justify-content-between bg-white border py-4">
        <div>
          <h2 class="h6 font-weight-bold p-0 bg-warning-rm text-dark-rm p-3">
            Register to get below benefits
          </h2>
          <ul class="p-0-rm">
            <li>
              5% OFF
            </li>
            <li>
              Purchase history
            </li>
            <li>
              Discounts
            </li>
            <li>
              Many more ...
            </li>
          </ul>
        </div>
        <div class="p-4">
          <a href="/">
            <img src="{{ asset('storage/' . \App\Company::first()->logo_image_path) }}"
                class="img-fluid-rm"
                alt="{{ \App\Company::first()->name }} logo"
                style="height: 75px !important;">
          </a>
        </div>
      </div>
      @endif

      <div class="card bg-secondary-rm shadow-lg mb-3" {{-- style="min-width: 700px !important;" --}}>
          @if (true)
          <div class="card-header bg-white text-dark d-flex justify-content-center-rm py-4">
            <div class="d-flex flex-column">
              <div class="d-flex justify-content-center-rm">
                <h1 class="h5 font-weight-bold pl-3">
                  Signup
                </h1>
              </div>
            </div>
          </div>
          @endif

          <div class="card-body">
              <form method="POST" action="{{ route('register') }}">
                  @csrf
      
                  <div class="form-group row-rm">
                      <label for="name" class="col-md-4 col-form-label text-md-right-rm">{{ __('Name') }}</label>
                      <br/>
      
                      <div class="col-md-6">
                          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="form-group row-rm">
                      <label for="email" class="col-md-4 col-form-label text-md-right-rm">{{ __('E-Mail Address') }}</label>
      
                      <div class="col-md-6">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="form-group row-rm">
                      <label for="password" class="col-md-4 col-form-label text-md-right-rm">{{ __('Password') }}</label>
      
                      <div class="col-md-6">
                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      
                          @error('password')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
      
                  <div class="form-group row-rm">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-right-rm">{{ __('Confirm Password') }}</label>
      
                      <div class="col-md-6">
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                      </div>
                  </div>
      
                  <div class="form-group row-rm mb-0">
                      <div class="col-md-6 offset-md-4-rm">
                          <button type="submit" class="btn btn-block btn-danger py-3">
                              {{ __('Register') }}
                          </button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
      <div class="py-3 px-1 text-center-rm">
        <small>
          By continuing, you aggree to our <a href="">Terms of Use</a> and <a href="">Privacy policy</a>.
        </small>
      </div>
    </div>
  </div>
  </div>
@endsection
