<div>


  <div class="form-group">
    <label class="h5">Category *</label>
    <select class="custom-select shadow-sm" wire:model="product_category_id" style="font-size: 1.3rem;">
      <option>---</option>
      @foreach ($productCategories as $productCategory)
        <option value="{{ $productCategory->product_category_id }}">
          {{ $productCategory->name }}
        </option>
      @endforeach
    </select>
    @error ('product_category_id') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$dispatch('productUpdateCategoryCancelled')">
      Cancel
    </button>
  </div>


</div>
