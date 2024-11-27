<div class="border-rm bg-white-rm">

  {{-- Top flash cards --}}
  @if (true)
  <div class="row my-3">
    <div class="col-md-6">
      <div class="">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-users',
            'btnTextPrimary' => 'Users',
            'btnTextSecondary' => $usersCount,
        ])
      </div>
    </div>

    <div class="col-md-6">
      <div class="">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-user-graduate',
            'btnTextPrimary' => 'Admin',
            'btnTextSecondary' => $adminUsersCount,
        ])
      </div>
    </div>
  </div>
  @endif

  @if (!is_null($users) && count($users) > 0)
    {{-- Show in bigger screens --}}
    <div class="d-none d-md-block bg-white border">
      <div class="table-responsive">
        <table class="table table-hover table-valign-middle">
          <thead>
            <tr class="{{ config('app.oc_ascent_bg_color', 'bg-success') }}
                {{ config('app.oc_ascent_text_color', 'text-white') }}
                p-4" style="font-size: 1rem;">
              <th>User ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Role</th>
              @if (false)
              <th>Action</th>
              @endif
            </tr>
          </thead>
  
          <tbody>
            @foreach($users as $user)
            <tr>
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

              @if (false)
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
              @endif
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
            <span  wire:click="$dispatch('displayUser', {user: {{ $user }} })" class="h5 text-dark font-weight-bold" role="button">
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
