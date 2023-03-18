<div>
  @foreach ($posts as $post)
    <div class="d-flex my-4 border shadow">
      <div class="bg-danger">
      &nbsp; &nbsp;
      </div>
      <div class="flex-grow-1 d-flex justify-content-between p-3 bg-light text-dark">
        <div class="text-dark">
          <a href="{{ route('website-webpage-' . $post->permalink) }}" class="text-reset">
            <h2>
              {{ $post->name }}
            </h2>
          </a>
          <div class="d-flex flex-column">
            <div class="mr-5">
              <i class="far fa-clock mr-2"></i>
              {{ $post->created_at->toDateString() }}
              |
              {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'nepali')  }}
            </div>
            <div>
              @foreach ($post->webpageCategories as $category)
                <span class="badge badge-danger mr-3">
                  {{ $category->name }}
                </span>
              @endforeach
            </div>
          </div>
        </div>

        <div>
          @if ($post->featured_image_path)
            <div>
              <img src="{{ asset('storage/' . $post->featured_image_path) }}"
                  class="img-fluid rounded-circle-rm"
                  style="width: 100px; height: 100px;"
              >
            </div>
          @else
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
