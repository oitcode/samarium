<div>

  <div>
    <div class="row">
      <div class="col-md-12">
        <h2 class="h5 o-heading o-footer-text-color">
          Subscribe us
        </h2>
        <p>
          {{ $introMessage }}
        </p>

        <!-- Flash message div -->
        @if (session()->has('subscriptionMessage'))
          <div class="p-2">
            <div class="alert alert-dismissible fade show px-0" role="alert">
              <i class="fas fa-check-circle mr-3"></i>
              {{ session('subscriptionMessage') }}
              <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span class="text-danger" aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        @endif

        <div class="form-group">
          <input type="text" class="form-control" wire:model="email" placeholder="Enter a valid email address" />
          @error ('email')
            <div class="my-2m">
              <i class="fas fa-exclamation-circle r-1"></i>
              <span>{{ $message }}</span>
            </div>
          @enderror
        </div>
        <div class="mt-4 d-flex">
          <button class="btn px-3 shadow badge-pill" wire:click="store"
              style="
                  @if ($cmsTheme)
                    background-image:
                        linear-gradient(
                            to bottom right,
                            {{ $cmsTheme->ascent_bg_color }},
                            {{ $cmsTheme->ascent_bg_color }}
                        );
                        color: {{ $cmsTheme->ascent_text_color }};
                  @else
                    background-color: #123;
                    color: white;
                  @endif
                  "
          >
            Subscribe
          </button>
        </div>
      </div>
    </div>
  </div>

</div>
