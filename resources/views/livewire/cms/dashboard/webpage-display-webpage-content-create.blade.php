<div class="m-3">
  @if (false)
  <h2 class="h5">Create webpage content</h2>
  @endif

  @if (false)
  <div class="row">

    <div class="col-md-2 mr-2 border p-3">
      <div class="d-flex justify-content-center mb-3">
        <i class="fas fa-heading"></i>
      </div>
      <div class="d-flex justify-content-center">
        Heading
      </div>
    </div>

    <div class="col-md-2 mr-2 border p-3">
      <div class="d-flex justify-content-center mb-3">
        <i class="fas fa-paragraph"></i>
      </div>
      <div class="d-flex justify-content-center">
        Paragraph
      </div>
    </div>

    <div class="col-md-2 mr-2 border p-3">
      <div class="d-flex justify-content-center mb-3">
        <i class="fas fa-image"></i>
      </div>
      <div class="d-flex justify-content-center">
        Image
      </div>
    </div>

    <div class="col-md-2 mr-2 border p-3">
      <div class="d-flex justify-content-center mb-3">
        <i class="fas fa-object-group"></i>
      </div>
      <div class="d-flex justify-content-center">
        Media & Text 
      </div>
    </div>

    <div class="col-md-2 mr-2 border p-3">
      <div class="d-flex justify-content-center mb-3">
        <i class="fas fa-object-group"></i>
      </div>
      <div class="d-flex justify-content-center">
        Post list
      </div>
    </div>

  </div>
  @endif

  @if (true)
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" wire:model.defer="title">
    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @if (false)
  <div class="form-group">
    <label for="">Body</label>
    <textarea rows="5" class="form-control" wire:model.defer="body">
    </textarea>
    @error('body') <span class="text-danger">{{ $message }}</span> @enderror
  </div>
  @endif

  {{--
  |
  |
  | Putting trix editor
  |
  | Below solution is based on the tutorial
  |
  | https://tonylea.com/laravel-livewire-trix-editor-component
  |
  --}}

  @if (true)
  <div wire:ignore>
    <input id="wcb1" value="{{ $body }}" wire:model="body" type="hidden" name="content" wire:key="{{ rand() }}">
    <div class="form-group">
      <trix-editor wire:ignore input="wcb1" wire:key="andthisBayern"></trix-editor>
      @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>
  @endif

  <script>
      var trixEditor = document.getElementById("wcb1")
  
      addEventListener("trix-blur", function(event) {
          @this.set('body', trixEditor.getAttribute('value'))
      })
  </script>


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
