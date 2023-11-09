<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 class="h5 font-weight-bold mb-4">
      Create vacancy
    </h1>

    <div class="form-group">
      <label>Title *</label>
      <input type="text"
          class="form-control"
          wire:model.defer="title"
          style="font-size: 1.3rem;">
      @error ('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Job location *</label>
      <input type="text"
          class="form-control"
          wire:model.defer="job_location"
          style="font-size: 1.3rem;">
      @error ('job_location') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Description *</label>
      <input type="text"
          class="form-control"
          wire:model.defer="description"
          style="font-size: 1.3rem;">
      @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'vacancyCreateCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
