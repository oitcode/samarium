<div>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      @foreach ($gallery->galleryImages as $galleryImage)
        @if ($loop->first)
          @continue
        @endif
        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->iteration }}"></li>
      @endforeach
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="container-fluid p-0 bg-primary text-white">
          <div class="row" style="margin: auto;">
            <div class="col-md-6 p-0">
              <img class="d-block w-100" src="{{ asset('storage/' . $gallery->galleryImages()->first()->image_path) }}" alt="First slide">
            </div>
            <div class="col-md-4 p-5">
              <div class="d-flex justify-content-center h-100">
                <div class="d-flex flex-column justify-content-center">
                  <h5 class="h2 font-weight-bold">{{ $gallery->galleryImages()->first()->comment }}</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @foreach ($gallery->galleryImages as $galleryImage)
        @if ($loop->first)
          @continue
        @endif
        <div class="carousel-item">
          <div class="container-fluid p-0 bg-primary text-white">
            <div class="row" style="margin: auto;">
              <div class="col-md-6 p-0">
                <img class="d-block w-100" src="{{ asset('storage/' . $galleryImage->image_path) }}" alt="First slide">
              </div>
              <div class="col-md-4 p-5">
                <div class="d-flex justify-content-center h-100">
                  <div class="d-flex flex-column justify-content-center">
                    <h5 class="h2 font-weight-bold">{{ $galleryImage->comment }}</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <i class="fas fa-arrow-circle-left fa-5x text-white"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <i class="fas fa-arrow-circle-right fa-5x text-white"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>

</div>
