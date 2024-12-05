<div class="float-right mx-4 px-4 text-white border-right-rm">
  <div class="dropdown">
    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-cog text-secondry mr-2"></i>
      CMS
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
      <a class="dropdown-item" href="{{ route('dashboard-cms-webpage') }}">
        <i class="fas fa-globe text-secondary mr-2"></i>
        Pages
      </a>
      <a class="dropdown-item" href="{{ route('dashboard-cms-post') }}">
        <i class="fas fa-book text-secondary mr-2"></i>
        Posts
      </a>
      <a class="dropdown-item" href="{{ route('dashboard-cms-nav-menu') }}">
        <i class="fas fa-home text-secondary mr-2"></i>
        Nav menu
      </a>
      <a class="dropdown-item" href="{{ route('dashboard-cms-theme') }}">
        <i class="fas fa-check-circle text-secondary mr-2"></i>
        Theme
      </a>
      <a class="dropdown-item" href="{{ route('dashboard-team') }}">
        <i class="fas fa-users text-secondary mr-2"></i>
        Team
      </a>
      <a class="dropdown-item" href="{{ route('dashboard-quick-contacts') }}">
        <i class="fas fa-users text-secondary mr-2"></i>
        Quick Contacts
      </a>
      @if (has_module('bgc'))
        <a class="dropdown-item" href="{{ route('dashboard-organizing-committee') }}">
          <i class="fas fa-users text-secondary mr-2"></i>
          Organizing Committee
        </a>
        <a class="dropdown-item" href="{{ route('dashboard-sponsors') }}">
          <i class="fas fa-heart text-secondary mr-2"></i>
          Sponsors
        </a>
      @endif
    </div>
  </div>
</div>
