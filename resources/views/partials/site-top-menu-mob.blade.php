<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="" style="color: #004;">
  <i class="fas fa-check-circle"></i>
  {{ $company->name }}
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @foreach ($cmsNavMenu->cmsNavMenuItems()->orderBy('order', 'asc')->get() as $cmsNavMenuItem)
        <li class="nav-item">
          <a class="nav-link" href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
            {{ $cmsNavMenuItem->name }}
          </a>
        </li>
      @endforeach
    </ul>
  </div>
</nav>
