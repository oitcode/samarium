<div class="card shadow-sm">
  <div class="card-body p-3">

    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Create team
    </h1>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model.defer="name"
          style="font-size: 1.3rem;">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Team type</label>
      <select class="form-control" wire:model.defer="team_type">
        <option>---</option>
        <option value="playing_team">Playing Team</option>
        <option value="organizing_team">Organizing Team</option>
      </select>
      @error ('team_type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Comment</label>
      <input type="text"
          class="form-control"
          wire:model.defer="comment"
          style="font-size: 1.3rem;">
      @error ('comment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div>
      Image
    </div>

    @if (true)
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
    @endif

    @if ($modes['selectImageFromNewUploadMode'])
      <div class="form-group">
        <label for="">Image</label>
        @if (true)
          <input type="file" class="form-control" wire:model="image">
          @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        @endif
      </div>
    @elseif ($modes['selectImageFromLibraryMode'])
      @livewire ('cms.dashboard.media-select-image-component')
    @endif

    <div class="p-3 m-0">
      <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="store">
        Confirm
      </button>

      <button class="btn btn-lg btn-danger badge-pill mr-3" wire:click="$emit('exitCreateMode')">
        Cancel
      </button>

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
