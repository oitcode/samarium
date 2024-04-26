<div class="p-3">
  <div class="mb-3">
    <div class="font-weight-bold">
      Add product feature
    </div>
  </div>

  <div class="form-group">
    <label>Feature</label>
    <input type="text" class="form-control" wire:model.defer="feature">
    @error ('feature')
      <div class="text-danger">
        <i class="fas fa-exclamation-circle mr-1"></i>
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label class="h5">Feature heading</label>
    <select class="custom-select shadow-sm" wire:model.defer="product_feature_heading_id" style="font-size: 1.3rem;">
      <option>---</option>
      @foreach ($productFeatureHeadings as $productFeatureHeading)
        <option value="{{ $productFeatureHeading->product_feature_heading_id }}">
          {{ $productFeatureHeading->feature_heading }}
        </option>
      @endforeach
    </select>
    @error ('product_feature_heading_id') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productEditAddProductFeatureModeCancelled',])
  </div>
</div>
