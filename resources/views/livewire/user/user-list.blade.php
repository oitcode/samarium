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

            <td class="font-weight-bold">
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
    </div>
  @else
    <div class="p-2 text-muted">
      No users to display.
    </div>
  @endif

</div>
