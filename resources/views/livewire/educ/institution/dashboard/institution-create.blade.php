<div>

  <x-create-box-component title="Create institution">
    <div class="form-group">
      <label>Name *</label>
      <input type="text" class="form-control" wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label>Country *</label>
      <input type="text" class="form-control" wire:model="country">
      @error ('country') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
      <label>Insitution type *</label>
      <input type="text" class="form-control" wire:model="institution_type">
      @error ('institution_type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'educInstitutionCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
