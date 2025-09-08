{{--
|
| Page announcer when there is a no image.
|
| This is the page announcer blade file for the cases where a webpage
| does not have a featured image.
|
--}}

@if ($webpage->is_post == 'yes')
  <div class="container">
  <div class="p-3 d-flex flex-column justify-content-center">
    <div class="pt-3 py-1">
      <h1 class="h4 font-weight-bold">
        {{ $webpage->name }}
      </h1>
    </div>
  </div>

  {{-- Published info --}}
  <div class="px-3 text-secondary">
    Published on:
    @if (config('app.date_type') == 'standard')
      {{ $webpage->created_at->toDateString() }}
    @else
      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
      2081
    @endif
  </div>

  <div class="container">
    <div class="d-flex">
      {{-- View count --}}
      <div class="mr-4">
        <strong>
          Views
        </strong>
        <div>
          {{ $webpage->website_views }}
        </div>
      </div>

      {{-- Share buttons --}}
      <div>
        <strong>
          Share
        </strong>
        <div>
          <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank" class="text-decoration-none text-primary">
            <i class="fab fa-facebook fa-2x mr-4"></i>
          </a>
          <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" data-action="share/whatsapp/share">
            <i class="fab fa-whatsapp fa-2x mr-4 text-success"></i>
          </a>
          <a href="viber://forward?text={{ url()->current() }}">
            <i class="fab fa-viber fa-2x mr-4" style="color: purple;"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  </div>
@else
  <div class="container-fluid mb-0 p-0 o-fade-in-rm"
      style= "
      @if (false && \App\Models\Cms\CmsTheme\CmsTheme::first())
        background-color: {{ \App\Models\Cms\CmsTheme\CmsTheme::first()->ascent_bg_color }};
        color: {{ \App\Models\Cms\CmsTheme\CmsTheme::first()->ascent_text_color }};
      @endif
      background-image: url('storage/{{ \App\Models\Cms\CmsTheme\CmsTheme::first()->hero_image_path }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
  ;">
    <div class="h-100" class="o-darker-rm" style="
      background: rgba(0, 0, 0, 0.5);
      padding-top: 50px;
      padding-bottom: 50px;
    ">
      <div class="container pb-3 pt-4 @if ($webpage->is_post == 'yes') @else @endif">
      <h1 class="h1 o-heading"
          style="
            color:
                  @if (\App\Models\Cms\CmsTheme\CmsTheme::first())
                    {{ \App\Models\Cms\CmsTheme\CmsTheme::first()->ascent_text_color }}
                  @else
                    black
                  @endif
          ;">
        {{ $webpage->name }}
      </h1>
      </div>
    </div>
  </div>
@endif
