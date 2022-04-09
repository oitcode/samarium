<div class="mt-4">
  <div class="my-3 text-secondary">
    <h2 class="h3">
      Testimonials
    </h2>
  </div>

  <div class="d-flex">
    <div class="d-flex flex-column justify-content-center">
      <i class="fas fa-arrow-left border p-3 rounded-circle bg-white shadow mr-5"
          onclick="$('#carouselExampleSlidesOnly').carousel('next')"
          role="button"></i>
    </div>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner border-0">
        <div class="carousel-item active">
          @include ('partials.ecs.client-testimonials')
        </div>
        <div class="carousel-item" style="">
          @include ('partials.ecs.client-testimonials')
        </div>
        <div class="carousel-item" style="">
          @include ('partials.ecs.client-testimonials')
        </div>
      </div>
    
      @if (false)
      <a class="carousel-control-prev" href="#carouselExampleControls"
          onclick="$('#carouselExampleSlidesOnly').carousel('next')"
          role="button" data-slide="prev">
        <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls"
          onclick="$('#carouselExampleSlidesOnly').carousel('prev')"
          role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      @endif
    </div>

    <div class="d-flex flex-column justify-content-center">
      <i class="fas fa-arrow-right border p-3 rounded-circle bg-white shadow ml-5"
          onclick="$('#carouselExampleSlidesOnly').carousel('prev')"
          role="button"></i>
    </div>
  </div>



</div>
