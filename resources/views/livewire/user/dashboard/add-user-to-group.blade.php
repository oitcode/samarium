<div class="border bg-white-rm p-3 mb-3" style="">
  <h2 class="h6 font-weight-bold mb-3">
    Add user to group
  </h2>

  @if (session()->has('message'))
    {{-- Flash message div --}}
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        @if (true)
        {{ session('message') }}
        @endif
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-success" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif

  <div class="form-group">
    <label>
      Group
    </label>
    <select class="form-control" wire:model.defer="user_group_id">
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
  <button class="btn btn-primary py-2" wire:click="store">
    Submit
  </button>
  <button class="btn btn-light py-2" wire:click="$emit('addUserToGroupCancelled')">
    Cancel
  </button>
  <br/>
</div>
