<div>

  {{-- Show in bigger screen --}}
  <div class="mb-3 border bg-light shadow-sm d-none d-md-block">
  
    @if ($errors->all())
      <div class="p-2 mb-3-rm border text-danger">
        @foreach ($errors->all() as $error)
          <div>
            <i class="fas fa-exclamation-circle mr-1"></i>
            {{ $error }}
          </div>
        @endforeach
      </div>
    @endif

    <div class="table-responsive m-0">
      <table class="table table-bordered m-0">
        <thead>
          <tr class="bg-success-rm text-white-rm">
            <th>Search Item</th>
            <th>Category</th>
            <th>Item</th>
            <th style="width: 50px;">Qty</th>
            <th>Unit</th>
            <th style="width: 110px;">Price per unit</th>
            <th style="width: 100px;">Total</th>
          </tr>
        </thead>
  
        <tbody>
          <tr class="p-0 font-weight-bold" style="height: 50px;">
            <td class="p-0 h-100">
              <input class="m-0 w-100 h-100 border-0" type="text" wire:model="add_item_name" wire:keydown.enter="updateProductList"/>
            </td>
            <td class="p-0 h-100">
              @if (true)
              <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="search_product_category_id" wire:change="selectProductCategory">
                <option>---</option>
  
                @foreach ($productCategories as $productCategory)
                  <option value="{{ $productCategory->product_category_id }}">
                    {{ $productCategory->name }}
                  </option>
                @endforeach
              </select>
              @endif
            </td>
            <td class="p-0 h-100">
              @if (true)
              <select class="w-100 h-100 custom-control border-0 bg-white" wire:model="product_id" wire:change="selectItem">
                <option>---</option>
  
                @foreach ($products as $product)
                  <option value="{{ $product->product_id }}">
                    {{ $product->name }}
                  </option>
                @endforeach
              </select>
              @endif
            </td>
            <td class="p-0 h-100">
              <input class="w-100 h-100 font-weight-bold border-0" type="text" wire:model="quantity" wire:keydown.enter="updateTotal"/>
            </td>
            <td class="p-0">
              <select class="w-100 h-100 custom-control border-0 p-0 bg-white" wire:model="unit" wire:change="">
                <option>---</option>
                <option value="pcs">PCS</option>
                <option value="kg">KG</option>
                <option value="l">L</option>
              </select>
            </td>
            <td class="p-0 h-100">
              <input class="w-100 h-100 font-weight-bold border-0" type="text" wire:model="purchase_price_per_unit" wire:change="updateTotal"/>
            </td>
            <td>
              @if ($selectedProduct)
                @php echo number_format( $total, 2 ); @endphp
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  
    <div class="p-2 m-0">
      <div class="row">
        <div class="col-md-8">
          <button class="btn btn-lg btn-success mr-3" wire:click="addItemToPurchase">
            <i class="fas fa-plus mr-2"></i>
            Add
          </button>
  
          @if (true)
          <button class="btn btn-lg btn-danger" wire:click="resetInputFields">
            Reset
          </button>
          @endif
  
          <button wire:loading class="btn">
            <span class="spinner-border text-info mr-3" role="status">
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

  {{-- Show in smaller screen --}}
  <div class="d-md-none mb-3">
    @if (! $modes['showMobForm'])
    <button class="btn btn-success ml-3" wire:click="showAddItemFormMob">
      Add item
    </button>
    @else
    <button class="btn btn-danger ml-3" wire:click="hideAddItemFormMob">
      Cancel
    </button>
    @endif

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>

    @if ($modes['showMobForm'])
      <div>
        @include ('partials.mob.purchase-add-item-form')
      </div>
    @endif
  </div>
</div>
