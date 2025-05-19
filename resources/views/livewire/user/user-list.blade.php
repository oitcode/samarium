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
          Users: {{ $totalUsersCount }}
        </div>
        <div>
          Admin: {{ $totalAdminUsersCount }}
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
            @if ($modes['confirmDelete'])
              @if ($deletingUser->id == $user->id)
                <button class="btn btn-danger mr-1" wire:click="deleteUser">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteUser">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingUser->id == $user->id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  User cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteUser">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayUser', {userId: {{ $user->id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayUser', {userId: {{ $user->id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteUser({{ $user->id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $users->links() }}
    </x-slot>
  </x-list-component>

</div>
