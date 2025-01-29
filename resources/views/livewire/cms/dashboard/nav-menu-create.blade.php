<div class="card">

  <div class="card-body">
    <h3 class="h5 text-secondary">Create new nav menu</h3>
  
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mt-4">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

</div>
