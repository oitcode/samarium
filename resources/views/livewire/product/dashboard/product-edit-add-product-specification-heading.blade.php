<div class="p-3">
  <div class="mb-3">
    <div class="font-weight-bold">
      Add product specification heading
    </div>
  </div>
  <div class="form-group">
    <label>Specification Heading</label>
    <input type="text" class="form-control" wire:model="specification_heading">
    @error ('specification_heading')
      <div class="text-danger">
        <i class="fas fa-exclamation-circle mr-1"></i>
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productEditAddProductSpecificationHeadingModeCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>
</div>
