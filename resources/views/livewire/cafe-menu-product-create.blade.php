<div class="card shadow-sm">
  <div class="card-body p-3">

    <h1 class="mb-4" style="font-size: 1.3rem;">
      Add product
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
      <label>Category</label>
      <select class="custom-select" wire:model.defer="product_category_id" style="font-size: 1.3rem;">
        <option>---</option>
        @foreach ($productCategories as $productCategory)
          <option value="{{ $productCategory->product_category_id }}">
            {{ $productCategory->name }}
          </option>
        @endforeach
      </select>
      @error ('product_category_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
      <label for="">Description</label>
      <input type="text"
          class="form-control"
          wire:model.defer="description"
          style="font-size: 1.3rem;">
      @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Selling price</label>
      <input type="text"
          class="form-control"
          wire:model.defer="selling_price"
          style="font-size: 1.3rem;">
      @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Stock count</label>
      <input type="text"
          class="form-control"
          wire:model.defer="stock_count"
          style="font-size: 1.3rem;">
      @error('stock_count') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="p-3 m-0" {{--style="background-image: linear-gradient(to right, white, #abc);"--}}>
      <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="store">
        Confirm
      </button>

      <button class="btn btn-lg badge-pill btn-danger mr-3" wire:click="$emit('exitCreateProductMode')">
        Cancel
      </button>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
