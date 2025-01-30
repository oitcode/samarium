<div class="border p-3 mb-3">

  <h2 class="h6 font-weight-bold mb-3">
    Add user to group
  </h2>

  {{--
  |
  | Flash message div.
  |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', ['message' => session('message'),])
  @endif

  <div class="form-group">
    <label>
      Group
    </label>
    <select class="form-control" wire:model="user_group_id">
      @foreach ($userGroups as $userGroup)
        <option value="{{ $userGroup->user_group_id }}">{{ $userGroup->name }}</option>
      @endforeach
    </select>
    @error('user_group_id')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
  </div>

  <div>
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'addUserToGroupCancelled',])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
