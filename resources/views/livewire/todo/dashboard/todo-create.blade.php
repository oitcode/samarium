<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 class="h5 font-weight-bold mb-4">
      Create todo
    </h1>

    <div class="form-group">
      <label>Title *</label>
      <input type="text"
          class="form-control"
          wire:model="title"
          style="font-size: 1.3rem;">
      @error ('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Description</label>
      <input type="text"
          class="form-control"
          wire:model="description"
          style="font-size: 1.3rem;">
      @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0" {{--style="background-image: linear-gradient(to right, white, #abc);"--}}>

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
