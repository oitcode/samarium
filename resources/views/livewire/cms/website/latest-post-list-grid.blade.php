<div class="mb-4 border o-border-radius bg-white h-100">

    <h2 class="h4 o-heading py-4 px-4 mb-0">
      <i class="fas fa-edit mr-2"></i>
      Latest posts
    </h2>

    @if (false)
    <hr class="mb-4" width="10%" style="border: 3px solid black; margin: 0 0;"/>
    @endif

    @if (false && count($webpages) > 0)
      <div class="row px-3 pl-4 pt-2" style="margin: auto;">
          @foreach ($webpages as $webpage)
            <div class="col-md-6 p3 mb-0 pl-0 pb-4">
              <div class="h-100 border p-3 px-2 o-border-radius" style="background-color: #fafaff;">
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
                      <h2 class="h5 o-heading mb-3">
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
      <div class="mt-3 mb-5 text-center">
        <button class="btn btn-outline-primary px-4 py-3 o-border-radius-sm">
          View all posts
          <i class="fas fa-arrow-right ml-2"></i>
        </button>
      </div>
    @else
    <div class="p-3 py-5">
      <div class="text-center mb-4">
        <i class="fas fa-exclamation-circle fa-2x"></i>
      </div>
      <div class="h6 o-heading text-center">
        No posts
      </div>
      <div class="text-center text-muted">
        There are currently no posts.
      </div>
    </div>
    @endif

</div>
