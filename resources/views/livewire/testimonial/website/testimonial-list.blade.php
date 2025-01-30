<div>

  @if ($testimonials != null && count($testimonials) > 0)
    <div class="row">
      @foreach ($testimonials as $testimonial)
        <div class="col-md-4 p-3 my-3 mb-4">
          <div class="h-100 p-0 shadow bg-white" style="background-color: #cdd;">
            <div class="p-3">
              <i class="fas fa-quote-left fa-2x"></i>
              <br/>
              <br/>
              {{ $testimonial->body }}
              <br />
              <br />
            </div>
            <div class="d-flex bg-danger text-white py-3">
              <div class="px-4">
                <i class="fas fa-user-circle fa-3x"></i>
              </div>
              <div>
                <span class="font-weight-bold">
                  {{ $testimonial->writer_name }}
                </span>
                <br />
                <span>
                  {{ $testimonial->writer_info }}
                </span>
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
