<div>

  @session('error')
    <x-alert-component id="alert-error" type="danger" :message="session('error')" />
  @endsession

  @session('success')
    <x-alert-component id="alert-success" type="success" :message="session('success')" />
  @endsession

  <x-list-component>
    <x-slot name="listInfo">
      <div class="d-flex">
        <div class="mr-4">
          Users: {{ $usersCount }}
        </div>
        <div>
          Admin: {{ $adminUsersCount }}
        </div>
      </div>
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>User ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($users as $user)
        <x-table-row-component>
          <td>
            {{ $user->id }}
          </td>
          <td class="font-weight-bold" wire:click="$dispatch('displayUser', {user: {{ $user }} })" role="button">
            {{ $user->name }}
          </td>
          <td>
            {{ $user->email }}
          </td>
          <td>
            @if ($user->role == 'admin')
              <span class="badge badge-pill badge-primary shadow">
                {{ $user->role }}
              </span>
            @else
              <span class="badge badge-pill badge-light shadow">
                {{ $user->role }}
              </span>
            @endif
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayUser', {user: {{ $user }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayUser', {user: {{ $user }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="deleteUser({{ $user }})">
              <i class="fas fa-trash"></i>
            </button>
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
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $users->links() }}
    </x-slot>
  </x-list-component>

</div>
