<div class="p-3">
  <div class="mb-3">
    <div class="font-weight-bold">
      Add product option heading
    </div>
  </div>
  <div class="form-group">
    <label>Option Heading</label>
    <input type="text" class="form-control" wire:model="product_option_heading_name">
    @error ('product_option_heading_name')
      <div class="text-danger">
        <i class="fas fa-exclamation-circle mr-1"></i>
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productEditAddProductOptionHeadingModeCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>
</div>
