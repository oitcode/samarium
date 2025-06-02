<div>

  <div>
    <h1 class="h6 o-heading">
      Create google map share link
    </h1>

    <div class="form-group">
      <label for="">Google map share link</label>
      <input type="text" class="form-control" wire:model="google_map_share_link" />
      @error ('google_map_share_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'googleMapShareLinkCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>
