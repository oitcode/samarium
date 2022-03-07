<div class="card shadow mb-4">
  <div class="card-body" style="font-size: 1.3rem;">

    <div class="form-group">
      <label for="">Name</label>
      <input type="text" class="form-control" wire:model.defer="name" style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Phone</label>
      <input type="text" class="form-control" wire:model.defer="phone" style="font-size: 1.3rem;">
      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control" wire:model.defer="email" style="font-size: 1.3rem;">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Address</label>
      <input type="text" class="form-control" wire:model.defer="address" style="font-size: 1.3rem;">
      @error('address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">PAN Number</label>
      <input type="text" class="form-control" wire:model.defer="pan_num" style="font-size: 1.3rem;">
      @error('pan_num') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Logo</label>
      <input type="file" class="form-control" wire:model="logo_image">
      @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($company)
      <button type="submit" class="btn btn-primary p-3" wire:click="update" style="font-size: 1.3rem;">
        Update
      </button>
    @else
      <button type="submit" class="btn btn-primary p-3" wire:click="store" style="font-size: 1.3rem;">
        Craete
      </button>
    @endif
    <button type="submit" class="btn btn-danger p-3" wire:click="$emit('exitCreateMode')" style="font-size: 1.3rem;">
      Cancel
    </button>
  </div>
</div>
