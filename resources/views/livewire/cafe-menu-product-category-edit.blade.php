<div class="card shadow-sm w-100">
  <div class="card-body p-3">
    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Edit product category
    </h1>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Does sell</label>
      <select class="form-control" wire:model="does_sell">
        <option value="---">---</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
      @error('does_sell') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="p-3 m-0">
      <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="update">
        Update
      </button>

      <button class="btn btn-lg btn-danger badge-pill mr-3" wire:click="$emit('updateProductCategoryCancelled')">
        Cancel
      </button>

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
