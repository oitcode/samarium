<div class="row border bg-white" style="margin: auto;">


  {{-- Product info --}}
  <div class="col-md-9">
    <div class="py-3">
      <div class="mb-4">
        @if ($modes['updateProductNameMode'])
          @livewire ('product.dashboard.product-edit-name', ['product' => $product,])
        @else
          <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
            Product Name
            <button class="btn btn-light text-primary" wire:click="enterMode('updateProductNameMode')">
              @if (false)
              <i class="fas fa-pencil-alt text-muted"></i>
              @endif
              Edit
            </button>
          </div>
          <hr class="m-0 p-0" />
          <div class="d-flex justify-content-between my-0">
            {{-- Product name --}}
            <div class="d-flex">
              @if (false)
              <div class="font-weight-bold mr-5">
                Product Name
              </div>
              @endif
              <div>
                <h1 class="h5">
                  {{ $product->name }}
                </h1>
              </div>
            </div>
          </div>
        @endif
      </div>
      @if (false)
      <hr class="m-0 p-0"/>
      @endif

      <div class="mb-4">
        <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
          Category
          <a class="text-primary">
              @if (false)
              <i class="fas fa-pencil-alt text-muted"></i>
              @endif
              Edit
          </a>
        </div>
        <div class="d-flex justify-content-between" style="">
          <span>
            {{ $product->productCategory->name }}
          </span>
        </div>
      </div>
      @if (false)
      <hr class="m-0 p-0"/>
      @endif

      <div class="mb-4">
        @if ($modes['updateProductDescriptionMode'])
          @livewire ('product.dashboard.product-edit-description', ['product' => $product,])
        @else
          <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
            Description
            <button class="btn btn-light text-primary" wire:click="enterMode('updateProductDescriptionMode')">
              @if (false)
              <i class="fas fa-pencil-alt text-muted"></i>
              @endif
              Edit
            </button>
          </div>
          <div class="d-flex justify-content-between font-weight-bold">
            {{ $product->description }}
          </div>
        @endif
      </div>
      @if (false)
      <hr class="m-0 p-0"/>
      @endif

      <div class="mb-3">
        @if ($modes['updateProductPriceMode'])
          @livewire ('product.dashboard.product-edit-price', ['product' => $product,])
        @else
          <div class="bg-white text-secondary font-weight-bold mr-5 pt-3 pb-1-rm">
            Price
            <button class="btn btn-light text-primary ml-2" wire:click="enterMode('updateProductPriceMode')">
              @if (false)
              <i class="fas fa-pencil-alt text-muted"></i>
              @endif
              Edit
            </button>
          </div>
          <div class="d-flex justify-content-between font-weight-bold">
            Rs
            @php echo number_format( $product->selling_price ); @endphp
          </div>
        @endif
      </div>
      @if (false)
      <hr class="m-0 p-0"/>
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

  {{-- Product image --}}
  <div class="col-md-3 bg-light">
    <div class="d-flex justify-content-center h-100">
      <div class="d-flex flex-column justify-content-center h-100">
        {{-- Product media --}}
        <div>
          @if ($modes['updateProductImageMode'])
            @livewire ('product.dashboard.product-edit-image', ['product' => $product,])
          @else
            <div>
              <div class="my-4">
                <button class="btn btn-light" wire:click="enterMode('updateProductImageMode')">
                  <i class="fas fa-pencil-alt"></i>
                </button>
              </div>
            </div>
            @if ($product->image_path)
              <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 200px; height: 200px;">
            @else
              <i class="fas fa-dice-d6 text-muted fa-8x"></i>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
