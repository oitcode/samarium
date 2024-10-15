<div>


  <div wire:ignore>

    <input id="wcb2" value="{{ $this->paragraph }}" wire:model.live="paragraph" type="hidden">
    <trix-editor wire:ignore input="wcb2"></trix-editor>
    @error('paragraph') <span class="text-danger">{{ $message }}</span> @enderror

    @script
    <script>
        let trixEditor = document.getElementById("wcb2")
    
        addEventListener("trix-blur", function(event) {
            @this.set('paragraph', trixEditor.getAttribute('value'))
        })
    </script>
    @endscript
  </div>

  <div class="">
    <button class="btn btn-success" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger" wire:click="$dispatch('webpageContentCreateParagraphCancelled')">
      Cancel
    </button>
  </div>


</div>
