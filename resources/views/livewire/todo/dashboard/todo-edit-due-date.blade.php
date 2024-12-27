<div>


  <input type="date" wire:model="due_date" />

  <div class="my-3">
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'todoUpdateDueDateCancelled',])
  </div>


</div>
