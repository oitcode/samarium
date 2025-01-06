<div class="d-flex">
  <div class="d-flex flex-column justify-content-center mr-4" style="font-size: 1rem;">
    <i class="fas fa-bell mr-2 text-white fa-2x-rm"></i>
  </div>
  <div class="dropdown pt-1">
    <button class="btn btn-outline-success-rm mr-2 text-white" type="button" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="d-flex bg-primary-rm px-2">
        <div class="d-flex flex-column justify-content-center d-inline pt-1 bg-primary-rm">
          <span class="h6 mr-2">
            {{ Auth::user()->name }}
          </span>
        </div>
        <div class="d-flex flex-column justify-content-center d-inline pt-1-rm bg-primary-rm">
          <i class="fas fa-user-circle mr-2 text-white-rm fa-2x-rm" style="font-size: 1.2rem;"></i>
        </div>
        <div class="d-flex flex-column justify-content-center d-inline pt-1-rm bg-primary-rm">
          <i class="fas fa-angle-down mr-2 text-white-rm fa-2x-rm" style="font-size: 1.2rem;"></i>
        </div>
      </div>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdownMenu">
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
</div>
