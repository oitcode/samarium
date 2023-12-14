<div>


  <div class="p-3-rm">

    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Create google map share link
    </h1>

    <div class="form-group">
      <label for="">Google map share link</label>
      <input type="text" class="form-control"
          wire:model.defer="google_map_share_link"
          style="font-size: 1.3rem;" />
      @error ('google_map_share_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    <div class="py-3 m-0">

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'googleMapShareLinkCreateCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
