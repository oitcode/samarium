@extends ('website.cms.base')

@section ('content')
  <div class="container p-3">
    <div class="row">
      <div class="col-md-6 pt-3">
        <div class="d-flex justify-content-start h-100">
          <div class="d-flex flex-column justify-content-top">
            <h2 class="h2 font-weight-bold mb-4">
              Signup to get started.
            </h2>
          </div>
        </div>
      </div>
      <div class="col-md-6 pt-4 pt-md-0">
        @livewire ('user.website.signup')
      </div>
    </div>
  </div>
@endsection
