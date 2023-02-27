<div class="border">

  @if (!is_null($users) && count($users) > 0)
    <table class="table table-hover table-valign-middle">
      <thead>
        <tr class="bg-light text-secondary border-top">
          <th class="text-info">User ID</th>
          <th class="text-info">Name</th>
          <th class="text-info">Email</th>
          <th class="text-info">Role</th>
          <th class="text-info">Action</th>
        </tr>
      </thead>
  
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>
            {{ $user->id }}
          </td>

          <td>
            <a class="text-dark" href="" wire:click.prevent="">
              {{ $user->name }}
            </a>
          </td>

          <td>
            {{ $user->email }}
          </td>

          <td>
            {{ $user->role }}
          </td>

  
          <td>
            <span class="btn btn-tool btn-sm mr-2" wire:click="$emit('enterUpdateMode', {{ $user }})">
              <i class="fas fa-pencil-alt text-primary"></i>
            </span>
            <span class="btn btn-tool btn-sm" wire:click="$emit('confirmDeleteUser', {{ $user }})">
              <i class="fas fa-trash text-danger"></i>
            </span>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <div class="p-2 text-muted">
      No users to display.
    </div>
  @endif

</div>
