<div class="m-2 p-3 border-rm">
  <div class="p-3 border shadow" style="font-size: 1.1rem;">
    @if (true)
    {{-- Category --}}
    <div class="form-group">
      <label>
        Category
      </label>
      <select class="w-100 h-100 custom-control" wire:model="search_product_category_id" wire:change="selectProductCategory">
        <option>---</option>
  
        @foreach ($productCategories as $productCategory)
          <option value="{{ $productCategory->product_category_id }}">
            {{ $productCategory->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Products --}}
    <div class="form-group">
      <label>
        Product
      </label>
      <select class="w-100 h-100 custom-control border-0-rm" wire:model="product_id" wire:change="selectItem">
        <option>---</option>
  
        @foreach ($products as $product)
          <option value="{{ $product->product_id }}">
            {{ $product->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Quantity --}}
    <div class="form-group">
      <label>
        Quantity
      </label>
      <input class="w-100 h-100 font-weight-bold" type="text" wire:model="quantity" wire:keydown.enter="updateTotal"/>
    </div>

    {{-- Unit --}}
    <div class="form-group">
      <label>
        Unit
      </label>
      <select class="w-100 h-100 custom-control border-0-rm" wire:model="unit">
        <option>---</option>
        <option value="pcs">PCS</option>
        <option value="kg">KG</option>
        <option value="l">L</option>
      </select>
    </div>

    {{-- Price --}}
    <div class="form-group">
      <label>
        Price per unit
      </label>
      <input class="w-100 h-100 font-weight-bold" type="text" wire:model="purchase_price_per_unit" wire:change="updateTotal"/>
    </div>

    @endif

    {{-- Submit button --}}
    <div class="my-3">
      <button class="btn btn-lg btn-success mr-3" wire:click.prevent="addItemToPurchase" style="font-size: 1.3rem;">
        <i class="fas fa-plus-circle mr-2"></i>
        Add
      </button>
  
      @if (true)
      <button class="btn btn-lg btn-danger" wire:click.prevent="resetInputFields" style="font-size: 1.3rem;">
        <i class="fas fa-sync mr-2"></i>
        Reset
      </button>
      @endif
  
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
