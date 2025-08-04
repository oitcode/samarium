@if (false)
<div class="mb-4 border o-border-radius bg-white h-100">

    <h2 class="h4 o-heading py-4 px-4 mb-0">
      <i class="fas fa-edit mr-2"></i>
      Latest posts
    </h2>

    @if (false)
    <hr class="mb-4" width="10%" style="border: 3px solid black; margin: 0 0;"/>
    @endif

    @if (true && count($webpages) > 0)
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
@endif

<div>
  <!-- Blog Section -->
  <section class="py-5 bg-light">
      <div class="container">
          <!-- Blog Header -->
          <div class="row">
              <div class="col-12 text-center mb-5">
                  <h2 class="display-4 font-weight-bold text-dark">Latest <span class="text-primary">Blog Posts</span></h2>
                  <p class="lead text-muted mx-auto" style="max-width: 600px;">
                      Stay updated with our latest activities and events.
                  </p>
              </div>
          </div>
          
          @if (true && count($webpages) > 0)
            <!-- Blog Posts -->
            <div class="row">
                @foreach ($webpages as $webpage)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 border-0 shadow-sm blog-card">
                        <div class="blog-post-image @if (! $webpage->featured_image_path) bg-primary @endif">
                          @if ($webpage->featured_image_path)
                            <img src="{{ asset('storage/' . $webpage->featured_image_path) }}"
                                class="img-fluid blog-image"
                                alt="{{ $webpage->name }} logo"
                                style="">
                          @else
                            <i class="fas fa-line-chart fa-2x"></i>
                          @endif
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                  <span class="badge blog-category px-3 py-1 rounded-pill mr-3">
                                    @if (count($webpage->webpageCategories)) 
                                      @foreach ($webpage->webpageCategories as $webpageCategory) 
                                          {{ $webpageCategory->name }}
                                          @break
                                      @endforeach
                                    @else
                                      General
                                    @endif
                                  </span>
                                <small class="text-muted">
                                    <i class="fas fa-calendar-alt mr-1"></i>
                                    {{ $webpage->created_at->toDateString() }}
                                </small>
                            </div>
                            <h5 class="card-title font-weight-bold">{{ $webpage->name }}</h5>
                            @if (false)
                            <p class="card-text text-muted">
                              {{ $webpage->name }}
                            </p>
                            @endif
                        </div>
                        <div class="card-footer bg-white border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-user-circle mr-1"></i>
                                    By {{ $webpage->creator->name }}
                                </small>
                                <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="btn btn-outline-primary btn-sm">
                                    Read More <i class="fas fa-arrow-right ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
          @endif
  
          <!-- View All Posts Button -->
          <div class="row">
              <div class="col-12 text-center mt-4">
                  <a href="/post" class="btn btn-primary btn-lg px-5">
                      <i class="fas fa-eye mr-2"></i>
                      View All Blog Posts
                  </a>
              </div>
          </div>
      </div>
  </section>

</div>
