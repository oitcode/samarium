<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h3 class="h5 text-secondary">Add webpage content</h3>
  
    <div class="form-group">
      <label for="">Body</label>
      <textarea
          class="form-control"
          wire:model.defer="body"
          style="font-size: 1.3rem;"
          rows="5">
      </textarea>
      @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        Submit
      </button>
      <button type="submit"
          class="btn btn-danger" wire:click="$emit('exitCreateWebpageContent')"
          style="font-size: 1.3rem;">
        Cancel
      </button>
    </div>
  
  </div>
</div>
