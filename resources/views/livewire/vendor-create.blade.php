<div class="bg-white p-3">


  <div class="mb-4">
    <h1 class="h5 font-weight-bold">
      Vendor create
    </h1>
  </div>

  <div class="form-group">
    <label>Name *</label>
    <input type="text" class="form-control" wire:model.defer="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Phone <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model.defer="phone">
    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Email <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model.defer="email">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Address <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model.defer="address">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>PAN Number <span class="text-muted">(optional)</span></label>
    <input type="text" class="form-control" wire:model.defer="pan_num">
    @error('pan_num') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @include ('partials.button-store')
  @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])


</div>
