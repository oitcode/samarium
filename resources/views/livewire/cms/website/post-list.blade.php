<div>
  <div class="row-rm">
  @foreach ($posts as $post)
    <div class="col-md-6-rm my-4-rm border rounded shadow-sm-rm mb-2">
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
            <h2 class="h5 font-weight-bold">
              {{ $post->name }}
            </h2>
          </a>
          <div class="d-flex flex-column">
            <div class="mr-5 text-muted">
              @if (true)
              <span class="text-muted">
                {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'english')  }}
              </span>
              2081
              @endif
              <br />
              @if (false)
              <i class="far fa-calendar mr-1-rm"></i>
              Posted on:
              {{ $post->created_at->format('M d Y') }}
              @endif
            </div>
            <div class="mt-2 text-muted">
              Categories:
              @foreach ($post->webpageCategories as $category)
                <span class="badge badge-light badge-pill-rm mr-1 p-1-rm px-2-rm">
                  {{ ucfirst($category->name) }}
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
