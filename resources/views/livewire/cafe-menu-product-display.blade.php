<div>

  <h1 class="h5 my-2">
    <i class="fas fa-circle text-success mr-2"></i>
    Products

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->productCategory->name }}

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->name }}
  </h1>

  {{-- Top tool bar --}}
  <div class="mt-3 p-2 border-rm d-flex justify-content-between {{ env('OC_ASCENT_BG_COLOR') }}  {{ env('OC_ASCENT_TEXT_COLOR') }}">
    <div class="my-5-rm">
    </div>

    <div>
      <button class="btn btn-light mr-1" wire:click="$refresh">
        <i class="fas fa-pencil-alt mr-1"></i>
        Edit
      </button>

      <button class="btn btn-light" wire:click="$refresh">
        <i class="fas fa-refresh mr-1"></i>
        Refresh
      </button>

      <button class="btn btn-light" wire:click="$emit('exitProductDisplayMode')">
        <i class="fas fa-times mr-1"></i>
        Close
      </button>
    </div>

  </div>

  <div class="row border shadow-lg" style="margin: auto;">
    <div class="col-md-6 bg-primary-rm text-white-rm border-right">
      <div class="px-3 bg-white-rm border-rm shadow-rm">
        <div class="bg-success-rm text-white-rm">
          @if (false)
          <div class="bg-secondary mb-3" style="font-size: 0.2rem;">
            &nbsp;
          </div>
          @endif
          <div class="d-flex justify-content-between my-3">
            {{-- Product name --}}
            <h1 class="h2 text-primary-rm">
              {{ $product->name }}
            </h1>
          </div>
        </div>
        @if (false)
        <hr />
        @endif

        <div class="mb-3">
          <h2 class="h4 text-muted-rm">
            @if (false)
            <i class="fas fa-info-circle mr-2"></i>
            @endif
            Category
          </h2>
          <div class="" style="font-size: 0.8rem;">
            <span class="badge badge-dark">
              {{ $product->productCategory->name }}
            </span>
          </div>
        </div>
        @if (false)
        <hr />
        @endif

        <div class="mb-3">
          <h2 class="h4 text-muted-rm">
            @if (false)
            <i class="fas fa-info-circle mr-2"></i>
            @endif
            Description
          </h2>
          <div>
          {{ $product->description }}
          </div>
        </div>
        @if (false)
        <hr />
        @endif


        <div class="mb-3 border-rm">
          <h2 class="h4 text-muted-rm">
            @if (false)
            <i class="fas fa-info-circle mr-2"></i>
            Selling price
            @endif
          </h2>
          <div class="h2">
            <div style="{{--color: orange;--}}">
              Rs
              @php echo number_format( $product->selling_price ); @endphp
            </div>
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

    {{-- Product image --}}
    <div class="col-md-3 bg-light">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-center h-100">
          {{-- Product media --}}
          <div>
            @if ($product->image_path)
              <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
            @else
              <i class="fas fa-dice-d6 text-muted fa-8x"></i>
            @endif
          </div>
        </div>
      </div>
    </div>

    {{-- Product other info --}}
    <div class="col-md-3 border-left bg-secondary-rm text-secondary">
      {{-- Creation and update info --}}
      <div class="border-rm bg-white-rm p-3 mb-3 shadow-rm">
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
      <div class="border-rm bg-white-rm p-3 mb-3 text-secondary">
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
          <div class="border-rm bg-white-rm mb-3">
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
