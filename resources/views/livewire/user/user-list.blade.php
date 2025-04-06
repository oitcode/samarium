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
            <x-list-edit-button-component clickMethod="$dispatch('displayUser', {userId: {{ $user->id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayUser', {userId: {{ $user->id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="deleteUser({{ $user }})">
            </x-list-delete-button-component>
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
