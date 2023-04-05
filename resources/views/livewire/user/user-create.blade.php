<div class="p-3 border bg-white">

  <h2 class="h5 mb-4">
    Create user
  </h2>

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" wire:model.defer="name">
    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Email</label>
    <input type="email" class="form-control" wire:model.defer="email">
    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Role</label>
    <select class="form-control" wire:model.defer="role">
      <option>---</option>
      <option value="admin">Admin</option>
      <option value="standard">Standard</option>
    </select>
    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" wire:model.defer="password">
    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Confirm Password</label>
    <input type="password" class="form-control" wire:model.defer="password_confirm">
    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  
  <button type="submit" class="btn btn-success badge-pill p-2 px-3" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger badge-pill p-2 px-3" wire:click="$emit('exitCreateUserMode')">Cancel</button>

</div>
