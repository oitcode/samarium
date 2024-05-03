<div class="my-3 bg-white border">
  <h2 class="h5 m-3">
    Product options
  </h2>

  {{-- Toolbar --}}
  @if ($modes['updateProductAddProductFeatureMode'])
  @else
    <div class="p-2 bg-white border">
        <button class="btn btn-light" wire:click="enterMode('updateProductAddProductFeatureMode')">
          <i class="fas fa-plus-circle mr-1"></i>
          Add feature
        </button>

        <button class="btn btn-light" wire:click="enterMode('updateProductAddProductFeatureHeadingMode')">
          <i class="fas fa-plus-circle mr-1"></i>
          Add feature heading
        </button>

        @include ('partials.dashboard.spinner-button')
    </div>
  @endif

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
    <div class="mb-5">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          @foreach ($product->productFeatureHeadings as $productFeatureHeading)
            <tr class="">
              <th colspan="2" class="bg-primary text-white border-dark" style="width: 200px;">
                {{ $productFeatureHeading->feature_heading }}
              </th>
            </tr>
            @foreach ($productFeatureHeading->productFeatures as $productFeature)
              <tr class="">
                <th class="border-dark" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductFeature'])
                    @if ($updatingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      @livewire ('product.dashboard.product-feature-edit', ['productFeature' => $productFeature,])
                    @else
                      {{ $productFeature->feature }}
                      <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productFeature->feature }}
                    <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </th>
                <td class="border-dark" style="width: 200px;">
                  @if ($modes['deleteProductFeatureMode'])
                    @if ($deletingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductFeature({{ $productFeature }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductFeature">
                        Cancel
                      </button>
                    @else
                      <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  @else
                    <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
          @endforeach
        </table>
      </div>
    </div>
  @endif

  @if (count($product->productFeatures) > 0)
    <div class="mb-5">
      <div class="table-responsive">
        <table class="table table-bordered mb-0">
          @foreach ($product->productFeatures as $productFeature)
            @if ($productFeature->product_feature_heading_id == null)
              <tr class="">
                <th class="border-dark" style="width: 200px;">
                  @if ($modes['updateProductUpdateProductFeature'])
                    @if ($updatingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      @livewire ('product.dashboard.product-feature-edit', ['productFeature' => $productFeature,])
                    @else
                      {{ $productFeature->feature }}
                      <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                    @endif
                  @else
                    {{ $productFeature->feature }}
                    <button class="btn btn-light" wire:click="updateProductFeature({{ $productFeature }})">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                  @endif
                </th>
                <td class="border-dark" style="width: 200px;">
                  @if ($modes['deleteProductFeatureMode'])
                    @if ($deletingProductFeature->product_feature_id == $productFeature->product_feature_id)
                      <button class="btn btn-danger" wire:click="confirmDeleteProductFeature({{ $productFeature }})">
                        Confirm delete
                      </button>
                      <button class="btn btn-light" wire:click="cancelDeleteProductFeature">
                        Cancel
                      </button>
                    @else
                      <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  @else
                    <button class="btn btn-light" wire:click="deleteProductFeature({{ $productFeature }})">
                      <i class="fas fa-trash"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endif
          @endforeach
        </table>
      </div>
    </div>
  @endif

</div>
