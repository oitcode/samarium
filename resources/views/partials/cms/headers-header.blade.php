<div class="p-0 px-0" 
  style="
    background-color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->top_header_bg_color }}
        @else
          orange
        @endif
        ;
    color:
        @if (\App\CmsTheme::first())
          {{ \App\CmsTheme::first()->top_header_text_color }}
        @else
          white
        @endif
    ;"
>
  {{-- Show in bigger screens --}}
  <div class="container d-none d-md-block">
    <div class="d-flex justify-content-center h-100 pl-2">
      <a href="{{ route('website-home') }}" class="text-decoration-none">
      <div class="d-flex py-3">
        <div class="mr-4 d-flex flex-column justify-content-center">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="max-width: 100px; max-height: 100px;">
        </div>
      </div>
      </a>
      <div class="d-flex flex-grow-1">
        <div class="d-flex flex-column justify-content-center flex-grow-1 px-4">
          <h1 class="h5 font-weight-bold my-1" style="font-family: Mono;">
            @if ($company->short_name)
              {{ \Illuminate\Support\Str::limit($company->short_name, 100, $end=' ...') }}
            @else
              {{ \Illuminate\Support\Str::limit($company->name, 100, $end=' ...') }}
            @endif
          </h1>
          <div class="w-100">
            <div>
              {{ $company->address }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="d-none d-md-block">
    <nav class="navbar navbar-expand-lg m-0 p-0 d-md-none">
      <button class="navbar-toggler p-3 m-3" style="border: 1px solid gray;" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-list"></i>
      </button>
      <a class="navbar-brand p-3 text-reset" href="/">
        <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
      </a>
      <div class="px-3">
        @livewire ('ecomm-website.shopping-cart-badge')
      </div>
      <div class="collapse navbar-collapse m-0 p-0 mt-4" id="navbarSupportedContent" style="margin-left: 0;">
        <ul class="navbar-nav m-0 p-0" style="margin: auto;">
          {{-- Common things --}}
          @guest
            <li class="nav-item border bg-light text-dark p-3">
              <a class="nav-link text-dark" href="{{ route('login') }}">
                <i class="fas fa-user mr-3"></i>
                <span class="font-weight-bold">
                Sign in 
                </span>
              </a>
            </li>
            <li class="nav-item border bg-light text-dark p-3">
              <a class="nav-link text-dark" href="{{ route('register') }}">
                <i class="fas fa-lock mr-3"></i>
                <span class="font-weight-bold">
                Sign up
                </span>
              </a>
            </li>
          @else
            <li class="nav-item border bg-light text-dark p-3">
              <a class="nav-link text-dark" href="{{ route('website-user-profile') }}">
                <i class="fas fa-user mr-3"></i>
                <span class="font-weight-bold">
                My profile
                </span>
              </a>
            </li>
            <li class="nav-item border bg-light text-dark p-3">
              <a class="nav-link text-dark" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
              >
                <i class="fas fa-power-off mr-2 text-danger font-weight-bold"></i>
                <span class="text-danger font-weight-bold">
                Logout
              </a>
            </li>
          @endguest
        </ul>
      </div>
    </nav>
  </div>
</div>
