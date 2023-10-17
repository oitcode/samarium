@extends ('ecomm-website.base')

@section ('content')
  <div class="container p-3">
    <div class="row">
      <div class="col-md-6 bg-primary-rm pt-3" style="background-image: linear-gradient(to bottom right, #FF512F, #DD2476);">
        <div class="d-flex justify-content-center h-100">
          <div class="d-flex flex-column justify-content-center">
            <h2 class="h2 font-weight-bold text-white mb-4">
              Signup to get started.
            </h2>
            @if (false)
            <h2 class="h4 font-weight-bold text-white">
              Signup to get started.
            </h2>
            @endif
          </div>
        </div>
      </div>
      <div class="col-md-6 pt-4 pt-md-0">
        @livewire ('user.website.signup')
      </div>
    </div>
  </div>
@endsection
