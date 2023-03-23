<div class="bg-white border">
  @if (true)
  <div class="pt-2 pl-2 border-rm">
    <h2 class="h4">
      <i class="fas fa-tv mr-1"></i>
      CMS
    </h2>
  </div>
  @endif
  <div class="row p-2" style="margin: auto;">

    <div class="col-md-3 p-0 m-2" style="background-color: #eee;">
      <div class="d-flex justify-content-between">
        <div class="p-3">
          <i class="fas fa-edit fa-2x mr-1"></i>

          <div class="mt-3 h5">
          Posts
          </div>
        </div>
        <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #dde;">
          <div class="h3">
            {{ $postCount }}
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0 m-2" style="background-color: #eee;">
      <div class="d-flex justify-content-between">
        <div class="p-3">
          <i class="fas fa-book fa-2x mr-1"></i>

          <div class="mt-3 h5">
          Pages
          </div>
        </div>
        <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #dde;">
          <div class="h3">
            {{ $webpageCount }}
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-3 p-0 m-2" style="background-color: #eee;">
      <div class="d-flex justify-content-between">
        <div class="p-3">
          <i class="fas fa-image fa-2x mr-1"></i>

          <div class="mt-3 h5">
          Gallery
          </div>
        </div>
        <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #dde;">
          <div class="h3">
            {{ $galleryCount }}
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
