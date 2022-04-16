<div class="card shadow-sm w-100">
  <div class="card-body p-3">
    <h1 class="mb-4" style="font-size: 1.3rem;">
      Edit product
    </h1>

    @if (session()->has('success'))
      <div>
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      </div>
    @endif

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
      <label for="">Price</label>
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

    <div class="p-3 m-0">
      <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="update">
        Update
      </button>

      <button class="btn btn-lg badge-pill btn-danger mr-3" wire:click="$emit('exitUpdateProductMode')">
        Cancel
      </button>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>

    @if (false)
    <tr style="font-size: 1.3rem; height: 50px;">
      <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
        <span class="ml-4">
          Image
        </span>
      </td>
        
      <td class="p-0 h-100 font-weight-bold  @error('image') border-danger @enderror">
        <img src="{{ asset('storage/' . $product->image_path) }}" class="img-fluid">
      </td>

    </tr>
    @endif

  </div>
</div>
