<div class="card">
  <div class="card-body" style="font-size: 1.3rem;">
  
    <h3 class="h5 text-secondary">Add webpage content</h3>
  
    <div class="form-group">
      <label for="">Content type</label>
      <select
          class="custom-control"
          wire:model="content_type"
          style="font-size: 1.3rem;"
          rows="5">
        <option>---</option>
        <option value="heading">Heading</option>
        <option value="paragraph">Paragraph</option>
        <option value="image">Image</option>
        <option value="paragraph_and_image">Paragraph & Image</option>
      </select>
      @error('content_type') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($content_type == 'heading')
      <div class="form-group">
        <label for="">Content</label>
        <input
            class="form-control"
            wire:model.defer="content"
            style="font-size: 1.3rem;">
        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    @elseif ($content_type == 'paragraph')
      <div class="form-group">
        <label for="">Content</label>
        <textarea
            class="form-control"
            wire:model.defer="content"
            style="font-size: 1.3rem;"
            rows="5">
        </textarea>
        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    @elseif ($content_type == 'image')
      <div class="form-group">
        <label for="">Image</label>
        <input type="file" class="form-control" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    @elseif ($content_type == 'paragraph_and_image')
    @endif

    @if (false)
    @endif

    <div class="mt-4" style="font-size: 1.3rem;">
      <button type="submit"
          class="btn btn-success" wire:click="store"
          style="font-size: 1.3rem;">
        Submit
      </button>
      <button type="submit"
          class="btn btn-danger" wire:click="$emit('exitCreateWebpageContent')"
          style="font-size: 1.3rem;">
        Cancel
      </button>
    </div>
  
  </div>
</div>
