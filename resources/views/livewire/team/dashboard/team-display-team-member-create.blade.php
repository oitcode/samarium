<div>

  <x-create-box-component title="Create team member">
    <div class="form-group">
      <label>Name</label>
      <input type="text"
          class="form-control"
          wire:model="name">
      @error ('name') <span class="text-danger">{{ $message }}</span> @enderror
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

    <div class="form-group">
      <label>Post</label>
      <input type="text" class="form-control" wire:model="comment">
      @error ('comment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Phone</label>
      <input type="text" class="form-control" wire:model="phone">
      @error ('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="text" class="form-control" wire:model="email">
      @error ('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateTeamMemberMode',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
