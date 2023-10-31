<div>


  <h1 class="h5 my-2 py-2">
    Products

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->productCategory->name }}

    <i class="fas fa-angle-right mx-2"></i>
    {{ $product->name }}
  </h1>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  <div>
    <div>
      <div class="mt-0 p-2 d-flex justify-content-end border" style="background-color: #dadada;">

        <div>
          <button class="btn btn-light" wire:click="$refresh">
            <i class="fas fa-refresh"></i>
            @if (false)
            Refresh
            @endif
          </button>

          <button class="btn btn-light" wire:click="$emit('exitProductDisplayMode')">
            <i class="fas fa-times"></i>
            @if (false)
            Close
            @endif
          </button>
        </div>

      </div>
    </div>
  </div>


  <div class="row border bg-white" style="margin: auto;">

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

    {{-- Product info --}}
    <div class="col-md-6">
      <div class="px-3">
        <div>
          @if ($modes['updateProductNameMode'])
            @livewire ('product.dashboard.product-edit-name', ['product' => $product,])
          @else
            <div class="bg-light text-secondary font-weight-bold mr-5 pt-3 pb-1">
              Product Name
            </div>
            <div class="d-flex justify-content-between my-1">
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
              <button class="btn btn-light" wire:click="enterMode('updateProductNameMode')">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>
          @endif
        </div>
        @if (true)
        <hr class="m-0 p-0"/>
        @endif

        <div class="mb-1">
          <div class="bg-light text-secondary font-weight-bold mr-5 py-1">
            Category
          </div>
          <div class="d-flex justify-content-between" style="">
            <span>
              {{ $product->productCategory->name }}
            </span>
            <button class="btn btn-light">
              <i class="fas fa-pencil-alt"></i>
            </button>
          </div>
        </div>
        @if (true)
        <hr class="m-0 p-0"/>
        @endif

        <div class="mb-3">
          @if ($modes['updateProductDescriptionMode'])
            @livewire ('product.dashboard.product-edit-description', ['product' => $product,])
          @else
            <div class="bg-light text-secondary font-weight-bold mr-5 py-1">
              Description
            </div>
            <div class="d-flex justify-content-between">
              {{ $product->description }}
              <button class="btn btn-light" wire:click="enterMode('updateProductDescriptionMode')">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>
          @endif
        </div>
        @if (true)
        <hr class="m-0 p-0"/>
        @endif

        <div class="mb-3">
          @if ($modes['updateProductPriceMode'])
            @livewire ('product.dashboard.product-edit-price', ['product' => $product,])
          @else
            <div class="bg-light text-secondary font-weight-bold mr-5 py-1">
              Price
            </div>
            <div class="d-flex justify-content-between">
              Rs
              @php echo number_format( $product->selling_price ); @endphp
              <button class="btn btn-light" wire:click="enterMode('updateProductPriceMode')">
                <i class="fas fa-pencil-alt"></i>
              </button>
            </div>
          @endif
        </div>
        @if (true)
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
  </div>

  {{-- Product gallery --}}
  <div class="my-3 bg-white border">
    <h2 class="h5 m-3">
      Product gallery
    </h2>

      {{-- Toolbar --}}
      @if (false)
      @if ($modes['updateProductAddProductSpecificationMode'])
      @else
      @endif
      @livewire ('cms.dashboard.gallery-display', ['gallery' => \App\Gallery::first(),])
      @endif


    @if ($product->gallery)
      <div class="my-3">
        <span class="px-3 my-3 text-secondary">
          <i class="fas fa-exclamation-circle mr-1"></i>
          Yes
        </span>
        <button class="btn btn-light" wire:click="enterMode('updateProductAddProductSpecificationMode')">
          <i class="fas fa-plus-circle mr-1"></i>
          Edit gallery
        </button>
      </div>
    @else
      <div class="my-3">
        <span class="px-3 my-3 text-secondary">
          <i class="fas fa-exclamation-circle mr-1"></i>
          No gallery
        </span>
        <button class="btn btn-light" wire:click="enterMode('updateProductAddProductSpecificationMode')">
          <i class="fas fa-plus-circle mr-1"></i>
          Add gallery
        </button>
      </div>
    @endif

  </div>

  {{-- Product specifications --}}
  <div class="my-3 bg-white border">
    <h2 class="h5 m-3">
      Product specifications
    </h2>

      {{-- Toolbar --}}
      @if ($modes['updateProductAddProductSpecificationMode'])
      @else
        <div class="p-2 bg-white border">
            <button class="btn btn-light" wire:click="enterMode('updateProductAddProductSpecificationMode')">
              <i class="fas fa-plus-circle mr-1"></i>
              Add specification
            </button>
        </div>
      @endif

    <!-- Flash message div -->
    @if (session()->has('addSpecMessage'))
      <div class="p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-3"></i>
          {{ session('addSpecMessage') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span class="text-danger" aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    @if ($modes['updateProductAddProductSpecificationMode'])
      @livewire ('product.dashboard.product-edit-add-product-specification', ['product' => $product,])
    @endif

    @if (count($product->productSpecifications) > 0)
      <div class="mb-5">
        <div class="table-responsive">
          <table class="table mb-0">
            @foreach ($product->productSpecifications as $spec)
              <tr class="">
                <th class="border-dark" style="background-color: #eee;">
                  {{ $spec->spec_heading }}
                </th>
                <td class="border-dark">
                  {{ $spec->spec_value }}
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    @endif

  </div>



  {{-- Active/Inactive, Show/Hide in website. --}} 
  <div class="my-4 bg-white">
    <h2 class="h5 m-3 pt-3">
      Misc settings
    </h2>
    <div>
      <div class="mt-0 p-2 d-flex justify-content-between border"
          style="{{-- background-color: #dadada; --}}">
        <div>
          @if ($product->is_active == 0)
            <button class="btn btn-light mr-1" wire:click="makeProductActive">
              <i class="fas fa-eye mr-2"></i>
              @if (true)
              <span>
                Make active </span>
              @endif
            </button>
          @elseif ($product->is_active == 1)
            <button class="btn btn-light mr-1" wire:click="makeProductInactive">
              <i class="fas fa-eye-slash mr-2"></i>
              @if (true)
              <span>
                Make inactive
              </span>
              @endif
            </button>

            @if ($product->show_in_front_end == 'yes')
              <button class="btn btn-light mr-1" wire:click="makeProductNotVisibleInFrontEnd">
                <i class="fas fa-eye-slash mr-2"></i>
                @if (true)
                <span class="">
                  Hide in website
                </span>
                @endif
              </button>
            @else
              <button class="btn btn-light mr-1" wire:click="makeProductVisibleInFrontEnd">
                <i class="fas fa-eye-slash mr-2"></i>
                @if (true)
                <span class="">
                  Show in website
                </span>
                @endif
              </button>
            @endif
          @else
          @endif
        </div>

      </div>
    </div>
  </div>


  {{-- Creation and update info --}} 
  <div class="border bg-white p-3 my-3">
    <div class="mb-4">
      <h3 class="h5"> Product history </h3>
    </div>
    @if (false)
    <div class="row">
      <div class="col-3">
        Created by
      </div>
      <div class="col-6">
        xx
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-1">
        Created at
      </div>
      <div class="col-6" style="font-size: 0.8rem;">
        {{ $product->created_at }}
      </div>
    </div>
    <div class="row">
      <div class="col-1">
        Updated at
      </div>
      <div class="col-6" style="font-size: 0.8rem;">
        {{ $product->updated_at }}
      </div>
    </div>
  </div>

  {{-- Inventory info --}}
  <div class="bg-white p-3 mb-3">
    <div class="mb-4">
      <h3 class="h5">
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
      <div class="mb-3">
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
