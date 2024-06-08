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
  <div class="p-3 bg-danger-rm d-flex flex-column justify-content-center bg-primary-rm">
    <div class="mb-4-rm border-rm pt-3 py-1 shadow-rm bg-dark-rm text-white-rm o-overlay-rm">
      <h1 class="h4 font-weight-bold text-white-rm" style="{{--font-family: Mono;--}}">
        {{ $webpage->name }}
      </h1>
    </div>
  </div>

  {{-- Published info --}}
  <div class="px-3 text-secondary">
    Published on:
    @if (false)
      {{ $webpage->created_at->toDateString() }}
    @else
      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($webpage->created_at->toDateString(), 'english')  }}
      2081
    @endif

  </div>

  <div class="container bg-danger-rm">
    <div class="d-flex">

      {{-- View count --}}
      <div class="mr-4">
        <strong>
          Views
        </strong>
        <div class="mt-3-rm">
          {{ $webpage->website_views }}
        </div>
      </div>

      {{-- Share buttons --}}
      <div class="m-rm-4">
        <strong>
          Share
        </strong>
        <div class="mt-3-rm">

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
  <div class="container-fluid mb-0 p-0"
      style= "
      {{--
      background-image: @if (\App\CmsTheme::first())
        url({{ asset('storage/' . \App\CmsTheme::first()->hero_image_path) }})
      @else
        url({{ asset('img/school-5.jpg') }})
      @endif
      ;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      height: 500px;
      --}}
      background-color: {{ \App\CmsTheme::first()->nav_menu_bg_color }};
      color: {{ \App\CmsTheme::first()->nav_menu_text_color }};
  ;">
    <div class="o-overlay text-white-rm h-100" style="
      padding-top: 50px;
      padding-bottom: 50px;
    ">
      <div class="container pb-3 pt-4 @if ($webpage->is_post == 'yes') border-left-rm border-right-rm @else @endif bg-primary-rm">
      <h1 class="h3 font-weight-bold"
          style="
            @if (false && $webpage->is_post == 'yes')
              color: #000;
            @else
              @if (true || ! $webpage->hasCategory('notice'))
                color:
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_text_color }}
                      @else
                        white
                      @endif
              @endif
            @endif
          ;">
        {{ $webpage->name }}
      </h1>
      </div>
    </div>
  </div>
@endif
