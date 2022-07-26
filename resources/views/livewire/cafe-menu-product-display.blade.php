<div>
  <div class="mb-4" wire:click="$refresh">
    Refresh
  </div>

  <div class="p-3 bg-white border">
    <h1 class="h4 mb-4">
      {{ $product->name }}
    </h1>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Description
      </h2>
      <div>
      {{ $product->description }}
      </div>
    </div>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Product Category
      </h2>
      <div>
      {{ $product->productCategory->name }}
      </div>
    </div>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Selling price
      </h2>
      <div>
      Rs
      @php echo number_format( $product->selling_price ); @endphp
      </div>
    </div>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Base product
      </h2>
      <div>
        @if ($product->is_base_product)
          Yes
        @else
          No
        @endif
      </div>
    </div>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Stock applicable
      </h2>
      <div>
        {{ $product->stock_applicable }}
      </div>
    </div>

    @if ($product->stock_applicable == 'yes')
    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Stock count
      </h2>
      <div>
      {{ $product->stock_count }}
      </div>
    </div>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Inventory unit
      </h2>
      <div>
      {{ $product->inventory_unit }}
      </div>
    </div>
    @endif

    @if ($product->baseProduct)
    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Base product
      </h2>
      <div>
      {{ $product->baseProduct->name }}
      </div>
    </div>

    <div class="mb-3">
      <h2 class="h6 font-weight-bold">
        Inventory unit consumption
      </h2>
      <div>
      {{ $product->inventory_unit_consumption }}
      {{ $product->baseProduct->inventory_unit }}
      </div>
    </div>
    @endif



  </div>
</div>
