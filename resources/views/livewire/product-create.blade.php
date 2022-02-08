<x-box-create title="Create product">

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model.defer="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Category</label>
    <select class="form-control" wire:model.defer="product_category_id">

      <option>---</option>

      @foreach ($productCategories as $productCategory)
        <option value="{{ $productCategory->product_category_id }}">{{ $productCategory->name }}</option>
      @endforeach

    </select>
  </div>

  <div class="form-group">
    <label for="">Selling price</label>
    <input type="text" class="form-control" wire:model.defer="selling_price">
    @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>

</x-box-create>
