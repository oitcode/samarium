<div>


  @if ($testimonials != null && count($testimonials) > 0)
    @if (true)
    <div class="row">
      @foreach ($testimonials as $testimonial)
        <div class="col-md-4 p-3 border-rm my-3 mb-4 bg-white-rm shadow-sm-rm">
          <div class="h-100 p-0 shadow bg-white" style="{{-- border-top: 2px solid red !important; --}} background-color: #cdd;">

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
              <div class="">
                <span class="font-weight-bold">
                  {{ $testimonial->writer_name }}
                </span>
                <br />
                <span class="text-muted-rm">
                  {{ $testimonial->writer_info }}
                </span>
                <br />
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    @endif

  @else
    <div class="p-2 text-secondary">
      <i class="fas fa-exclamation-circle mr-2"></i>
      No testimonials
    </div>
  @endif


</div>
