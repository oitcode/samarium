<div>

  <div class="form-group">
    <select class="form-control" wire:model="user_group_id">
      <option value="---">---</option>
      @foreach ($userGroups as $userGroup)
        <option value="{{ $userGroup->user_group_id }}">{{ $userGroup->name }}</option>
      @endforeach
    </select>
    @error ('user_group_id')
      <div class="text-danger">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="my-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'documentFileEditUserGroupCancel'])
    @include ('partials.dashboard.spinner-button')
  </div>

</div>
