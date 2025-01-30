<div>

  <select class="custom-control w-75" wire:model="priority">
    <option value="low">Low</option>
    <option value="medium">Medium</option>
    <option value="high">High</option>
  </select>

  <div class="my-3">
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'todoUpdatePriorityCancelled',])
  </div>

</div>
