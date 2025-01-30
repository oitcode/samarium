<div class="bg-white p-3">

  <div class="mb-4">
    <h1 class="h5 o-heading">
      Create Vendor
    </h1>
  </div>

  <div class="form-group">
    <label>Name *</label>
    <input type="text" class="form-control" wire:model="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Phone <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model="phone">
    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Email <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model="email">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Address <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model="address">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>PAN Number <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model="pan_num">
    @error('pan_num') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
