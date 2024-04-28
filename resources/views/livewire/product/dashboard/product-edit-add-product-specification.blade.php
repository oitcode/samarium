<div class="p-3">
  <div class="mb-3">
    <div class="font-weight-bold">
      Add product Specification
    </div>
  </div>
  <div class="form-group">
    <label>Keyword</label>
    <input type="text" class="form-control" wire:model.defer="keyword">
    @error ('keyword')
      <div class="text-danger">
        <i class="fas fa-exclamation-circle mr-1"></i>
        {{ $message }}
      </div>
    @enderror
  </div>
  <div class="form-group">
    <label>Value</label>
    <input type="text" class="form-control" wire:model.defer="value">
    @error ('value')
      <div class="text-danger">
        <i class="fas fa-exclamation-circle mr-1"></i>
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label class="h5">Specification heading</label>
    <select class="custom-select shadow-sm" wire:model.defer="product_specification_heading_id" style="font-size: 1.3rem;">
      <option>---</option>
      @foreach ($productSpecificationHeadings as $productSpecificationHeading)
        <option value="{{ $productSpecificationHeading->product_specification_heading_id }}">
          {{ $productSpecificationHeading->specification_heading }}
        </option>
      @endforeach
    </select>
    @error ('product_specification_heading_id') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productEditAddProductSpecificationModeCancelled',])
  </div>
</div>
