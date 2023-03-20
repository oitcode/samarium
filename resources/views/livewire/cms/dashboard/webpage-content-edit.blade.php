<div class="m-3">

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

    <input id="wcb2" value="{{ $body }}" wire:model="body" type="hidden" name="content" wire:key="{{ rand() }}">
    <div class="form-group">
      <trix-editor wire:ignore input="wcb2" wire:key="andthisBayern-{{ rand() }}"></trix-editor>
      @error('body') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <script>
        var trixEditor = document.getElementById("wcb2")
    
        addEventListener("trix-blur", function(event) {
            @this.set('body', trixEditor.getAttribute('value'))
        })
    </script>
  </div>
  @endif



  <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-primary" wire:click="update">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitWebpageContentEditMode')">Cancel</button>
  @endif
</div>
