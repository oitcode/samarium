<div>

  <h2 class="h1 o-heading my-4 text-center text-white">
    What others say
  </h2>
  <div class="h5 text-white text-center">
    Hear from those with whom we have worked. 
  </div>

  @if ($testimonials != null && count($testimonials) > 0)
    <div class="row mt-5">
      @foreach ($testimonials as $testimonial)
        <div class="col-md-4 p-3 my-3 mb-4">
          <div class="h-100 p-0 shadow bg-white-rm d-flex flex-column justify-content-start o-border-radius p-3 o-float-up" style="background-color: #234;">
            <div class="px-3 mb-3" style="color: #aaa;">
              <i class="fas fa-quote-left"></i>
              <i>
              {{ $testimonial->body }}
              </i>
            </div>
            <div class="d-flex bg-danger-rm text-white-rm py-3">
              <div class="px-4">
                <i class="fas fa-user-circle fa-2x text-primary"></i>
              </div>
              <div>
                <div class="o-heading text-white mb-1">
                  {{ $testimonial->writer_name }}
                </div>
                <div style="color: #aaa;">
                  <small>
                  {{ $testimonial->writer_info }}
                  </small>
                </div>
                <br />
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No testimonials
    </div>
  @endif

</div>
