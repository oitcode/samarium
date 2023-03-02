<div>

  <div class="my-3 py-2 border d-flex justify-content-end">

    <button class="btn btn-light" wire:click="$emit('exitProductDisplayMode')">
      Close
    </button>

  </div>

  <div class="row">
    <div class="col-md-9">
      <div class="px-3 bg-white border">
        <div class="bg-success-rm text-white-rm">
          @if (false)
          <div class="bg-secondary mb-3" style="font-size: 0.2rem;">
            &nbsp;
          </div>
          @endif
          <div class="d-flex justify-content-between my-3">
            {{-- Product name --}}
            <h1 class="h2">
              {{ $product->name }}
            </h1>
            {{-- Product media --}}
            <div>
              @if ($product->image_path)
                <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
              @else
                <i class="fas fa-dice-d6 fa-8x"></i>
              @endif
            </div>
          </div>
        </div>
        <hr />

        <div class="mb-3">
          <h2 class="h6 font-weight-bold" style="font-size: 0.8rem;">
            Category
          </h2>
          <div class="" style="font-size: 0.8rem;">
            <span class="">
              {{ $product->productCategory->name }}
            </span>
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
        <hr />


        <div class="mb-3 py-3 border-rm">
          <h2 class="h6 font-weight-bold">
            Selling price
          </h2>
          <div class="h2">
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
        <div class="mb-4">
          <h3 class="h4">
            <i class="fas fa-info-circle mr-2"></i>
            Product history
          </h3>
        </div>
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
        <div class="mb-4">
          <h3 class="h4">
            <i class="fas fa-info-circle mr-2"></i>
            Stock info
          </h3>
        </div>
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

          {{-- Base product --}}
          <div class="border-rm bg-white mb-3">
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
        @endif

      </div>

    </div>

    </div>
  </div>
</div>
