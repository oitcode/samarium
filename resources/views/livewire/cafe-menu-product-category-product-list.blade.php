<div>

  @if (false)
  <div class="my-4">
    <button class="btn btn-light" wire:click="$refresh">
      <i class="fas fa-refresh fa-2x"></i>
    </button>
  </div>
  @endif

  <div class="my-3">
    <h1 class="h5">
      <i class="fas fa-circle text-success mr-2"></i>
      Products
      <i class="fas fa-angle-right mx-2"></i>
      {{ $productCategory->name }}
    </h1>
  </div>

  @if ($modes['updateProductCategoryMode'])
    <div class="mb-3">
      @livewire ('cafe-menu-product-category-edit', ['productCategory' => $productCategory,])
    </div>
  @else
    <div class="mb-3">
      <button class="btn btn-light mr-3" wire:click="enterMode('updateProductCategoryMode')">
        <i class="fas fa-pencil-alt"></i>
      </button>
      @if (count($productCategory->products) == 0)
      <button class="btn btn-light mr-3" wire:click="deleteProductCategory({{ $productCategory }})">
        <i class="fas fa-trash"></i>
      </button>
      @endif
    </div>
  @endif

  {{-- Top tool bar --}}
  @if (false)
  <div class="mt-3 p-2 border-rm d-flex justify-content-between {{ env('OC_ASCENT_BG_COLOR') }}  {{ env('OC_ASCENT_TEXT_COLOR') }}">
    <div class="my-5-rm">
    </div>

    <div>

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
  @endif


  <div class="row" style="margin: auto;">
      @if ($productCategory->products != null && count($productCategory->products) > 0)
        <div class="table-responsive border bg-white">
          <table class="table table-hover mb-0">

            <thead>
              <tr class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }}">
                <th colspan="2">
                  Item
                </th>
                <th>
                  Stock
                </th>
                <th>
                  Price
                </th>
                @if (true)
                <th>
                  Action
                </th>
                @endif
              </tr>
            </thead>

            <tbody>
              @foreach ($productCategory->products as $product)

                {{-- Do not show sub products --}}
                {{-- OR --}}
                {{-- Show sub products (as well) --}}
                @if (false)
                @if ($product->baseProduct)
                  @continue
                @endif
                @endif

                <tr {{-- wire:click="$emit('displayProduct', {{ $product->product_id }})" role="button" --}} wire:key="{{ rand() }}">
                  <td style="width: 50px;">
                    @if ($product->image_path)
                      <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 35px; height: 35px;">
                    @else
                      <i class="fas fa-dice-d6 fa-2x text-secondary" style="width: 35px; height: 35px;"></i>
                    @endif
                  </td>
                  <td wire:click="$emit('displayProduct', {{ $product->product_id }})" role="button">
                    {{ $product->name }}
                    @if ($product->is_base_product == 1)
                      <span class="mx-4">
                        <i class="fas fa-star mr-1"></i>
                        Base
                      </span>
                    @endif
                  </td>
                  <td>
                    @if ($product->stock_applicable == 'yes')
                      {{ $product->stock_count }}
                      {{ $product->inventory_unit }}
                    @else
                      <div class="text-muted" style="font-size: 0.7rem;">
                        <i class="fas fa-exclamation-circle mr-1"></i>
                      </div>
                    @endif
                  </td>
                  <td>
                    @php echo number_format( $product->selling_price ); @endphp
                  </td>
                  @if (true)
                  <td>
                    <span class="btn btn-light mr-3" wire:click="deleteProduct({{ $product }})">
                      <i class="fas fa-trash"></i>
                    </span>
                    @if ($modes['delete'])
                      @if ($deletingProduct->product_id == $product->product_id)
                        @if ($modes['cannotDelete'])
                          <span class="text-danger mr-3">
                            Cannot be deleted
                          </span>
                          <span class="btn btn-light mr-3" wire:click="deleteProductCancel">
                            Cancel
                          </span>
                        @else
                          <span class="btn btn-danger mr-3" wire:click="confirmDeleteProduct">
                            Confirm delete
                          </span>
                          <span class="btn btn-light mr-3" wire:click="deleteProductCancel">
                            Cancel
                          </span>
                        @endif
                      @endif
                    @endif

                    @if (false)
                    <div class="dropdown">
                      <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog text-secondary"></i>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <button class="dropdown-item" wire:click="$emit('displayProduct', {{ $product->product_id }})">
                          <i class="fas fa-file text-primary mr-2"></i>
                          View
                        </button>
                        <button class="dropdown-item" wire:click="$emit('updateProduct', {{ $product->product_id }})">
                          <i class="fas fa-pencil-alt text-primary mr-2"></i>
                          Update
                        </button>

                      </div>
                    </div>
                    @endif
                  </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
  </div>
</div>
