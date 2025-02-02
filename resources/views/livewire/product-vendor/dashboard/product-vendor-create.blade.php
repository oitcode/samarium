<div>

  <x-create-box-component title="Create product vendor">
    <div class="form-group mb-4">
      <label class="h5">Name *</label>
      <input type="text"
          class="form-control shadow-sm"
          wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'productVendorCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
