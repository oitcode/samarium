<div class="p-3">


  <div class="form-group">
    <label class="h5">Product vendor *</label>
    <select class="custom-select shadow-sm" wire:model="product_vendor_id">
      <option>---</option>
      @foreach ($productVendors as $productVendor)
        <option value="{{ $productVendor->product_vendor_id }}">
          {{ $productVendor->name }}
        </option>
      @endforeach
    </select>
    @error ('product_vendor_id') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div class="py-3 m-0">

    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'productVendorLinkCancelled',])

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>
  </div>


</div>
