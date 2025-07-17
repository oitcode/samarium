<div class="mb-4">

    <h2 class="h5 o-heading py-3 mb-0">
      Latest posts
    </h2>

    @if (false)
    <hr class="mb-4" width="10%" style="border: 3px solid black; margin: 0 0;"/>
    @endif

    @if (count($webpages) > 0)
      <div class="row p-2-rm" style="margin: auto;">
          @foreach ($webpages as $webpage)
            <div class="col-md-6 p3 mb-0 pl-0 pb-3">
              <div class="h-100 border p-3 bg-white shadow o-border-radius">
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
                    <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="text-reset text-decoration-none">
                      <h2 class="h5 font-weight-bold mb-3">
                        {{ $webpage->name }}
                      </h2>
                    </a>
                    <div class="mb-2">
                      <i class="fas fa-calendar mr-1 text-primary"></i>
                      <span class="p-0 px-1" style="@if ($cmsTheme) color: {{ $cmsTheme->ascent_bg_color }} @else color: #888; @endif">
                        {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
                        2081
                      </span>
                    </div>

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
      <div class="text-muted py-2">
        <div class="h6">
          <i class="fas fa-exclamation-circle mr-1"></i>
          No posts.
        </div>
      </div>
    @endif

</div>
