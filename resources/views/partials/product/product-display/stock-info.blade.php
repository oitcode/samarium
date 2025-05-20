<div class="bg-white p-3 mb-3">
  <div class="mb-4">
    <h3 class="h6 o-heading">
      Stock info
    </h3>
  </div>
  <div class="row">
    <div class="col-6">
      Stock applicable:
      &nbsp;
      {{ ucwords($product->stock_applicable) }}
    </div>
    <div class="col-6">
    </div>
  </div>

  @if ($product->stock_applicable == 'yes')
    <div class="row">
      <div class="col-6">
        Inventory unit
      </div>
      <div class="col-6">
        {{ $product->inventory_unit }}
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        Stock count
      </div>
      <div class="col-6">
        {{ $product->stock_count }}
        {{ $product->inventory_unit }}
      </div>
    </div>

    {{-- Base product --}}
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          Base product
        </div>
        <div class="col-6">
          @if ($product->is_base_product)
            Yes
          @else
            No
          @endif
        </div>
      </div>
    </div>
  @endif

</div>
