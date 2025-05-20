<div class="dropdown">
  <button class="btn btn-light dropdown-toggle py-3 o-caret-off" type="button" id="{{ $toolbarButtonDropdownId}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="{{ $toolbarIcon ?? 'fas fa-th' }}"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    {{ $slot }}
  </div>
</div>
