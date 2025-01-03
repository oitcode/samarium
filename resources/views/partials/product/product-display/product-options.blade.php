<div class="my-3 bg-white border">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 o-heading">
      Product options
    </h2>
    <div class="mb-3-rm">
      @include ('partials.dashboard.spinner-button')

      <button class="btn btn-primary"
          style="min-width: 200px;"
          wire:click="enterMode('updateProductAddProductOptionMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add option
      </button>

      <button class="btn btn-primary"
          style="min-width: 200px;"
          wire:click="enterMode('updateProductAddProductOptionHeadingMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add option heading
      </button>
    </div>
  </div>

  <!-- Flash message div -->
  @if (session()->has('addProductOptionMessage'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('addProductOptionMessage') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  @if ($modes['updateProductAddProductOptionHeadingMode'])
    @livewire ('product.dashboard.product-edit-add-product-option-heading', ['product' => $product,])
  @endif

  @if ($modes['updateProductAddProductOptionMode'])
    @livewire ('product.dashboard.product-edit-add-product-option', ['product' => $product,])
  @endif

  @if (count($product->productOptionHeadings) > 0)
    <div class="mb-3 p-2">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          @foreach ($product->productOptionHeadings as $productOptionHeading)
            <tr class="">
              <th colspan="2" class="o-heading" style="width: 200px;">
                {{ $productOptionHeading->product_option_heading_name }}
              </th>
            </tr>
            @if (true)
            @foreach ($productOptionHeading->productOptions as $productOption)
              <tr class="">
                <th class="" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductOption'])
                    @if ($updatingProductOption->product_option_id == $productOption->product_option_id)
                      @livewire ('product.dashboard.product-option-edit', ['productOption' => $productOption,])
                    @else
                      {{ $productOption->product_option_name }}
                      <button class="btn btn-light" wire:click="updateProductOption({{ $productOption }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productOption->product_option_name }}
                    <button class="btn btn-light" wire:click="updateProductOption({{ $productOption }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </th>
                <td class="" style="width: 200px;">
                  @if ($modes['deleteProductOptionMode'])
                    @if ($deletingProductOption->product_option_id == $productOption->product_option_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductOption({{ $productOption }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductOption">
                        Cancel
                      </button>
                    @else
                      <button class="btn btn-light" wire:click="deleteProductOption({{ $productOption }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  @else
                    <button class="btn btn-light" wire:click="deleteProductOption({{ $productOption }})">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
            @endif
          @endforeach
        </table>
      </div>
    </div>
  @endif


</div>
