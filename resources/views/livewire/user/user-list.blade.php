<div class="border bg-white">

  @if (!is_null($users) && count($users) > 0)
    <div class="table-responsive">
      <table class="table table-hover table-valign-middle">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>User ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
  
        <tbody>
          @foreach($users as $user)
          <tr>
            <td>
              {{ $user->id }}
            </td>

            <td class="font-weight-bold" wire:click="$emit('displayUser', {{ $user }})" role="button">
              {{ $user->name }}
            </td>

            <td>
              {{ $user->email }}
            </td>

            <td>
              {{ $user->role }}
            </td>

            <td>
              <span class="btn btn-tool text-danger btn-sm" wire:click="deleteUser({{ $user }})">
                <i class="fas fa-trash mr-1"></i>
                Delete
              </span>
              @if ($modes['delete'])
                @if ($deletingUser->id == $user->id)
                  <span class="btn btn-danger mr-3" wire:click="confirmDeleteUser">
                    Confirm delete
                  </span>
                  <span class="btn btn-light mr-3" wire:click="deleteUserCancel">
                    Cancel
                  </span>
                @endif
              @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @else
    <div class="p-2 text-muted">
      No users to display.
    </div>
  @endif

</div>
