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
                  <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="text-reset text-decoration-none">
                  <h2 class="h4 font-weight-bold mb-1">
                    @if (false)
                    {{ \Illuminate\Support\Str::limit($webpage->name, 25, $end=' ...') }}
                    @endif
                    {{ $webpage->name }}
                  </h2>
                  </a>

                  <div class="text-secondary">
                    Published on:
                    {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
                    2081
                  </div>

                  <div class="d-flex justify-content-end-rm">
                    <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="btn btn-danger">
                      Read more 
                    </a>
                  </div>
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
