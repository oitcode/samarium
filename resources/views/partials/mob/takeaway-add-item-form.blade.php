<div class="m-2 p-3 border-rm">
  <div class="p-3 border shadow" style="font-size: 1.1rem;">
    @if (true)
    {{-- Category --}}
    <div class="form-group">
      <label>
        Category
      </label>
      <select class="w-100 h-100 custom-control" wire:model.defer="search_product_category_id" wire:change="selectProductCategory">
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
      <select class="w-100 h-100 custom-control border-0-rm" wire:model.defer="product_id" wire:change="selectItem">
        <option>---</option>
  
        @foreach ($products as $product)
          <option value="{{ $product->product_id }}">
            {{ $product->name }}
          </option>
        @endforeach
      </select>
    </div>

    {{-- Price --}}
    <div class="form-group">
      <label>
        Price
      </label>
      <div>
        @if ($selectedProduct)
          @php echo number_format( $total ); @endphp
        @else
          <span class="text-muted" style="font-size: 1rem;">
            No product selected
          </span>
        @endif
      </div>
    </div>

    {{-- Count --}}
    <div class="form-group">
      <label>
        Quantity
      </label>
      <input class="w-100 h-100 font-weight-bold border-0-rm" type="text" wire:model.defer="quantity" wire:keydown.enter="updateTotal"/>
    </div>
    @endif

    {{-- Submit button --}}
    <div class="my-3">
      <button class="btn btn-lg btn-success mr-3" wire:click.prevent="addItemToTakeaway" style="font-size: 1.3rem;">
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
