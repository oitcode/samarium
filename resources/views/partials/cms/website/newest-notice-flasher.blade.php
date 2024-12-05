{{-- Notifications/post displayer  --}}
@if (\App\WebpageCategory::where('name', 'notice')->first())
  @if (count(\App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->get()) > 0)
  <a href="{{ route('website-webpage-' . \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->permalink) }}"
      class="text-reset text-decoration-none" style="">
    <div class="container-fluid bg-dark-rm text-danger p-0" style="background-color: #fdd;">
      <div class="container" style="white-space: nowrap; overflow: hidden;">
        <div class="o-ltr py-3 ">
          <div class="d-inline mr-5">
              <span class="badge badge-pill badge-light">
                Notice
              </span>
              {{ \App\WebpageCategory::where('name', 'notice')->first()->webpages()->where('is_post', 'yes')->where('visibility', 'public')->orderBy('webpage_id', 'desc')->first()->name }}
          </div>
        </div>
      </div>
    </div>
  </a>
  @endif
@endif
