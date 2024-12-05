<div class="container-fluid {{ config('app.site_ecs_theme_bs_class') }}">
<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark">
    <button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
  

          <li class="nav-item text-white mr-3 pr-3">
            <a class="nav-link text-white" href="{{ route('website-home') }}">
              Home
            </a>
          </li>

          <li class="nav-item dropdown mr-3">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Study abroad
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('website-ecs-usa') }}">
                  USA
                </a>
                <a class="dropdown-item" href="{{ route('website-ecs-uk') }}">
                  UK
                </a>
                <a class="dropdown-item" href="{{ route('website-ecs-australia') }}">
                  Australia
                </a>
                <a class="dropdown-item" href="{{ route('website-ecs-newzealand') }}">
                  New Zealand
                </a>
                <a class="dropdown-item" href="{{ route('website-ecs-japan') }}">
                  Japan
                </a>
            </div>
          </li>

          <li class="nav-item dropdown mr-3">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Test preparation
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('website-ecs-toefl') }}">
                  TOEFL
                </a>
                <a class="dropdown-item" href="{{ route('website-ecs-ielts') }}">
                  IELTS
                </a>
                <a class="dropdown-item" href="{{ route('website-ecs-pte') }}">
                  PTE
                </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-3">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Entrance preparation
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="">
                  Budhanilkantha School
                </a>
                <a class="dropdown-item" href="">
                  St Xaviers School
                </a>
            </div>
          </li>

          <li class="nav-item text-white mr-3 pr-3">
            <a class="nav-link text-white" href="{{ route('website-ecs-gallery') }}">
              Gallery
            </a>
          </li>

          <li class="nav-item text-white mr-3 pr-3">
            <a class="nav-link text-white" href="{{ route('website-ecs-contact-us') }}">
              Contact
            </a>
          </li>
  
      </ul>
    </div>
  </nav>
</div>
</div>
