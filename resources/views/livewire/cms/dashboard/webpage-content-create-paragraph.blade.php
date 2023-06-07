<div>
  <div class="form-group">
    <label>Paragraph</label>
    <textarea rows="5" class="form-control" wire:model="paragraph">
    </textarea>
  </div>

  <div class="">
    <button class="btn btn-success" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger" wire:click="$emit('webpageContentCreateParagraphCancelled')">
      Cancel
    </button>
  </div>
</div>
