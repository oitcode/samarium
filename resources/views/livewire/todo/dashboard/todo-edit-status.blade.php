<div>

  <select class="custom-control w-75" wire:model="status">
    <option value="pending">Pending</option>
    <option value="progress">Progress</option>
    <option value="deferred">Deferred</option>
    <option value="cancelled">Cancelled</option>
    <option value="done">Done</option>
  </select>

  <div class="my-3">
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'todoUpdateStatusCancelled',])
  </div>

</div>
