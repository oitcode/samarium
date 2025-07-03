<div>

  <div class="mt-2 mb-2">
    <h2 class="h4 o-heading py-3">
      User profile
    </h2>
  </div>

  {{-- Basic info --}}
  <div class="py-5 mb-4 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading text-white">
      {{ Auth::user()->name }}
    </div>
    <div class="h5 text-white">
      {{ Auth::user()->email }}
    </div>
  </div>

  {{--
  |
  | Username
  |
  --}}
  <div class="bg-white p-3 mb-4 o-border-radius">
    <div class="h5 o-heading text-muted mb-2">
      Username
    </div>
    <div class="">
      {{ $user->name }}
    </div>
  </div>

  {{--
  |
  | Email
  |
  --}}
  <div class="bg-white p-3 mb-4 o-border-radius">
    <div class="h5 o-heading text-muted mb-2">
      Email Address
    </div>
    <div class="">
      {{ $user->email }}
    </div>
  </div>

  {{--
  |
  | Role
  |
  --}}
  <div class="bg-white p-3 mb-4 o-border-radius">
    <div class="h5 o-heading text-muted mb-2">
      User Role
    </div>
    <div class="">
      @if ($user->role == 'standard')
        <span class="badge badge-pill badge-success h4 o-heading text-white">
          Standard
        </span>
      @elseif ($user->role == 'admin')
        <span class="badge badge-pill badge-danger h4 o-heading text-white">
          Admin
        </span>
      @else
        {{ $user->role }}
      @endif
    </div>
  </div>

</div>
