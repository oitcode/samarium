<div class="m-3">

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

  <div class="my-3">
    <button type="submit" class="btn btn-primary" wire:click="update">Save</button>
    <button type="submit" class="btn btn-danger" wire:click="$dispatch('exitWebpageContentEditMode')">Cancel</button>
  </div>

</div>
