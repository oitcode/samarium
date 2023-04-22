<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h3 class="h5 text-secondary">
      Create company info
    </h3>
  
    <div class="form-group">
      <label for="">Key</label>
      <input type="text"
          class="form-control"
          wire:model.defer="info_key"
          style="font-size: 1.3rem;">
      @error('info_key') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Value</label>
      <input type="text"
          class="form-control"
          wire:model.defer="info_value"
          style="font-size: 1.3rem;">
      @error('info_value') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        Submit
      </button>
      <button type="submit"
          class="btn btn-danger"
          wire:click="$emit('companyInfoCreateCanceled')"
          style="font-size: 1.3rem;">
        Cancel
      </button>
    </div>
  
  </div>
</div>
