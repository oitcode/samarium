<div class="container-fluid py-5-rm bg-danger-rm text-white-rm">
  <div class="container">

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner bg-light-rm text-dark">
        <div class="carousel-item active">
          @if (true)
          <div class="d-flex justify-content-center">
            <div class="col-md-6-rm p-3">
              <h2>
                Lorem ipsume dolor
              </h2>
              <p class="text-secondary">
                Lorem ipsume
              </p>
              <img class="img-fluid h-25-rm w-100-rm"
                  src="{{ asset('img/boutique-1.png') }}"
                  alt="FOOBAR"
                  style="max-height: 100px; max-width: 100px;">
              <div class="my-5-rm">
                <h2 class="h4">
                  Rs 12,500
                </h2>
              </div>
              <div class="my-5">
                <button class="btn btn-lg btn-block btn-danger">
                  Buy now
                </button>
              </div>
            </div>
          </div>
          @endif
        </div>
        <div class="carousel-item">
          @if (true)
          <div class="d-flex justify-content-center">
            <div class="col-md-6-rm p-3">
              <h2 class="h1">
                Lorem ipsume dolor
              </h2>
              <p class="text-secondary">
                Lorem ipsume
              </p>
              <img class="img-fluid h-25-rm w-100-rm"
                  src="{{ asset('img/boutique-3.png') }}"
                  alt="FOOBAR"
                  style="max-height: 100px; max-width: 100px;">
              <div class="my-5">
                <h2 class="h1">
                  Rs 12,500
                </h2>
              </div>
              <div class="my-5">
                <button class="btn btn-lg btn-block btn-danger">
                  Buy now
                </button>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
      <a class="carousel-control-prev bg-dark-rm" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <i class="fas fa-chevron-left fa-2x bg-danger text-white p-5 border"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <i class="fas fa-chevron-right fa-2x bg-danger text-white p-5 border"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
