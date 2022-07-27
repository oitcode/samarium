<div>
  <div class="mb-4">
    <h1 style="font-size: 1.3rem;">
      Add product
    </h1>

  </div>

  <div class="row border bg-white">
    <div class="col-md-6">




<div class="card shadow-sm border-0">
  <div class="card-body p-3 border-0">

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


  </div>
</div>







    </div>
    <div class="col-md-6 pt-3">

    <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Is active</label>
      <select class="custom-select" wire:model.defer="is_active" style="font-size: 1.3rem;">
        <option>---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
      </select>
      @error ('is_active') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="pt-3">
      <button class="btn btn-success" wire:click="makeStockApplicable">
        Stock applicable
      </button>
    </div>





@if ($modes['stockApplicable'])
<div class="card shadow-sm border-0 mt-3">
  <div class="card-body p-0 border-0">

    <h1 class="mb-4 h5">
      Additional info
    </h1>

    <div class="form-group">
      <label for="">Stock applicable</label>
      <select class="custom-select" wire:model.defer="stock_applicable" style="font-size: 1.3rem;">
        <option value="yes">Yes</option>
        <option value="no">No</option>
      </select>
      @error('stock_applicable') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Inventory unit</label>
      <input type="text"
          class="form-control"
          wire:model.defer="inventory_unit"
          style="font-size: 1.3rem;">
      @error ('inventory_unit') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Opening stock count</label>
      <input type="text"
          class="form-control"
          wire:model.defer="stock_count"
          style="font-size: 1.3rem;">
      @error('stock_count') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Is base product</label>
      <select class="custom-select" wire:model.defer="is_base_product" style="font-size: 1.3rem;">
        <option>---</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
      </select>
      @error ('is_base_product') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
      <label>Base product</label>
      <select class="custom-select" wire:model.defer="base_product_id" style="font-size: 1.3rem;">
        <option>---</option>
        @if (true)
        @foreach ($baseProducts as $baseProduct)
          <option value="{{ $baseProduct->product_id }}">
            {{ $baseProduct->name }}
          </option>
        @endforeach
        @endif
      </select>
      @error ('base_product_id') <span class="text-danger">{{ $message }}</span>@enderror
    </div>


    <div class="form-group">
      <label for="">Inventory Unit Consumption</label>
      <input type="text"
          class="form-control"
          wire:model.defer="inventory_unit_consumption"
          style="font-size: 1.3rem;">
      @error ('inventory_unit_consumption') <span class="text-danger">{{ $message }}</span> @enderror
    </div>





  </div>
</div>
@endif

    <div class="py-4 m-0">
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
</div>
