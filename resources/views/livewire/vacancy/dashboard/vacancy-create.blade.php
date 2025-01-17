<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 class="h5 o-heading mb-4">
      Create vacancy
    </h1>

    <div class="form-group">
      <label>Title *</label>
      <input type="text"
          class="form-control"
          wire:model="title">
      @error ('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Job location *</label>
      <input type="text"
          class="form-control"
          wire:model="job_location">
      @error ('job_location') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Description *</label>
      <input type="text"
          class="form-control"
          wire:model="description">
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
