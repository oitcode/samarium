<div class="card">
  <div class="card-body">
  
    <h3 class="h5 mb-3">
      Create company info
    </h3>
  
    <div class="form-group">
      <label for="">Key</label>
      <input type="text"
          class="form-control"
          wire:model.defer="info_key">
      @error('info_key') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Value</label>
      <input type="text"
          class="form-control"
          wire:model.defer="info_value">
      @error('info_value') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4">
      <button type="submit"
          class="btn btn-success mr-2" wire:click="store">
        Submit
      </button>
      <button type="submit"
          class="btn btn-danger"
          wire:click="$emit('companyInfoCreateCanceled')">
        Cancel
      </button>
    </div>
  
  </div>
</div>
