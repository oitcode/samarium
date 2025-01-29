<div class="card shadow-sm">

  <div class="card-body">
    <h1 class="h5 o-heading mb-4">
      Create calendar group
    </h1>

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
  </div>

</div>
