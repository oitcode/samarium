<div class="m-3">

  @if (true)
  @if (false)
  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" wire:model="title">
    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Body</label>
    <textarea rows="5" class="form-control" wire:model="body">
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

    <input id="wcb2" value="{{ $this->body }}" wire:model.live="body" type="hidden">
    <trix-editor wire:ignore input="wcb2"></trix-editor>
    @error('body') <span class="text-danger">{{ $message }}</span> @enderror

    @script
    <script>
        let trixEditor = document.getElementById("wcb2")
    
        addEventListener("trix-blur", function(event) {
            @this.set('body', trixEditor.getAttribute('value'))
        })
    </script>
    @endscript
  </div>
  @endif



  <div class="form-group">
      <label for="">Image</label>
      <input type="file" class="form-control" wire:model.live="image">
      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-primary" wire:click="update">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$dispatch('exitWebpageContentEditMode')">Cancel</button>
  @endif
</div>
