<div class="p-3">
  <div class="mb-3">
    <div class="font-weight-bold">
      Add product option
    </div>
  </div>

  <div class="form-group">
    <label>Option</label>
    <input type="text" class="form-control" wire:model="product_option_name">
    @error ('product_option_name')
      <div class="text-danger">
        <i class="fas fa-exclamation-circle mr-1"></i>
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group">
    <label class="h5">Product option heading</label>
    <select class="custom-select shadow-sm" wire:model="product_option_heading_id" style="font-size: 1.3rem;">
      <option>---</option>
      @foreach ($productOptionHeadings as $productOptionHeading)
        <option value="{{ $productOptionHeading->product_option_heading_id }}">
          {{ $productOptionHeading->product_option_heading_name }}
        </option>
      @endforeach
    </select>
    @error ('product_option_heading_id') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productEditAddProductOptionModeCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>
</div>
