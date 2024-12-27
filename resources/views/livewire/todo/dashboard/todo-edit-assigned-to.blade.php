<div>


  <select class="custom-control w-75" wire:model="assigned_to_id">
    @foreach ($users as $user)
      <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
  </select>

  <div class="my-3">
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'todoUpdateAssignedToCancelled',])
  </div>


</div>
