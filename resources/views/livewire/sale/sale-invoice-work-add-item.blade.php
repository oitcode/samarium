<div>


  {{--
  | Flash message div
  --}}
  @if (session()->has('errorMessage'))
    @include ('partials.flash-message', [
        'flashMessage' => session('errorMessage'),
    ])
  @endif


  {{--
  | Show in bigger screen
  --}}
  <div class="mb-1 border shadow-sm d-none d-md-block">

    <div class="table-responsive m-0">
      <table class="table table-sm table-bordered m-0">
        <thead>
          <tr class="bg-white" style="font-size: calc(0.6rem + 0.2vw);">
            <th class="py-2 pl-2" style="width: 200px;">
              <div class="d-flex justify-content-between">
                <div class="d-flex flex-column justify-content-center">
                  Search Item
                </div>
                <div>
                  <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="searchTypeDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Select search type
                    </button>
                    <div class="dropdown-menu" aria-labelledby="searchTypeDropdownMenu">
                      <button class="dropdown-item" type="button" wire:click="">Name</button>
                      <button class="dropdown-item" type="button" wire:click="">Barcode</button>
                      <button class="dropdown-item" type="button" wire:click="">Category</button>
                    </div>
                  </div>
                </div>
              </div>
            </th>
            @if (false)
            <th class="py-2">Category</th>
            <th class="py-2">Item</th>
            <th class="py-2" style="width: 100px;">Price</th>
            <th class="py-2" style="width: 50px;">Qty</th>
            <th class="py-2" style="width: 100px;">Total</th>
            @endif
          </tr>
        </thead>
  
        <tbody>
          <tr class="p-0 font-weight-bold" style="height: 50px; font-size: calc(0.8rem + 0.2vw);">
            <td class="h-100 bg-white">
              <input class="m-0 w-100 h-100 border-0 py-2" type="text"
                  wire:model="add_item_name" wire:keydown.enter="updateProductList"/>
            </td>
            @if (false)
            <td class="p-0 h-100">
              <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="search_product_category_id" wire:change="selectProductCategory">
                <option>---</option>
  
                @foreach ($productCategories as $productCategory)
                  <option value="{{ $productCategory->product_category_id }}">
                    {{ $productCategory->name }}
                  </option>
                @endforeach
              </select>
            </td>
            <td class="p-0 h-100">
              <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="product_id" wire:change="selectItem">
                <option>---</option>
  
                @foreach ($products as $product)
                  <option value="{{ $product->product_id }}">
                    {{ $product->name }}
                  </option>
                @endforeach
              </select>
            </td>
            <td class="p-0">
              <div class="d-flex flex-column justify-content-center h-100 bg-light">
                @if ($selectedProduct)
                  @php echo number_format( $selectedProduct->selling_price ); @endphp
                @endif
              </div>
            </td>
            <td class="p-0 h-100">
              <input class="w-100 h-100 font-weight-bold border-0" type="text" wire:model="quantity" wire:keydown.enter="updateTotal"/>
            </td>
            <td class="p-0">
              <div class="d-flex flex-column justify-content-center h-100 bg-white">
                @if ($selectedProduct)
                  @php echo number_format( $total ); @endphp
                @endif
              </div>
            </td>
            @endif
          </tr>
        </tbody>
      </table>
    </div>

    <div class="p-2 m-0 bg-white">
      <div class="row">
        <div class="col-md-8">
          @if (false)
          <button class="mr-3" wire:click="addItemToSaleInvoice" style="font-size: calc(0.7rem + 0.2vw);">
            <i class="fas fa-plus mr-2"></i>
            Add
          </button>
          @endif
  
          <button class="bg-white border-0 text-primary font-weight-bold" wire:click="resetInputFields" style="font-size: calc(0.7rem + 0.2vw);">
            <i class="fas fa-refresh"></i>
            @if (false)
            Reset
            @endif
          </button>
  
          <button wire:loading class="btn">
            <span class="spinner-border spinner-border-sm text-info mr-3" role="status">
            </span>
          </button>
  
        </div>

        @if ($selectedProduct != null)
          <div class="col-md-4" style="height: 50px;">
            <div class="float-right">
              <img src="{{ asset('storage/' . $selectedProduct->image_path) }}" class="img-fluid" style="height: 50px;">
            </div>
            <div class="clearfix">
            </div>
          </div>
        @endif
      </div>
  
    </div>
  
  </div>
  
  @if ($modes['productSelected'])
    <div class="d-flex justify-content-between border p-3 bg-white text-white-rm" wire:key="{{ rand() }}">
      <div>
        Product:
        <br />
        {{ $selectedProduct->name }}
      </div>
      <div class="d-flex">
        <div class="mr-4">
          Qty
          <br />
          <input class="font-weight-bold border" type="text" wire:model="quantity" wire:keydown.enter="updateTotal" wire:change="updateTotal" />
        </div>
        <div class="mr-4">
          Price per unit
          <br />
          {{ $selectedProduct->selling_price }}
        </div>
        <div class="mr-4">
          Total
          <br />
          @if ($selectedProduct)
            @php echo number_format( $total ); @endphp
          @endif
        </div>
        <div class="px-3">
          Action
          <br />
          <button class="btn btn-primary" wire:click="addItemToSaleInvoice">
            Add
          </button>
        </div>
      </div>
    </div>
  @else
    @if ($products != null && count($products) > 0)
      <div class="mb-4">
        @foreach ($products as $product)
          <div class="d-flex justify-content-between border p-3 bg-white text-white-rm" wire:key="{{ rand() }}">
            <div>
              {{ $product->name }}
            </div>
            <div class="d-flex">
              @if ($modes['productSelected'])
              <div>
                Qty
                <br />
                <input type="text" />
              </div>
              <div>
                Price per unit
                <br />
                {{ $selectedProduct->selling_price }}
              </div>
              @endif
              <div class="px-3">
                <button class="btn btn-primary" wire:click="selectItemNew({{ $product }})">
                  Select
                </button>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  @endif


  {{--
  | Show in smaller screen
  --}}
  <div class="d-md-none mb-3">
    @if (! $modes['showMobForm'])
      <button class="btn btn-success ml-3" wire:click="showAddItemFormMob" style="font-size: 1.3rem;">
        Add item
      </button>
    @else
      <button class="btn btn-danger ml-3" wire:click="hideAddItemFormMob" style="font-size: 1.3rem;">
        Cancel
      </button>
    @endif

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>

    @if ($modes['showMobForm'])
      <div>
        @include ('partials.mob.add-item-form')
      </div>
    @endif
  </div>


</div>
