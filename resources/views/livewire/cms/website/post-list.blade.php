<div>

  @if (false)
    @if (count($posts) > 0)
      @foreach ($posts as $post)
        <div class="bg-white border mb-2 o-border-radius py-3 my-4 px-3">
          <div class="text-dark">
            <div class="row" style="margin: auto;">
              <div class="col-md-8 p-0">
                <a href="{{ route('website-webpage-' . $post->permalink) }}" class="text-reset">
                  <h2 class="h5 o-heading">
                    {{ $post->name }}
                  </h2>
                </a>
              </div>
              <div class="col-md-4 text-left text-md-right py-3-rm p-0 pt-3 pt-md-0">
                <span class="bg-light text-dark py-1 px-3 badge-pill" style="border: 2px solid #aaa;">
                  {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'english')  }}
                  2082
                </span>
              </div>
            </div>
            <div class="mt-4 text-muted">
              Category: &nbsp;&nbsp;
              @foreach ($post->webpageCategories as $category)
                <span class="badge badge-pill badge-light mr-1 p-2" style="border: 2px solid #aaa;">
                  {{ ucfirst($category->name) }}
                </span>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    @else
      <div class="container p-3 text-muted">
        No posts to show.
      </div>
    @endif
  @endif

  <div>
    <!-- Blog Section -->
    <section class="pb-5 px-0">
        <div class="container p-0 m-0">
            @if (count($posts) > 0)
              <!-- Blog Posts -->
              <div class="row">
                  @foreach ($posts as $post)
                  <div class="col-lg-4 col-md-6 mb-5">
                    <div class="d-flex flex-column h-100">
                      @if ($post->hasCategory('notice'))
                        <div class="text-left bg-danger text-white py-4 px-3">
                            NOTICE
                        </div>
                      @endif
                      <div class="flex-grow-1 card h-100-rm border-0 shadow-sm blog-card">
                          <div class="blog-post-image @if (! $post->featured_image_path) table-warning text-dark @endif">
                            @if ($post->featured_image_path)
                              <img src="{{ asset('storage/' . $post->featured_image_path) }}"
                                  class="img-fluid blog-image"
                                  alt="{{ $post->name }} logo"
                                  style="">
                            @else
                              @if ($post->hasCategory('notice'))
                                <i class="fas fa-exclamation-circle fa-2x"></i>
                              @else
                                <i class="fas fa-file fa-2x"></i>
                              @endif
                            @endif
                          </div>
                          <div class="card-body">
                              <div class="d-flex align-items-center mb-3">
                                    <span class="badge blog-category px-3 py-1 rounded-pill mr-3">
                                      @if (count($post->webpageCategories)) 
                                        @foreach ($post->webpageCategories as $webpageCategory) 
                                            {{ $webpageCategory->name }}
                                            @break
                                        @endforeach
                                      @else
                                        General
                                      @endif
                                    </span>
                                  <small class="text-muted">
                                      <i class="fas fa-calendar-alt mr-1"></i>
                                      {{ $post->created_at->toDateString() }}
                                  </small>
                              </div>
                              <h5 class="card-title font-weight-bold">{{ $post->name }}</h5>
                              @if (false)
                              <p class="card-text text-muted">
                                {{ $post->name }}
                              </p>
                              @endif
                          </div>
                          <div class="card-footer bg-white border-top">
                              <div class="d-flex justify-content-between align-items-center">
                                  <small class="text-muted">
                                      <i class="fas fa-user-circle mr-1"></i>
                                      By {{ $post->creator->name }}
                                  </small>
                                  <a href="{{ route('website-webpage-' . $post->permalink) }}" class="btn btn-outline-primary btn-sm">
                                      Read More <i class="fas fa-arrow-right ml-1"></i>
                                  </a>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
              </div>
            @else
              <div class="bg-white border o-border-radius p-3 h5 o-heading">
                <i class="fas fa-exclamation-circle text-danger mr-1"></i>
                No post
              </div>
            @endif
        </div>
    </section>
  </div>

</div>
