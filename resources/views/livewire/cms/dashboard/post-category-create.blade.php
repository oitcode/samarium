<div class="card">
  <div class="card-body">
  
    <h3 class="h5 text-secondary">
        Create new post category
    </h3>
  
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4">
      <button type="submit"
          class="btn btn-success" wire:click="store">
        Submit
      </button>
      <button type="submit" class="btn btn-danger"
          wire:click="$dispatch('createPostCategoryCanceled')">
        Cancel
      </button>
    </div>
  
  </div>
</div>
