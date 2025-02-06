<div>

  <div class="mb-2">
    <h2 class="h5 o-heading py-3">
      User profile
      @if (false)
      {{ Auth::user()->name }}
      @endif
    </h2>

    {{-- Basic info --}}
    <div class="table-responsive bg-white border">
      <table class="table mb-0">
        <tr class="border-top">
          <th class="border-0 o-heading">Name</th>
          <td class="border-0">{{ Auth::user()->name }}</td>
        </tr>
        <tr>
          <th class="border-0 o-heading">Email</th>
          <td class="border-0">{{ Auth::user()->email }}</td>
        </tr>
      </table>
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

</div>
