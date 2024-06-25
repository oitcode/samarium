<div class="float-right border-right-rm" style="{{--font-size: 1.3rem;--}}">
  <div class="dropdown">
    <button class="btn btn-light-rm text-white-rm dropdown-toggle-rm" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-th text-white" style="font-size: 1.3rem;"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">

      <a class="dropdown-item" href="{{ route('company') }}">
        <i class="fas fa-home text-secondary mr-2"></i>
        Company
      </a>

      <a class="dropdown-item" href="{{ route('dashboard-settings') }}">
        <i class="fas fa-cog text-secondary mr-2"></i>
        Settings
      </a>

      <a class="dropdown-item" href="{{ route('dashboard-users') }}">
        <i class="fas fa-users text-secondary mr-2"></i>
        Users
      </a>

      <a class="dropdown-item" href="{{ route('dashboard-user-group') }}">
        <i class="fas fa-users text-secondary mr-2"></i>
        User group
      </a>

      @if (false)
      <div class="dropdown-divider mb-0"></div>
      @endif

    </div>
  </div>
</div>
