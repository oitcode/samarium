<div class="my-3 bg-white border o-border-radius">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 o-heading">
      Product options
    </h2>
    <div class="d-flex">
      <x-spinner-component wireTarget="enterMode('updateProductAddProductOptionHeadingMode')">
      </x-spinner-component >
      <x-spinner-component wireTarget="enterMode('updateProductAddProductOptionMode')">
      </x-spinner-component >
      <x-toolbar-dropdown-component toolbarButtonDropdownId="toolbar-prod-options" toolbarIcon="fas fa-ellipsis-h">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('updateProductAddProductOptionHeadingMode')">
          Add option heading
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
      <button class="btn btn-light m-0 border o-linear-gradient text-white o-border-radius-sm"
          style="min-width: 200px;"
          wire:click="enterMode('updateProductAddProductOptionMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add option
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
            <tr class="o-table-header">
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
                    @endif
                  @else
                    {{ $productOption->product_option_name }}
                  @endif
                </th>
                <td class="text-right" style="width: 200px;">
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
                  @endif
                  <x-toolbar-dropdown-component toolbarButtonDropdownId="{{ 'toolbar-option-' . $productOption->product_option_id }}" toolbarIcon="fas fa-ellipsis-h">
                    <x-toolbar-dropdown-item-component clickMethod="updateProductOption({{ $productOption->product_option_id }})">
                      Edit
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="deleteProductOption({{ $productOption->product_option_id }})">
                      Delete
                    </x-toolbar-dropdown-item-component>
                  </x-toolbar-dropdown-button>
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
