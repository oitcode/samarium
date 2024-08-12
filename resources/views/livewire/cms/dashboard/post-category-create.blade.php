<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h3 class="h5 text-secondary">
        Create new post category
    </h3>
  
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name"
          style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        Submit
      </button>
      <button type="submit" class="btn btn-danger"
          wire:click="$dispatch('createPostCategoryCanceled')"
          style="font-size: 1.3rem;">
        Cancel
      </button>
    </div>
  
  </div>
</div>
