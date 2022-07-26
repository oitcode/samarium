<div>
  @if (false)
  <div class="mb-4" wire:click="$refresh">
    Refresh
  </div>
  @endif

  <div class="row">
    <div class="col-md-9">
      <div class="px-3 bg-white border">
        <div class="bg-success-rm text-white-rm">
          <div class="bg-secondary mb-3" style="font-size: 0.2rem;">
            &nbsp;
          </div>
          <h1 class="h4 mb-1">
            {{ $product->name }}
          </h1>

          <div class="mb-3">
            <h2 class="h6 font-weight-bold d-inline mr-2" style="font-size: 0.8rem;">
              Category
            </h2>
            <div class="d-inline" style="font-size: 0.8rem;">
              <span class="badge badge-pill badge-info">
                {{ $product->productCategory->name }}
              </span>
            </div>
          </div>
        </div>

        <hr />

        <div class="mb-3">
          <h2 class="h6 font-weight-bold">
            Description
          </h2>
          <div>
          {{ $product->description }}
          </div>
        </div>


        <div class="mb-3 py-3 border-rm bg-light">
          <h2 class="h6 font-weight-bold">
            Selling price
          </h2>
          <div class="h5">
          Rs
          @php echo number_format( $product->selling_price ); @endphp
          </div>
        </div>


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
    <div class="col-md-3">
      {{-- Creation and update info --}}
      <div class="border bg-white p-3 mb-3">
        <div class="row">
          <div class="col-6">
            Created by
          </div>
          <div class="col-6">
            xx
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            Created at
          </div>
          <div class="col-6" style="font-size: 0.8rem;">
            {{ $product->created_at }}
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            Updated at
          </div>
          <div class="col-6" style="font-size: 0.8rem;">
            {{ $product->updated_at }}
          </div>
        </div>
      </div>

      {{-- Inventory info --}}
      <div class="border bg-white p-3 mb-3">
        <div class="row">
          <div class="col-6">
            Stock applicable
          </div>
          <div class="col-6" style="font-size: 0.8rem;">
            {{ $product->stock_applicable }}
          </div>
        </div>

        @if ($product->stock_applicable == 'yes')
          <div class="row">
            <div class="col-6">
              Inventory unit
            </div>
            <div class="col-6" style="font-size: 0.8rem;">
              {{ $product->inventory_unit }}
            </div>
          </div>

          <div class="row">
            <div class="col-6">
              Stock count
            </div>
            <div class="col-6" style="font-size: 0.8rem;">
              {{ $product->stock_count }}
              {{ $product->inventory_unit }}
            </div>
          </div>
        @endif

      </div>

      {{-- Base product --}}
      <div class="border bg-white p-3 mb-3">
        <div class="row">
          <div class="col-6">
            Base product
          </div>
          <div class="col-6" style="font-size: 0.8rem;">
            @if ($product->is_base_product)
              Yes
            @else
              No
            @endif
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>
