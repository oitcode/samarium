<div>


    @if (true && count($webpages) > 0)
      <div class="row" style="margin: auto;">
          @foreach ($webpages as $webpage)
            <div class="col-md-6 px-0 px-md-0 pb-3 pb-md-0 mb-0 pt-0">

              <div class="bg-white border p-3 h-100">
                <div class="d-flex">
                  <div class="mr-3">
            @if ($webpage->featured_image_path != null)
            <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
                class="img-fluid"
                alt="{{ $webpage->name }} logo"
                style="max-width: 100px !important;">
            @endif
                  </div>
                  <div>
                    <div class="mb-2">
                      <span class="p-0 px-1" style="color: {{ \App\CmsTheme::first()->ascent_bg_color }};">
                        {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
                        2081
                      </span>
                    </div>
                    <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="text-reset text-decoration-none">
                    <h2 class="h5 font-weight-bold mb-1">
                      {{ $webpage->name }}
                    </h2>
                    </a>


                    @if ($ctaButton == 'yes')
                      <div class="d-flex">
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
      </div>
    @else
      <div class="p-3 text-muted">
        <div class="h5 font-weight-bold" style="color: orange;">
          <i class="fas fa-exclamation-circle mr-1"></i>
          No posts.
        </div>
      </div>
    @endif


</div>
