<div class="card shadow-sm">

  <div class="card-body p-3">
    <h1 class="h5 o-heading mb-4">
      Create team
    </h1>

    <div class="form-group">
      <label>Name *</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Team type</label>
      <select class="form-control" wire:model="team_type">
        <option>---</option>
        <option value="playing_team">Playing Team</option>
        <option value="organizing_team">Organizing Team</option>
      </select>
      @error ('team_type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Comment</label>
      <input type="text"
          class="form-control"
          wire:model="comment">
      @error ('comment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div>
      Image
    </div>

    <div class="my-4">
      <div class="d-flex">
        <div class="mr-3">
          <button class="btn btn-primary" wire:click="enterMode('selectImageFromNewUploadMode')">
            Upload
          </button>
        </div>
        <div class="mr-3">
          <button class="btn btn-success" wire:click="enterMode('selectImageFromLibraryMode')">
            Media library
          </button>
        </div>
      </div>
    </div>

    @if ($modes['selectImageFromNewUploadMode'])
      <div class="form-group">
        <label>Image</label>
        <input type="file" class="form-control" wire:model.live="image">
        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    @elseif ($modes['selectImageFromLibraryMode'])
      @livewire ('cms.dashboard.media-select-image-component')
    @endif

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
      @include ('partials.spinner-border')
    </div>
  </div>

</div>
