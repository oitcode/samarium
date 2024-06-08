<div>


    <div class="row">
      @if (count($webpages) > 0)
        @foreach ($webpages as $webpage)
          <div class="col-md-6 p-3 mb-0 pt-0">

            <div class="bg-white border p-3 h-100">
              <div class="d-flex">
                <div class="mr-3">
          @if ($webpage->featured_image_path != null)
          <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
              class="img-fluid-rm"
              alt="{{ $webpage->name }} logo"
              style="height: 100px !important; max-width: 100px !important;">
          @endif
                </div>
                <div>
                  <div class="mb-3">
                    @if (false)
                    Published on:
                    @endif
                    <span class="bg-danger-rm text-dark border-rm p-0 px-1">
                      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
                      2081
                    </span>
                  </div>
                  <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="text-reset text-decoration-none">
                  <h2 class="h5 font-weight-bold mb-1">
                    @if (false)
                    {{ \Illuminate\Support\Str::limit($webpage->name, 25, $end=' ...') }}
                    @endif
                    {{ $webpage->name }}
                  </h2>
                  </a>


                  @if ($ctaButton == 'yes')
                    <div class="d-flex justify-content-end-rm">
                      <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="btn btn-danger">
                        Read more 
                      </a>
                    </div>
                  @endif
                </div>
              </div>


            </div>


          </div>
        @endforeach
      @else
        <div class="container p-3 text-muted">
          No posts to show 
        </div>
      @endif
    </div>


</div>
