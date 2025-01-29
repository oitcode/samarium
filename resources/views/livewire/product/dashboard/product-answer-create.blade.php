<div>

  <div class="form-group">
    <label for="">Answer</label>
    <textarea class="form-control" wire:model="answer_text"></textarea>
    @error('answer_text') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  @include ('partials.button-store')
  @include ('partials.button-cancel', ['clickEmitEventName' => 'createProductAnswerCancelled',])
  @include ('partials.dashboard.spinner-button')

</div>
