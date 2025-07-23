<div>

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
            <div class="col-md-4 text-right py-3-rm">
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

</div>
