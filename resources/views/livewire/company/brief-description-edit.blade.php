<div>


  <div>
    <div class="form-group">
      <textarea
          rows="5"
          class="form-control"
          wire:model="brief_description">
      </textarea>
      @error ('brief_description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">

      @include ('partials.button-update')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'briefDescriptionEditCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
