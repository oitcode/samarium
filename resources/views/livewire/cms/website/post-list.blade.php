<div>
  <div class="row-rm">
  @foreach ($posts as $post)
    <div class="col-md-6-rm my-4-rm border shadow-sm mb-4">
      @if (false)
      <div class="p-3">
        27 votes
        <br />
        12 answers
        <br />
        128 views
      </div>
      <div class=""
          style="background-color: @if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_bg_color }} @else @endif ;" >
      &nbsp;
      </div>
      <div class="">
        @if ($post->featured_image_path)
          <div>
            <img src="{{ asset('storage/' . $post->featured_image_path) }}"
                class="img-fluid rounded-circle-rm"
                style="{{--width: 300px; height: 300px;--}}"
            >
          </div>
        @else
        @endif
      </div>
      @endif
      <div class="flex-grow-1 d-flex justify-content-between p-3 bg-white text-dark">
        <div class="text-dark">
          <a href="{{ route('website-webpage-' . $post->permalink) }}" class="text-reset">
            <h2 class="h4 font-weight-bold">
              {{ $post->name }}
            </h2>
          </a>
          <div class="d-flex flex-column">
            <div class="mr-5">
              <i class="far fa-calendar mr-1"></i>
              @if (false)
              Posted on:
              @endif
              {{ $post->created_at->toDateString() }}
              @if (true)
              <span class="text-muted">
                {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'english')  }}
              </span>
              @endif
            </div>
            <div class="mt-1">
              @foreach ($post->webpageCategories as $category)
                <span class="badge badge-light badge-pill mr-3 p-1 px-2">
                  {{ $category->name }}
                </span>
              @endforeach
            </div>
          </div>
        </div>

      </div>
    </div>
  @endforeach
  </div>
</div>
