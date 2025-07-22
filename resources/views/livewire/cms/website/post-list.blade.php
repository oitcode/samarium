<div>

  @if (count($posts) > 0)
    @foreach ($posts as $post)
      <div class="border mb-2 o-border-radius">
        <div class="flex-grow-1 d-flex justify-content-between p-3 bg-white text-dark">
          <div class="text-dark">
            <a href="{{ route('website-webpage-' . $post->permalink) }}" class="text-reset">
              <h2 class="h5 font-weight-bold">
                {{ $post->name }}
              </h2>
            </a>
            <div class="d-flex flex-column">
              <div class="mr-5 text-muted">
                <span style="@if ($cmsTheme) color: {{ $cmsTheme->ascent_bg_color }}; @endif">
                  {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'english')  }}
                  2082
                </span>
                <br />
              </div>
              <div class="mt-2 text-muted">
                Categories:
                @foreach ($post->webpageCategories as $category)
                  <span class="badge badge-light mr-1">
                    {{ ucfirst($category->name) }}
                  </span>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  @else
    <div class="container p-3 text-muted">
      No posts to show.
    </div>
  @endif

</div>
