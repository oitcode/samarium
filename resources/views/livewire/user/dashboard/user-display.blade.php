<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading o-linear-gradient-text-color">
      {{ $user->name }}
    </div>
    <div class="h5">
      {{ $user->email }}
    </div>
  </div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      User
      <i class="fas fa-angle-right mx-2"></i>
      {{ $user->name }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="">
        <i class="fas fa-ellipsis-h"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="closeThisComponent">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  {{--
  |
  | Name
  |
  --}}

  <div class="bg-white mb-2 p-2 border-bottom">
    <div class="d-flex justify-content-start">
      <div class="d-flex flex-column justify-content-center mr-3">
        <span class="o-heading">
          {{ $user->name }}
        </span>
      </div>
    </div>
  </div>
  <div class="bg-white mb-2">
    <div class="d-flex justify-content-between p-2 border-bottom">
      <div class="d-flex flex-column justify-content-center o-heading">
        Name
      </div>
    </div>
    <div class="p-2 py-3">
      {{ $user->name }}
    </div>
  </div>

  {{--
  |
  | Created at
  |
  --}}

  <div class="bg-white mb-2">
    <div class="d-flex justify-content-between p-2 border-bottom">
      <div class="d-flex flex-column justify-content-center o-heading">
        Created at
      </div>
    </div>
    <div class="p-2 py-3">
      {{ $user->created_at->toDateString() }}
    </div>
  </div>

  {{--
  |
  | Role
  |
  --}}

  <div class="bg-white mb-2">
    <div class="d-flex justify-content-between p-2 border-bottom">
      <div class="d-flex flex-column justify-content-center o-heading">
        Role
      </div>
    </div>
    <div class="p-2 py-3">
      @if ($user->role == 'standard')
        <span class="badge badge-pill badge-success">
          Standard
        </span>
      @elseif ($user->role == 'admin')
        <span class="badge badge-pill badge-danger">
          Admin
        </span>
      @else
        {{ $user->role }}
      @endif
    </div>
  </div>

  {{--
  |
  | Last login
  |
  --}}

  <div class="bg-white mb-2">
    <div class="d-flex justify-content-between p-2 border-bottom">
      <div class="d-flex flex-column justify-content-center o-heading">
        Last login
      </div>
    </div>
    <div class="p-2 py-3">
      {{ $user->last_login_at }}
    </div>
  </div>

  {{--
  |
  | Groups
  |
  --}}

  <div class="bg-white bg-2">
    <div class="d-flex justify-content-between p-2 border-bottom">
      <div class="d-flex flex-column justify-content-center o-heading">
        Groups
      </div>
      <div>
        <button class="btn btn-light border" wire:click="enterMode('addUserToGroupMode')">
          Add to a group 
        </button>
      </div>
    </div>
    <div>
      @if ($modes['addUserToGroupMode'])
        @livewire ('user.dashboard.add-user-to-group', ['user' => $user,])
      @else
        @if ($user->userGroups != null && count($user->userGroups) > 0)
          <div class="table-responsive">
            <table class="table">
              <tr>
                @foreach ($user->userGroups as $userGroup)
                  <td class="py-3">
                      <span class="badge-pill badge-light p-2 border mb-3 mr-3">
                      {{ $userGroup->name }}
                      </span>
                  </td>
                @endforeach
              </tr>
            </table>
          </div>
        @else
          <div class="py-4 px-2 bg-white border" style="color: #fe8d01;">
            <i class="fas fa-exclamation-circle mr-2"></i>
            User not in any groups
          </div>
        @endif
      @endif
    </div>
  </div>

</div>
