<div class="my-3 bg-white border o-border-radius">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 o-heading">
      Product specification
    </h2>
    <div class="d-flex">
      <x-spinner-component wireTarget="enterMode('updateProductAddProductSpecificationHeadingMode')">
      </x-spinner-component >
      <x-spinner-component wireTarget="enterMode('updateProductAddProductSpecificationMode')">
      </x-spinner-component >
      <x-toolbar-dropdown-component toolbarButtonDropdownId="toolbar-prod-spec" toolbarIcon="fas fa-ellipsis-h">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('updateProductAddProductSpecificationHeadingMode')">
          Add specification heading
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
      <button class="btn btn-light m-0 border o-linear-gradient text-white o-border-radius-sm"
          style="min-width: 200px;"
          wire:click="enterMode('updateProductAddProductSpecificationMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add specification
      </button>
    </div>
  </div>

  <!-- Flash message div -->
  @if (session()->has('addSpecMessage'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('addSpecMessage') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span> </button>
      </div>
    </div>
  @endif

  @if ($modes['updateProductAddProductSpecificationHeadingMode'])
    @livewire ('product.dashboard.product-edit-add-product-specification-heading', ['product' => $product,])
  @endif

  @if ($modes['updateProductAddProductSpecificationMode'])
    @livewire ('product.dashboard.product-edit-add-product-specification', ['product' => $product,])
  @endif

  @if (count($product->productSpecificationHeadings) > 0)
    <div class="mb-3 p-2">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          @foreach ($product->productSpecificationHeadings as $productSpecificationHeading)
            <tr class="o-table-header">
              <th class="o-heading" colspan="3" style="width: 200px;">
                {{ $productSpecificationHeading->specification_heading }}
              </th>
            </tr>
            @foreach ($productSpecificationHeading->productSpecifications as $productSpecification)
              <tr class="">
                <th style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationKeyword'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-keyword-edit', ['productSpecification' => $productSpecification,])
                    @else
                      <div class="d-flex justify-content-between">
                        {{ $productSpecification->spec_heading}}
                      </div>
                    @endif
                  @else
                    <div class="d-flex justify-content-between">
                      <div>
                        @if (config('faicons.' . strtolower($productSpecification->spec_heading)))
                          <i class="{{ config('faicons.' . strtolower($productSpecification->spec_heading)) }} mr-1"></i>
                        @endif
                        {{ $productSpecification->spec_heading}}
                      </div>
                    </div>
                  @endif
                </th>
                <td style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationValue'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-value-edit', ['productSpecification' => $productSpecification,])
                    @else
                      <div class="d-flex justify-content-between">
                        {{ $productSpecification->spec_value }}
                      </div>
                    @endif
                  @else
                    <div class="d-flex justify-content-between">
                      {{ $productSpecification->spec_value }}
                    </div>
                  @endif
                </td>
                <td class="text-right" style="width: 200px;">
                  @if ($modes['deleteProductSpecificationMode'])
                    @if ($deletingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductSpecification({{ $productSpecification }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductSpecification">
                        Cancel
                      </button>
                    @endif
                  @endif
                  <x-toolbar-dropdown-component toolbarButtonDropdownId="{{ 'toolbar-spec-' . $productSpecification->product_specification_id }}" toolbarIcon="fas fa-ellipsis-h">
                    <x-toolbar-dropdown-item-component clickMethod="updateProductSpecificationKeyword({{ $productSpecification->product_specification_id }})">
                      Edit keyword
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="updateProductSpecificationValue({{ $productSpecification->product_specification_id }})">
                      Edit value
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="deleteProductSpecification({{ $productSpecification->product_specification_id }})">
                      Delete
                    </x-toolbar-dropdown-item-component>
                  </x-toolbar-dropdown-button>
                </td>
              </tr>
            @endforeach
          @endforeach
        </table>
      </div>
    </div>
  @endif

  @if (count($product->productSpecifications) > 0)
    <div class="mb-3 p-2">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <tr class="o-table-header">
            <th class="o-heading" colspan="3" style="width: 200px;">
              General specifications
            </th>
          </tr>
          @foreach ($product->productSpecifications as $productSpecification)
            @if ($productSpecification->product_specification_heading_id == null)
              <tr>
                <th style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationKeyword'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-keyword-edit', ['productSpecification' => $productSpecification,])
                    @else
                      <div class="d-flex justify-content-between">
                        {{ $productSpecification->spec_heading}}
                      </div>
                    @endif
                  @else
                    <div class="d-flex justify-content-between">
                      <div>
                        @if (config('faicons.' . strtolower($productSpecification->spec_heading)))
                          <i class="{{ config('faicons.' . strtolower($productSpecification->spec_heading)) }} mr-1"></i>
                        @endif
                        {{ $productSpecification->spec_heading}}
                      </div>
                    </div>
                  @endif
                </th>
                <td style="width: 200px;">
                  @if ($modes['updateProductUpdateProductSpecificationValue'])
                    @if ($updatingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      @livewire ('product.dashboard.product-specification-value-edit', ['productSpecification' => $productSpecification,])
                    @else
                      <div class="d-flex justify-content-between">
                        {{ $productSpecification->spec_value }}
                      </div>
                    @endif
                  @else
                    <div class="d-flex justify-content-between">
                      {{ $productSpecification->spec_value }}
                    </div>
                  @endif
                </td>
                <td class="text-right" style="width: 200px;">
                  @if ($modes['deleteProductSpecificationMode'])
                    @if ($deletingProductSpecification->product_specification_id == $productSpecification->product_specification_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductSpecification({{ $productSpecification }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductSpecification">
                        Cancel
                      </button>
                    @endif
                  @endif
                  <x-toolbar-dropdown-component toolbarButtonDropdownId="{{ 'toolbar-spec-' . $productSpecification->product_specification_id }}" toolbarIcon="fas fa-ellipsis-h">
                    <x-toolbar-dropdown-item-component clickMethod="updateProductSpecificationKeyword({{ $productSpecification->product_specification_id }})">
                      Edit keyword
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="updateProductSpecificationValue({{ $productSpecification->product_specification_id }})">
                      Edit value
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="deleteProductSpecification({{ $productSpecification->product_specification_id }})">
                      Delete
                    </x-toolbar-dropdown-item-component>
                  </x-toolbar-dropdown-button>
                </td>
              </tr>
            @endif
          @endforeach
        </table>
      </div>
    </div>
  @endif

</div>
