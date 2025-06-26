<div class="my-3 bg-white border o-border-radius">
  <div class="d-flex justify-content-between p-3">
    <h2 class="h6 o-heading">
      Product features
    </h2>
    <div class="d-flex">
      <x-spinner-component wireTarget="enterMode('updateProductAddProductFeatureHeadingMode')">
      </x-spinner-component >
      <x-spinner-component wireTarget="enterMode('updateProductAddProductFeatureMode')">
      </x-spinner-component >
      <x-toolbar-dropdown-component toolbarButtonDropdownId="toolbar-prod-features" toolbarIcon="fas fa-ellipsis-h">
        <x-toolbar-dropdown-item-component clickMethod="enterMode('updateProductAddProductFeatureHeadingMode')">
          Add feature heading
        </x-toolbar-dropdown-item-component>
      </x-toolbar-dropdown-button>
      <button class="btn btn-light m-0 border o-linear-gradient text-white o-border-radius-sm"
          style="min-width: 200px;"
          wire:click="enterMode('updateProductAddProductFeatureMode')">
        <i class="fas fa-plus-circle mr-1"></i>
        Add feature
      </button>
    </div>
  </div>

  <!-- Flash message div -->
  @if (session()->has('addFeatureMessage'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('addFeatureMessage') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  @if ($modes['updateProductAddProductFeatureHeadingMode'])
    @livewire ('product.dashboard.product-edit-add-product-feature-heading', ['product' => $product,])
  @endif

  @if ($modes['updateProductAddProductFeatureMode'])
    @livewire ('product.dashboard.product-edit-add-product-feature', ['product' => $product,])
  @endif

  @if (count($product->productFeatureHeadings) > 0)
    <div class="mb-3-rm p-2">
      @foreach ($product->productFeatureHeadings as $productFeatureHeading)
        <div class="table-responsive mb-3">
          <table class="table table-bordered mb-0">
            <tr class="o-table-header">
              <th colspan="2" class="o-heading" style="width: 200px;">
                {{ $productFeatureHeading->feature_heading }}
              </th>
            </tr>
            @foreach ($productFeatureHeading->productFeatures as $productFeature)
              <tr class="">
                <th class="" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductFeature'])
                    @if ($updatingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      @livewire ('product.dashboard.product-feature-edit', ['productFeature' => $productFeature,])
                    @else
                      <div class="d-flex justify-content-between">
                        {{ $productFeature->feature }}
                      </div>
                    @endif
                  @else
                    <div class="d-flex justify-content-between">
                      {{ $productFeature->feature }}
                    </div>
                  @endif
                </th>
                <td class="text-right" style="width: 200px;">
                  @if ($modes['deleteProductFeatureMode'])
                    @if ($deletingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductFeature({{ $productFeature }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductFeature">
                        Cancel
                      </button>
                    @endif
                  @endif
                  <x-toolbar-dropdown-component toolbarButtonDropdownId="{{ 'toolbar-feature-' . $productFeature->product_feature_id }}" toolbarIcon="fas fa-ellipsis-h">
                    <x-toolbar-dropdown-item-component clickMethod="updateProductFeature({{ $productFeature->product_feature_id }})">
                      Edit
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="deleteProductFeature({{ $productFeature->product_feature_id }})">
                      Delete
                    </x-toolbar-dropdown-item-component>
                  </x-toolbar-dropdown-button>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      @endforeach
    </div>
  @endif

  @if (count($product->productFeatures) > 0)
    <div class="mb-3 p-2">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          <tr class="o-table-header">
            <th colspan="2" class="o-heading" style="width: 200px;">
              General features
            </th>
          </tr>
          @foreach ($product->productFeatures as $productFeature)
            @if ($productFeature->product_feature_heading_id == null)
              <tr class="">
                <th class="" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductFeature'])
                    @if ($updatingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      @livewire ('product.dashboard.product-feature-edit', ['productFeature' => $productFeature,])
                    @else
                      <div class="d-flex justify-content-between">
                        {{ $productFeature->feature }}
                      </div>
                    @endif
                  @else
                    <div class="d-flex justify-content-between">
                      {{ $productFeature->feature }}
                    </div>
                  @endif
                </th>
                <td class="text-right" style="width: 200px;">
                  @if ($modes['deleteProductFeatureMode'])
                    @if ($deletingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductFeature({{ $productFeature }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductFeature">
                        Cancel
                      </button>
                    @endif
                  @endif
                  <x-toolbar-dropdown-component toolbarButtonDropdownId="{{ 'toolbar-feature-' . $productFeature->product_feature_id }}" toolbarIcon="fas fa-ellipsis-h">
                    <x-toolbar-dropdown-item-component clickMethod="updateProductFeature({{ $productFeature->product_feature_id }})">
                      Edit
                    </x-toolbar-dropdown-item-component>
                    <x-toolbar-dropdown-item-component clickMethod="deleteProductFeature({{ $productFeature->product_feature_id }})">
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
