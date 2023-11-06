<div>
  <div class="form-group">
    <label for="">Answer</label>
    <textarea class="form-control" wire:model.defer="answer_text"></textarea>
    @error('answer_text') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('createProductAnswerCancelled')">Cancel</button>
</div>
