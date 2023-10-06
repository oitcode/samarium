<div class="p-0">
  <div class="my-3 p-3 bg-white border shadow" style="font-size: 1.1rem;">
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
    <div class="my-4">
      @include ('partials.button-general', ['btnText' => 'Add', 'clickMethod' => 'addItemToSaleInvoice',])
      @include ('partials.button-general', ['btnText' => 'Reset', 'clickMethod' => 'resetInputFields', 'btnColor' => 'light',])
  
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
