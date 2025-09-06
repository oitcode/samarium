<div>

    <h2 class="h1 o-heading my-4 text-center text-white-rm">
      {{ config('app.what_we_do.heading') }}
    </h2>
    <div class="h5 text-white-rm text-center text-muted">
      {{ config('app.what_we_do.intro') }}
    </div>
    <div class="row mt-4">
        @foreach (config('app.what_we_do.services') as $key => $val)
          <div class="col-md-4 p-3 my-3 mb-4">
            <div class="h-100 p-0 shadow bg-white d-flex flex-column justify-content-start o-border-radius p-3 o-hover-up o-float-up">
              <div class="d-flex-rm bg-danger-rm text-white-rm py-3 text-center">
                @if (false)
                <div class="px-4 mb-4">
                  <i class="fas fa-user-circle fa-4x text-primary"></i>
                </div>
                @endif
                <div>
                  <h2 class="h2 o-heading text-white-rm mb-1">
                    {{ $key }}
                  </h2>
                </div>
              </div>
              <div class="px-3 mb-3 text-muted">
                {{ $val }}
              </div>
            </div>
          </div>
        @endforeach
    </div>

</div>
