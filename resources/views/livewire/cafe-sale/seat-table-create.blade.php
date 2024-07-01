<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 class="h5 font-weight-bold">
      Add seat table
    </h1>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'seatTableCreateCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
