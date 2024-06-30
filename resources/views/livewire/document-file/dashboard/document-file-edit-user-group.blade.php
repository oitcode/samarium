<div>

  <div class="form-group">
    <select class="form-control" wire:model.defer="user_group_id">
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
    <button class="btn btn-sm btn-success" wire:click="store">
      Save
    </button>
    <button class="btn btn-sm btn-danger" wire:click="$emit('documentFileEditUserGroupCancel')">
      Cancel
    </button>
  </div>

</div>
