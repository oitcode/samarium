<div class="d-flex flex-column justify-content-center h-100">
  <div class="dropdown">
    <button class="btn btn-light dropdown-toggle o-caret-off" type="button" id="{{ $toolbarButtonDropdownId}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="{{ $toolbarIcon ?? 'fas fa-th' }}"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      {{ $slot }}
    </div>
  </div>
</div>
