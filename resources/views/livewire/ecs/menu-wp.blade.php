<div class="container-fluid {{ env('SITE_ECS_THEME_BS_CLASS') }}">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark" style="font-size: 1.2rem;">
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  
          @foreach ($cmsNavMenu->cmsNavMenuItems as $cmsNavMenuItem)
            <li class="nav-item text-white mr-3 pr-3">
              <a class="nav-link text-white" href="{{ route('website-webpage-' . $cmsNavMenuItem->webpage->permalink) }}">
                {{ $cmsNavMenuItem->webpage->name }}
              </a>
            </li>
          @endforeach
      </ul>
    </div>
  </nav>
</div>
</div>
