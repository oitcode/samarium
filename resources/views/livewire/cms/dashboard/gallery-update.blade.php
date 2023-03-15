<div class="p-2">
  <div class="my-3">
    <small>
      <span class="text-secondary mr-1">
        Gallery ID:
      </span>
      {{ $gallery->gallery_id }}

      &nbsp;&nbsp;&nbsp;&nbsp;

      <span class="text-secondary mr-1">
        Published:
      </span>
      {{ $gallery->created_at->toDateString() }}

      &nbsp;&nbsp;&nbsp;&nbsp;

      <span class="text-secondary mr-1">
        Last Updated:
      </span>
      {{ $gallery->updated_at->toDateString() }}

    </small>
  </div>

  <div class="mb-3">
    <div class="form-group">
      <label>Gallery Name</label>
      <input type="text" class="form-control" id="" wire:model.defer="name" placeholder="Name">
      @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <h4 class="h5">Images</h4>
    <hr />

    <div class="row">
      @foreach ($gallery->galleryImages as $galleryImage)
        <div class="col-md-3 mb-3">
          <img src="{{ asset('storage/' . $galleryImage->image_path) }}" style="max-height:100px; max-width:100ps;">
        </div>
      @endforeach
    </div>
    <hr />

    <strong>Add Images</strong>
    <div class="form-group">
        <input type="file" class="form-control" wire:model="new_images" multiple>
        @error('new_images') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
    <br />

    <div class="p-2">
      <button type="submit" class="btn btn-primary" wire:click="update">Update</button>
      <button type="submit" class="btn btn-danger" wire:click="$emit('exitUpdate')">Cancel</button>
    </div>
  </div>
</div>
