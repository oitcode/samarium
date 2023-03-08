<div>

  {{-- Top heading bar --}}
  <div class="mb-4">
    <h1 style="font-size: 1.3rem;">
      Add product
    </h1>
  </div>

  <div class="row border bg-white-rm border-0">

    {{-- Left side of the product create page --}}
    <div class="col-md-6">

      <div class="card shadow-sm border-0">
        <div class="card-body p-3 border shadow-sm">
      
          <div class="form-group">
            <label for="">Name</label>
            <input type="text"
                class="form-control"
                wire:model.defer="name"
                style="font-size: 1.3rem;">
            @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
      
          <div class="form-group">
            <label>Category</label>
            <select class="custom-select" wire:model.defer="product_category_id" style="font-size: 1.3rem;">
              <option>---</option>
              @foreach ($productCategories as $productCategory)
                <option value="{{ $productCategory->product_category_id }}">
                  {{ $productCategory->name }}
                </option>
              @endforeach
            </select>
            @error ('product_category_id') <span class="text-danger">{{ $message }}</span>@enderror
          </div>
      
          <div class="form-group">
            <label for="">Description</label>
            <input type="text"
                class="form-control"
                wire:model.defer="description"
                style="font-size: 1.3rem;">
            @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
      
          <div class="form-group">
            <label for="">Selling price</label>
            <input type="text"
                class="form-control"
                wire:model.defer="selling_price"
                style="font-size: 1.3rem;">
            @error('selling_price') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
      
      
        </div>
      </div>

    </div>


    {{-- Right side of the product create page --}}
    <div class="col-md-6 pt-3-rm">

      <div>
      </div>

      <div class="border bg-white p-2 mb-3">

        <h2 class="h5">
          Image
        </h2>
        <h3 class="h6 text-muted">
          Enter product image here
        </h3>
        <div class="form-group">
          @if (false)
            <label for="">Image</label>
          @endif
          <input type="file" class="form-control" wire:model="image">
          @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

      </div>

      <div class="border bg-white p-2 mb-3 shadow-sm">

        <div class="row">
          <div class="col-md-6">
            <h2 class="h5">
              Stock
            </h2>
            <h3 class="h6 text-muted">
              Enter stock related information here
            </h3>
          </div>
          <div class="col-md-6">
            <div class="d-flex justify-content-end">
              <div class="pt-3-rm">
                @if ($modes['stockApplicable'])
                  <button class="btn btn-danger" wire:click="makeStockNotApplicable">
                    Stock not applicable
                  </button>
                @else
                  <button class="btn btn-success" wire:click="makeStockApplicable">
                    Stock applicable
                  </button>
                @endif
              </div>
            </div>
          </div>
        </div>

        @if ($modes['stockApplicable'])
        <div class="card shadow-sm border-0 mt-3 shadow-sm">
          <div class="card-body p-0 border-0">
        
            @if (false)
            <div class="form-group">
              <label for="">Stock applicable</label>
              <select class="custom-select" wire:model.defer="stock_applicable" style="font-size: 1.3rem;">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              @error('stock_applicable') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @endif

            <div class="form-group">
              <label>Product type</label>
              <select class="custom-select" wire:model="product_type" style="font-size: 1.3rem;">
                  <option value="normal">Normal</option>
                  <option value="base">Base</option>
                  <option value="sub">Sub</option>
              </select>
              @error ('product_type') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
        
            @if (! $modes['subProduct'])
            <div class="form-group">
              <label for="">Inventory unit</label>
              <input type="text"
                  class="form-control"
                  wire:model.defer="inventory_unit"
                  style="font-size: 1.3rem;">
              @error ('inventory_unit') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        
            <div class="form-group">
              <label for="">Opening stock count</label>
              <input type="text"
                  class="form-control"
                  wire:model.defer="opening_stock_count"
                  style="font-size: 1.3rem;">
              @error('opening_stock_count') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        
            <div class="form-group">
              <label for="">Low stock notification count</label>
              <input type="text"
                  class="form-control"
                  wire:model.defer="stock_notification_count"
                  style="font-size: 1.3rem;">
              @error('stock_notification_count') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @endif
        
            @if (false)
            <div class="form-group">
              <label>Is base product</label>
              <select class="custom-select" wire:model.defer="is_base_product" style="font-size: 1.3rem;">
                <option>---</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
              </select>
              @error ('is_base_product') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            @endif
        
            @if ($modes['subProduct'])
            <div class="form-group">
              <label>Base product</label>
              <select class="custom-select" wire:model.defer="base_product_id" style="font-size: 1.3rem;">
                <option>---</option>
                @if (true)
                @foreach ($baseProducts as $baseProduct)
                  <option value="{{ $baseProduct->product_id }}">
                    {{ $baseProduct->name }}
                  </option>
                @endforeach
                @endif
              </select>
              @error ('base_product_id') <span class="text-danger">{{ $message }}</span>@enderror
            </div>
            @endif
        
        
            @if ($modes['subProduct'])
            <div class="form-group">
              <label for="">Inventory Unit Consumption</label>
              <input type="text"
                  class="form-control"
                  wire:model.defer="inventory_unit_consumption"
                  style="font-size: 1.3rem;">
              @error ('inventory_unit_consumption') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            @endif
        
          </div>
        </div>
        @endif
      </div>

      {{-- Product specification --}}
      <div class="border p-2 my-4">
        <h2 class="h5">
          Product Specifications
        </h2>

        <div class="mb-4">
          <button class="btn btn-outline-success" wire:click="addSpecification">
            Add specification
          </button>
        </div>

        @for ($i=0; $i < count($productSpecifications); $i++)
          <div class="mb-3">
            <input type="text" class="mr-3" wire:model.defer="productSpecifications.{{ $i }}.0">
            <input type="text" class="mr-3" wire:model.defer="productSpecifications.{{ $i }}.1">

            @if (false)
            <span class="mr-3">FOO</span>
            <span class="mr-3">BAR</span>
            @endif
          </div>
        @endfor

      </div>


      @if (false)
      <div class="border bg-white p-2 mb-3 shadow-sm">


        <h2 class="h5">
          Is active
        </h2>

        <div class="form-group">
          @if (false)
            <label>Is active</label>
          @endif
          <select class="custom-select" wire:model.defer="is_active" style="font-size: 1.3rem;">
            <option>---</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
          </select>
          @error ('is_active') <span class="text-danger">{{ $message }}</span>@enderror
        </div>

      </div>
      @endif


    </div>
  </div>

  {{-- CONFIRM button tab --}}
  <div class="py-4 m-0">
    <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="store">
      Confirm
    </button>

    <button class="btn btn-lg badge-pill btn-danger mr-3" wire:click="$emit('exitCreateProductMode')">
      Cancel
    </button>
    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>
  </div>

</div>
