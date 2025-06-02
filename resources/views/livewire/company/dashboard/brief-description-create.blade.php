<div>

  <div>
    <h1 class="h6 o-heading">
      Create brief description
    </h1>

    <div class="form-group">
      <label for="">Brief description</label>
      <textarea rows="5" class="form-control" wire:model="brief_description">
      </textarea>
      @error ('brief_description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'briefDescriptionCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>
