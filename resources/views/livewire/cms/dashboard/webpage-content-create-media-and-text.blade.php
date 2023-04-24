<div>
  <h2 class="h4 mb-3">
    Media and text
  </h2>

  <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" wire:model.defer="image">
    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Image alignment</label>
    <select class="form-control" wire:model.defer="image_position">
      <option value="left">Left</option>
      <option value="right">Right</option>
    </select>
    @error('image_position') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <textarea rows="5" class="form-control" wire:model.defer="paragraph">
    </textarea>
    @error('paragraph') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="">
    <button class="btn btn-success" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger" wire:click="">
      Cancel
    </button>
  </div>
</div>
