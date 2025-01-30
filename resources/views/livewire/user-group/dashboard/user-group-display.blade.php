<div>

  <div class="bg-white border p-3">
    <div class="mb-3 h5 font-weight-bold py-3">
      <i class="fas fa-cogs mr-3 text-secondary"></i>
      {{ $userGroup->name }}
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Name
        </div>
        <div class="col-md-9 border p-3">
          @if ($modes['updateNameMode'])
            @livewire ('user-group.dashboard.user-group-edit-name', ['userGroup' => $userGroup,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $userGroup->name }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateNameMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          User Group ID
        </div>
        <div class="col-md-9 border p-3">
          {{ $userGroup->user_group_id }}
        </div>
      </div>
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Created Date
        </div>
        <div class="col-md-9 border p-3">
          {{ $userGroup->created_at->toDateString() }}
        </div>
      </div>
    </div>
    <div>
      <div class="row" style="margin: auto;">
        <div class="col-md-3 border p-3 bg-light font-weight-bold">
          Description
        </div>
        <div class="col-md-9 border p-3">
          @if ($modes['updateDescriptionMode'])
            @livewire ('user-group.dashboard.user-group-edit-description', ['userGroup' => $userGroup,])
          @else
            <div class="d-flex justify-content-between">
              <div>
                {{ $userGroup->description }}
              </div>
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateDescriptionMode')">
                  Edit
                </button>
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white border p-3 my-3">
    <h2 class="h6 font-weight-bold">
      Users
    </h2>
    @foreach ($userGroup->users as $user)
      <div>
        {{ $user->name }}
      </div>
    @endforeach
  </div>

  <div class="bg-white border p-3 my-3">
    <div class="col-md-6 p-0 border rounded">
      {{-- Delete event --}}
      <div>
        <div class="d-flex justify-content-between p-3">
          <div>
            <div>
              <strong>
                Delete this user group
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
