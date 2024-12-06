<div class="dropdown">
  <button class="btn" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-user-circle mr-2 text-white"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
    <a class="dropdown-item" href="{{ route('dashboard-change-password') }}">
      <i class="fas fa-key text-secondary mr-2"></i>
      Change password
    </a>
    <div class="dropdown-divider mb-0"></div>
    <a class="dropdown-item mb-0" href="{{ route('logout') }}"
        onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
    >
      <i class="fas fa-power-off mr-2"></i>
      Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
  </div>
</div>
