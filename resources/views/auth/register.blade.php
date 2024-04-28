@extends ('ecomm-website.base')

@section ('content')
  <div class="container p-3">
  <div class="d-flex-rm justify-content-center-rm h-100">
    <div class="d-flex flex-column justify-content-center py-3">


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
            <div class="row">
              <div class="col-md-6">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
      
                    <div class="form-group row-rm">
                        <label for="name" class="col-md-4-rm col-form-label text-md-right-rm">{{ __('Name') }}</label>
                        <br/>
      
                        <div class="col-md-6-rm">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
      
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
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
      
                    <div class="form-group row-rm">
                        <label for="password-confirm" class="col-md-4-rm col-form-label text-md-right-rm">{{ __('Confirm Password') }}</label>
      
                        <div class="col-md-6-rm">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
              </div>
              <div class="col-md-6">

                <div class="my-4 text-secondary pr-5">
                  Thanks for creating an account with us.
                  We are sure you will get a seamless
                  experience.
                </div>

                @if (false)
                <h2 class="h6 font-weight-bold">
                  Sign up to get benefits
                </h2>

                <div>
                  <div>
                    <i class="fas fa-check text-success mr-1"></i>
                    Awesome software
                  </div>
                  <div>
                    <i class="fas fa-check text-success mr-1"></i>
                    Productivity tools
                  </div>
                  <div>
                    <i class="fas fa-check text-success mr-1"></i>
                    Receive notifications
                  </div>
                  <div>
                    <i class="fas fa-check text-success mr-1"></i>
                    Much more
                  </div>
                </div>
                @endif

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
  </div>
  </div>
@endsection
