<div class="bg-white p-3">

  <div class="mb-4">
    <h1 class="h5 font-weight-bold">
      Customer create
    </h1>
  </div>

  <div class="my-3 mb-4 bg-light border p-2">
    @if (true)
    <i class="fas fa-exclamation-circle mr-1"></i>
    @endif
    Fields marked with asterik (*) are compulsory.
  </div>

  <div class="form-group">
    <label for="">Name *</label>
    <input type="text" class="form-control" wire:model.defer="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Phone</label>
    <input type="text" class="form-control" wire:model.defer="phone">
    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" wire:model.defer="email">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Address</label>
    <input type="text" class="form-control" wire:model.defer="address">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">PAN Number</label>
    <input type="text" class="form-control" wire:model.defer="pan_num">
    @error('pan_num') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @include ('partials.button-store')
  @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])

</div>
