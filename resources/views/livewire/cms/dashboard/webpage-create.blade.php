<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h3 class="h5 text-secondary">
      @if ($is_post == 'yes')
        Create new post
      @else
        Create new page
      @endif
    </h3>
  
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($is_post == 'no')
    <div class="form-group">
      <label for="">Permalink</label>
      <input type="text"
          class="form-control"
          wire:model.defer="permalink"
          style="font-size: 1.3rem;">
      @error('permalink') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        Submit
      </button>
      <button type="submit"
          class="btn btn-danger"
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
    </div>
  
  </div>
</div>
