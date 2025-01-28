<div>


  <!-- Flash message div -->
  <div class="">
    @if (session()->has('errorMessage'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle mr-3"></i>
        {{ session('errorMessage') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  </div>

  {{-- Show in bigger screen --}}
  <div class="mb-3 border shadow-sm d-none d-md-block">
    <div class="table-responsive m-0">
      <table class="table table-sm table-bordered m-0">
        <thead>
          <tr class="bg-white">
            <th class="py-2 border-0-rm pl-2" style="width: 200px;">Search Item</th>
            <th class="py-2">Category</th>
            <th class="py-2">Item</th>
            <th class="py-2" style="width: 100px;">Price</th>
            <th class="py-2" style="width: 50px;">Qty</th>
            <th class="py-2" style="width: 100px;">Total</th>
          </tr>
        </thead>
  
        <tbody>
          <tr class="p-0 font-weight-bold">
            <td class="p-2-rm pb-4-rm h-100 bg-white border-0-rm">
              <input class="m-0 w-100 h-100 border-0 shadow-lg-rm py-2 shadow-lg-rm" type="text"
                  wire:model="add_item_name" wire:keydown.enter="updateProductList"/>
            </td>
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
          </tr>
        </tbody>
      </table>
    </div>
  
    <div class="p-2 m-0 bg-white">
      <div class="row">
        <div class="col-md-8">
          <button class="btn btn-lg btn-success mr-3" wire:click="addItemToSaleQuotation">
            <i class="fas fa-plus mr-2"></i>
            Add
          </button>
          <button class="btn btn-lg btn-danger" wire:click="resetInputFields">
            Reset
          </button>
          @include ('partials.dashboard.spinner-button')
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


</div>
