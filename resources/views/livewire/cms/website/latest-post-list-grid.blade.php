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
                                <a href="{{ route('website-webpage-' . $webpage->permalink) }}" class="btn btn-outline-primary btn-sm o-hover-left">
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
