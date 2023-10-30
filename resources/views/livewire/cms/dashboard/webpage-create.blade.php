<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h1 class="h5 font-weight-bold mb-4">
      @if ($is_post == 'yes')
        Create new post
      @else
        Create new page
      @endif
    </h1>
  
    <div class="form-group">
      <label for="">Name *</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($is_post == 'no')
    <div class="form-group">
      <label for="">Permalink *</label>
      <input type="text"
          class="form-control"
          wire:model.defer="permalink"
          style="font-size: 1.3rem;">
      @error('permalink') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="mt-4" style="font-size: 1.3rem;">
      @include ('partials.button-store')
      @if ($is_post == 'yes')
        @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreatePostMode',])
      @else
        @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
      @endif

      @if (false)
      <button type="submit"
          class="btn btn-danger-rm"
          wire:click="$emit(
              @if ($is_post == 'yes')
                'exitCreatePostMode'
              @else
                'exitCreateMode'
              @endif
          )"
          style="font-size: 1.3rem;">
        Cancel
      </button>
      @endif
    </div>
  
  </div>
</div>
