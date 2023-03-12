<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle text-secondary" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    More
  </a>
  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    @foreach ($cmsNavMenuItem->cmsNavMenuDropdownItems as $cmsNavMenuDropdownItem)
      <a class="dropdown-item"
        href="">
        <i class="fas fa-angle-right text-info mr-2"></i>
        {{ $cmsNavMenuDropdownItem->name }}
      </a>
    @endforeach
  </div>
</li>
