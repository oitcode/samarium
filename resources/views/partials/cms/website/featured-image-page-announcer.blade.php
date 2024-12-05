{{--
|
| Page announcer when there is a featured image.
|
| This is the page announcer blade file for the cases where a webpage
| has a featured image.
|
--}}


{{--
|
| Bigger screens
|
--}}
<div class="container">
<div class="d-none d-md-block">
  <div class=""
      style=" {{-- background-image: linear-gradient(
          to right, white 0%, white 25%,
          {{ \App\CmsTheme::first()->ascent_bg_color }} 25%, {{ \App\CmsTheme::first()->ascent_bg_color }} 100%
          --}}
      );">
    <div class="row">
      <div class="col-md-6 bg-danger-rm d-flex flex-column justify-content-center text-white-rm">
        <div class="mb-4-rm border-rm p-3 py-1 shadow-rm bg-dark-rm text-white-rm o-overlay-rm">
          <h1 class="h2 font-weight-bold text-center-rm text-white-rm" style="{{--font-family: Mono;--}}">
            {{ strtoupper($webpage->name) }}
          </h1>
        </div>
  
        @if ($webpage->is_post == 'yes')
        {{-- Published info --}}
        <div class="px-3 text-secondary-rm">
          Published on:
          @if (config('app.date_type') == 'standard')
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
  
                <a href="http://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank" class="text-decoration-none text-reset">
                  <i class="fab fa-facebook fa-2x mr-4"></i>
                </a>
  
                <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" data-action="share/whatsapp/share" class="text-decoration-none text-reset">
                  <i class="fab fa-whatsapp fa-2x mr-4"></i>
                </a>
  
                <a href="viber://forward?text={{ url()->current() }}" class="text-decoration-none text-reset">
                  <i class="fab fa-viber fa-2x mr-4" style="{{-- color: purple; --}}"></i>
                </a>
  
              </div>
            </div>
  
          </div>
        </div>
        @endif
  
      </div>
      <div class="col-md-6 py-4 justify-content-end">
        <div class="" style="
          {{--
          background-image: url({{ asset('storage/' . $webpage->featured_image_path) }});
          background-size: 100% 100%;
          background-size: 100% 100%;
          background-repeat: no-repeat;
          background-position: top left;
          height: 500px;
          --}}
          {{--
          background-attachment: fixed;
          background-color: green;
          --}}
        ">
        </div>
        @if (true)
        <img class="img-fluid h-25-rm w-100-rm mx-auto-rm d-block-rm" src="{{ asset('storage/' . $webpage->featured_image_path) }}" alt="{{ $webpage->name }}"
        style="{{--max-height: 200px;width: 1200px;--}}">
        @endif
      </div>
    </div>
  </div>
</div>
</div>

{{--
|
| Smaller screens
|
--}}
<div class="d-md-none">
  <div class="" style="">
    <div class="row">
      <div class="col-md-6 bg-danger-rm d-flex flex-column justify-content-center">
        <div class="mb-4-rm border-rm p-3 py-1 shadow-rm bg-dark-rm text-white-rm o-overlay-rm">
          <h1 class="h2 font-weight-bold text-center-rm text-white-rm" style="{{--font-family: Mono;--}}">
            {{ strtoupper($webpage->name) }}
          </h1>
        </div>
  
        @if ($webpage->is_post == 'yes')
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
        @endif
  
      </div>
      <div class="col-md-6 py-4 justify-content-end">
        <div class="" style="
          {{--
          background-image: url({{ asset('storage/' . $webpage->featured_image_path) }});
          background-size: 100% 100%;
          background-size: 100% 100%;
          background-repeat: no-repeat;
          background-position: top left;
          height: 500px;
          --}}
          {{--
          background-attachment: fixed;
          background-color: green;
          --}}
        ">
        </div>
        @if (true)
        <img class="img-fluid" src="{{ asset('storage/' . $webpage->featured_image_path) }}" alt="{{ $webpage->name }}"
        style="{{--max-height: 200px;width: 1200px;--}}">
        @endif
      </div>
    </div>
  </div>
</div>

