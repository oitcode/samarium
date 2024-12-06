<div class="dropdown">
  <button class="btn" type="button" id="dropdownMisc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-th text-white"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMisc">

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

  </div>
</div>
