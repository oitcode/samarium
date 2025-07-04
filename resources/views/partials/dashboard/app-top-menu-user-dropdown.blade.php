<div class="d-flex">
  <div class="d-flex flex-column justify-content-center mr-3" style="font-size: 1rem;">
    @if (false)
    <i class="fas fa-bell mr-2"></i>
    @endif
  </div>
  <div class="dropdown pt-1">
    <button class="btn mr-2" type="button" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="d-flex px-2 {{ config('app.app_top_menu_text_color') }}-rm">
        <div class="d-flex flex-column justify-content-center mr-1 o-package-color-rm px-3 py-2 o-border-radius-rm">
          <i class="fas fa-user-circle fa-2x text-primary-rm text-muted"></i>
        </div>
        <div class="d-flex flex-column justify-content-center pt-1 mr-3">
          <span class="h6">
            {{ Auth::user()->name }}
          </span>
        </div>
        <div class="d-flex flex-column justify-content-center">
          <i class="fas fa-angle-down mr-2" style="font-size: 1.2rem;"></i>
        </div>
      </div>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdownMenu">
      <a class="dropdown-item" href="{{ route('dashboard-user-own-profile') }}">
        <i class="fas fa-user-circle text-secondary mr-2"></i>
        User profile
      </a>
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
