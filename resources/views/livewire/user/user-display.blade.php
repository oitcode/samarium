<div>


  <div class="d-flex justify-content-between bg-white py-0 mb-2">
    {{-- Breadcrumb --}}
    <div class="d-flex flex-column justify-content-center px-2">
      <div>
        User <i class="fas fa-angle-right mx-2"></i> {{ $user->name }}
      </div>
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between">

          @include ('partials.dashboard.spinner-button')

          <div>
            <button class="btn btn-light border p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-light border p-3" wire:click="">
              <i class="fas fa-ellipsis-h"></i>
            </button>

            <button class="btn btn-danger border p-3" wire:click="closeThisComponent">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  {{--
     |
     | Name
     |
  --}}
  <div class="bg-white mb-2 p-2 border-bottom">
    <div class="d-flex justify-content-start">
      <div class="d-flex flex-column justify-content-center mr-3">
        <span class="font-weight-bold">
          {{ $user->name }}
        </span>
      </div>
    </div>
  </div>

  <div class="bg-white mb-2">
    <div class="d-flex justify-content-between p-2 border-bottom">
      <div class="d-flex flex-column justify-content-center font-weight-bold">
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
      <div class="d-flex flex-column justify-content-center font-weight-bold">
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
      <div class="d-flex flex-column justify-content-center font-weight-bold">
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
      <div class="d-flex flex-column justify-content-center font-weight-bold">
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
      <div class="d-flex flex-column justify-content-center font-weight-bold">
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
