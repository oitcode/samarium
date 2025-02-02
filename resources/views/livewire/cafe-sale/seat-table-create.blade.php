<div class="">

  <x-create-box-component title="Create Seat Table">
    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'seatTableCreateCancelled',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
