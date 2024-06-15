{{--
|
| CMS footer blade file.
|
| Footer of CMS website. It is a simple footer. If you want to change
| the footer, then you need to edit this file. 
|
--}}

<div class="border-top"
     style="
      background-color:
          @if (\App\CmsTheme::first())
            {{ \App\CmsTheme::first()->footer_bg_color }}
          @else
            orange
          @endif
          ;
      color:
          @if (\App\CmsTheme::first())
            {{ \App\CmsTheme::first()->footer_text_color }}
          @else
            white
          @endif
      ;
">

  {{--
  |
  | First row
  |
  --}}
  <div class="container-fluid bg-primary-rm text-white-rm p-0" style="">

    <div class="p-3" style="background-color: rgba(0, 0, 0, 0.1);">
      <div class="container">
        <div class="row">

          <div class="col-md-3 mb-3">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid"
                alt="{{ $company->name }} logo"
                style="{{-- height: 150px !important; max-width: 200px !important; --}}">
          </div>

          <div class="col-md-3 mb-3">
            <div class="h5 font-weight-bold">
              ADDRESS
            </div>
            {{ $company->address }}
          </div>

          <div class="col-md-3 mb-3">
            <div class="h5 font-weight-bold">
              PHONE
            </div>
            {{ $company->phone }}
          </div>

          <div class="col-md-3 mb-3">
            <div class="h5 font-weight-bold">
              EMAIL
            </div>
            {{ $company->email }}
          </div>

        </div>
      </div>
    </div>

  </div>


  {{--
  |
  | Second row
  |
  --}}
  <div class="container-fluid border-rm pt-4 pb-3" style="">

    <div class="container">
      <div class="row">

        {{-- Company brief description --}}
        <div class="col-md-3 mb-4">
          <h2 class="h5 text-dark-rm font-weight-bold mb-3">
            About us
          </h2>
          <div class="mb-2">
            {{ $company->brief_description }}
          </div>
        </div>

        {{-- Quick links --}}
        <div class="col-md-3 mb-4">
          <div class="h5 mb-3 font-weight-bold">
            Quick links
          </div>
          <div class="">
            <div class="my-2">
              <a href="/contact-us" class="text-reset text-decoration-none text-underline">
                Contact us
              </a>
            </div>
            <div class="">
              <a href="/post" class="text-reset text-decoration-none text-underline">
                Posts
              </a>
            </div>
          </div>
        </div>


        {{-- Social media --}}
        <div class="col-md-3 mb-5">
          <div class="h5 font-weight-bold mb-3">
            Follow us
          </div>
          <div>
            @if ($company->fb_link)
              <a href="{{ $company->fb_link }}" target="_blank">
                <i class="fab fa-facebook fa-2x mr-2 "
                    style="
                      color:
                          @if (\App\CmsTheme::first())
                            {{ \App\CmsTheme::first()->footer_text_color }}
                          @else
                            white
                          @endif
                          ;
                    "></i>
              </a>
            @endif
            @if ($company->twitter_link)
              <a href="{{ $company->twitter_link }}" class="text-reset" target="_blank">
                <i class="fab fa-twitter fa-2x mr-2 "></i>
              </a>
            @endif
            @if ($company->insta_link)
              <a href="{{ $company->insta_link }}" class="text-reset" target="_blank">
                <i class="fab fa-instagram fa-2x mr-2 "></i>
              </a>
            @endif
            @if ($company->youtube_link)
              <a href="{{ $company->youtube_link }}" class="text-reset" target="_blank">
                <i class="fab fa-youtube fa-2x mr-2 "></i>
              </a>
            @endif
            @if ($company->tiktok_link)
              <a href="{{ $company->tiktok_link }}" class="text-reset" target="_blank">
                <i class="fab fa-tiktok fa-2x mr-2 "></i>
              </a>
            @endif
          </div>
        </div>

        {{-- Subscribe us --}}
        <div class="col-md-3">
          @livewire ('ecomm-website.subscribe-us', ['introMessage' => 'Please enter your email address to get latest updates on our activities.',])
        </div>

      </div>
    </div>
  </div>


  {{--
  | 
  | Third row
  |
  | Package developer branding.
  | 
  --}}
  <hr />
  <div class="text-center pb-2 px-3">
    <div>
      &copy; 2024 | {{ $company->name }} | All rights reserved
    </div>
    <div>
      Powered by
      <a href="https://oit.com.np" class="text-reset" target="_blank"><u>OIT</u></a>
      <i class="fas fa-check-circle ml-2"></i>
    </div>
  </div>


</div>
