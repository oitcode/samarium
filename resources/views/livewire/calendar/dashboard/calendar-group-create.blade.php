<div>

  <x-create-box-component title="Create calendar group">
    <div class="form-group mb-4">
      <label class="h5">Name *</label>
      <input type="text"
          class="form-control shadow-sm"
          wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'calendarGroupCreateCancelled',])
      @include ('partials.spinner-border')
    </div>
  </x-create-box-component>

</div>
