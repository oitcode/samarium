<div class="p-2">

  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" id="" wire:model.defer="name" placeholder="Name">
    @error('name') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div class="form-group">
    <label>Description</label>
    <textarea rows="3" class="form-control" wire:model.defer="description" placeholder="Description">
    </textarea>
    @error('description') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div class="form-group">
    <label>Images</label>
    <input type="file" class="form-control" wire:model="images" multiple>
    @error('images') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Comment</label>
    <input type="text" class="form-control" wire:model.defer="comment" placeholder="Comment">
    @error('comment') <span class="text-danger">{{ $message }}</span>@enderror
  </div>

  <div>
    <button class="btn btn-sm btn-success mr-3" wire:click="store">Save</button>
    <button class="btn btn-sm btn-secondary" wire:click="$emit('exitCreate')">Cancel</button>
  </div>

</div>
