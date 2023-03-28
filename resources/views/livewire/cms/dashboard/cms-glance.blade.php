<div class="bg-white border">
  @if (true)
  <div class="d-flex justify-content-between">
    <div class="pt-3 pl-3 border-rm">
      <h2 class="h6 font-weight-bold">
        <i class="fas fa-book mr-1"></i>
        CMS
      </h2>
    </div>
    <div>
      <i class="fas fa-cog mr-3 mt-3"></i>
    </div>
  </div>
  @endif



  {{-- First row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-cms-post') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;" >
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-edit fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Posts
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $postCount }}
            </div>
          </div>
        </div>
      </a>
    </div>

    @if (true)
    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-cms-webpage') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;">
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-clone fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Pages
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $webpageCount }}
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-cms-gallery') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;">
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-image fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Gallery
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $galleryCount }}
            </div>
          </div>
        </div>
      </a>
    </div>
    @endif

  </div>


  {{-- Second row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-cms-nav-menu') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;" >
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-link fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Nav menu
            </div>
          </div>
          @if (false)
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $postCount }}
            </div>
          </div>
          @endif
        </div>
      </a>
    </div>

    @if (true)
    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-cms-theme') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;">
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-palette fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Theme
            </div>
          </div>
          @if (false)
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $webpageCount }}
            </div>
          </div>
          @endif
        </div>
      </a>
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-quick-contacts') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;">
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-users fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Quick Contacts
            </div>
          </div>
          @if (false)
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $galleryCount }}
            </div>
          </div>
          @endif
        </div>
      </a>
    </div>
    @endif

  </div>



  @if (true)
  <div class="my-2 px-2 text-secondary">
    SevenCent <a href="">0.4.0</a>
  </div>
  @endif
</div>
