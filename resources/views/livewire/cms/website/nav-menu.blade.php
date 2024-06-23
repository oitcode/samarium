<div class="sticky-top-rm bg-danger-rm">

  {{--
  |
  | Navigation menu of cms website.
  |
  | This is the blade file for navigation menu of cms websites.
  | We have different code for bigger and smaller screens.
  |
  --}}


  {{--
  |
  | BIGGER SCREEN
  |
  --}}
  <div class="d-none d-md-block">
    <div class="container-fluid p-0"
        style="
        @if (\App\CmsTheme::first())
            background-color: {{ \App\CmsTheme::first()->nav_menu_bg_color }};
            color: {{ \App\CmsTheme::first()->nav_menu_text_color }};
        @endif
        ">
      <div class="m-0" style="background-color: rgba(0, 0, 0, 0.0);">
        <div class="container">
          <div class="d-flex justify-content-between">
            <div class="">
              @include ('partials.cms.nav-menu-desktop')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{--
  |
  | SMALLER SCREEN
  |
  --}}
  <div class="d-md-none">
    <div class="container-fluid p-0 bg-warning">
      @include ('partials.cms.nav-menu-mobile')
    </div>
  </div>

</div>
