<div class="m-3">

  @if (true)
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" wire:model.defer="title">
    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Body</label>
    <textarea rows="5" class="form-control" wire:model.defer="body">
    </textarea>
    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-primary" wire:click="update">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitWebpageContentEditMode')">Cancel</button>
  @endif
</div>
