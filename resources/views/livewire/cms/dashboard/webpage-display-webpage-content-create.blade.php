<div class="m-3">
  @if (false)
  <h2 class="h5">Create webpage content</h2>
  @endif

  @if (false)
  <div>
    <button class="btn btn-light mr-2">
      Heading
    </button>
    <button class="btn btn-light mr-2">
      Paragraph
    </button>
    <button class="btn btn-light mr-2">
      Image
    </button>
    <button class="btn btn-light mr-2">
      Video
    </button>
    <button class="btn btn-light mr-2">
      List
    </button>
    <button class="btn btn-light mr-2">
      Button
    </button>
    <button class="btn btn-light mr-2">
      Html
    </button>
  </div>
  @endif

  @if (true)
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" wire:model.defer="title">
    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @if (true)
  <div class="form-group">
    <label for="">Body</label>
    <textarea rows="5" class="form-control" wire:model.defer="body">
    </textarea>
    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  @endif

  @if (false)
  <div>
    <input id="wcb1" value="Editor content goes here" wire:model="body" name="content" wire:key="{{ rand() }}">
    <div class="form-group" wire:ignore>
      <trix-editor input="wcb1" wire:key="andthisBayern"></trix-editor>
      @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  @endif

  <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
      <label for="">Video</label>
      <input type="text" class="form-control" wire:model="video_link">
      @error('video_link') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateWebpageContent')">Cancel</button>
  @endif
</div>
