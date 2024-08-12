<div class="p-3 border bg-white">

  <h2 class="h5 mb-4">
    Create user group
  </h2>

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Description</label>
    <input type="text" class="form-control" wire:model="description">
    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="py-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateUserGroupMode',])
  </div>

</div>
