<div class="card shadow-sm">


  <div class="card-body p-3">

    <h1 class="" style="font-size: 1.3rem;">
      Create team member
    </h1>

    <div class="form-group">
      <label for="">Name</label>
      <input type="text"
          class="form-control"
          wire:model="name"
          style="font-size: 1.3rem;">
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
        <label for="">Image</label>
        <input type="file" class="form-control" wire:model.live="image">
        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    @elseif ($modes['selectImageFromLibraryMode'])
      @livewire ('cms.dashboard.media-select-image-component')
    @endif

    <div class="form-group">
      <label for="">Post</label>
      <input type="text"
          class="form-control"
          wire:model="comment"
          style="font-size: 1.3rem;">
      @error ('comment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Phone</label>
      <input type="text"
          class="form-control"
          wire:model="phone"
          style="font-size: 1.3rem;">
      @error ('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="text"
          class="form-control"
          wire:model="email"
          style="font-size: 1.3rem;">
      @error ('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    <div class="py-3 m-0">

      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateTeamMemberMode',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
