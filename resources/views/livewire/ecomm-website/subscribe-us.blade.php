<div>


  <div class="px-3-rm text-white">
    <div class="row">
      <div class="col-md-6 py-4">
        <h2 class="h5 font-weight-bold text-center-rm">
          Subscribe us
        </h2>
        <p class="text-muted-rm text-center-rm">
          Please enter your email address to get regular updates on our products.
        </p>

        <!-- Flash message div -->
        @if (session()->has('subscriptionMessage'))
          <div class="p-2">
            <div class="alert alert-success-rm alert-dismissible fade show px-0" role="alert">
              <i class="fas fa-check-circle mr-3"></i>
              {{ session('subscriptionMessage') }}
              <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                <span class="text-danger" aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        @endif

        <div class="form-group">
          <input type="text" class="form-control" wire:model.defer="email" placeholder="Enter a valid email address" />
          @error('email')
            <div class="my-2 text-white">
              <i class="fas fa-exclamation-circle r-1"></i>
              <span class="text-white">{{ $message }}</span>
            </div>
          @enderror
        </div>
        <div class="mt-4 d-flex justify-content-center-rm">
          <button class="btn btn-danger shadow border border-light" wire:click="store">
            Subscribe
          </button>
        </div>
      </div>
      @if (true)
      <div class="col-md-6" style="{{--background-image: linear-gradient(to bottom right, #FF512F, #DD2476);--}}">
      </div>
      @endif
    </div>
  </div>



</div>
