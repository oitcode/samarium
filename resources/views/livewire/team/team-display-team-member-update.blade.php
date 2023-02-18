<div class="card shadow-sm">
  <div class="card-body p-3">

    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Update team member
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
      <label for="">Image</label>
      @if (false)
      @if ($company && $company->logo_image_path)
        <div class="d-flex justify-content-start mb-3">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
        </div>
      @endif
      @endif
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Post</label>
      <input type="text"
          class="form-control"
          wire:model.defer="comment"
          style="font-size: 1.3rem;">
      @error ('comment') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Phone</label>
      <input type="text"
          class="form-control"
          wire:model.defer="phone"
          style="font-size: 1.3rem;">
      @error ('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="text"
          class="form-control"
          wire:model.defer="email"
          style="font-size: 1.3rem;">
      @error ('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if (false)
    <div class="form-group">
      <label for="">Description</label>
      <input type="text"
          class="form-control"
          wire:model.defer="description"
          style="font-size: 1.3rem;">
      @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    @endif

    <div class="p-3 m-0">
      <button class="btn btn-lg badge-pill btn-success mr-3" wire:click="update">
        Update
      </button>

      <button class="btn btn-lg btn-danger badge-pill mr-3" wire:click="$emit('exitUpdateTeamMemberMode')">
        Cancel
      </button>

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
</div>
