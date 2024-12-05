<div>

  <div class="row">
  @foreach ($relatedPosts as $post)
    <div class="col-md-4 p-3">
      <a href="{{ $post->permalink }}" class="text-decoration-none text-reset">
        <div class="p-2 border h-100 bg-white shadow-sm">
          <div class="d-flex">
            <div class="mr-3">
              <i class="fas fa-circle fa-2x" style="@if (\App\CmsTheme::first()) color: {{ \App\CmsTheme::first()->ascent_bg_color }} @endif ;"></i>
            </div>
            <div>
                <h2 class="h5 font-weight-bold">
                  {{ $post->name }}
                </h2>
                <div class="text-secondary">
                  {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($post->created_at->toDateString(), 'english')  }}
                  <br/>
                  {{ $post->created_at->toDateString() }}
                </div>
            </div>
          </div>


        </div>
      </a>
    </div>
  @endforeach
  </div>


</div>
