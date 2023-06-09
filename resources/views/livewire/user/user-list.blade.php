<div class="border bg-white">

  @if (!is_null($users) && count($users) > 0)
    {{-- Show in bigger screens --}}
    <div class="d-none d-md-block">
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
    </div>

    {{-- Show in smaller screens --}}
    <div class="d-md-none">

      @foreach ($users as $user)
        <div class="bg-white border px-3">
          <div class="h4-rm py-4">
            <span  wire:click="$emit('displayUser', {{ $user }})" class="h5 text-dark font-weight-bold" role="button">
              {{ \Illuminate\Support\Str::limit($user->name, 60, $end=' ...') }}
            </span>

            <br/ >
            <br/ >
            Email: {{ $user->email }} 
            <br/>
            Role:
            @if ($user->role == 'admin')
              <span class="badge badge-primary mx-2">
                Admin
              </span>
            @else
              <span class="badge badge-secondary mx-2">
                Standard
              </span>
            @endif

            <br />
          </div>
          <div>
            <span class="btn btn-light mr-3 mb-3" wire:click="deleteUser({{ $user }})">
              <i class="fas fa-trash mr-1"></i>
              Delete user
            </span>
            @if ($modes['delete'])
              @if ($deletingUser->id == $user->id)
                <span class="btn btn-danger mr-3 mb-3" wire:click="confirmDeleteUser">
                  Confirm delete
                </span>
                <span class="btn btn-light mr-3 mb-3" wire:click="deleteUserCancel">
                  Cancel
                </span>
              @endif
            @endif
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="p-2 text-muted">
      No users to display.
    </div>
  @endif

</div>
