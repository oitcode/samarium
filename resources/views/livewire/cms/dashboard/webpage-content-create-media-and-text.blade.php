<div>
    Create media and text

    <div class="form-group">
      <select wire:model.defer="image_position">
        <option value="left">Left</option>
        <option value="right">Right</option>
      </select>
      @error('image_position') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <input type="file" class="form-control" wire:model.defer="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <textarea rows="5" class="form-control" wire:model.defer="paragraph">
      </textarea>
      @error('paragraph') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <button class="btn btn-success" wire:click="store">
      Save
    </button>
</div>
