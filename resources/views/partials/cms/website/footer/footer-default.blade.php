{{--
*
* CMS footer blade file.
*
* Footer of CMS website. It is a simple footer. If you want to change
* the footer, then you need to edit this file. 
*
--}}


{{--
|
| Row which shows associated with info.
|
| If there is `associated with` info for the company, then this row
| will show all those association info.
|
--}}
@if ($company->companyInfos()->where('info_key', 'Associated with')->first())
  <div class="container-fluid my-5 border-top">
    <div class="container">
      <h2 class="h6 font-weight-bold my-4 text-center">
        {{ $company->companyInfos()->where('info_key', 'Associated with')->first()->info_key }}
      </h2>
      <div class="row" style="margin: auto;">
        @foreach ($company->companyInfos()->where('info_key', 'Associated with')->get() as $companyInfo)
          <div class="col-6 col-md-3 font-weight-bold p-3 mb-0" style="font-family: Mono;">
            <div class="d-flex flex-column justify-content-center h-100">
              <div class="text-center mb-4">
                {{ $companyInfo->info_value }}
              </div>
              @if ($companyInfo->image_path)
                <img src="{{ asset('storage/' . $companyInfo->image_path) }}" class="img-fluid">
              @else
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endif

<div class="border-top o-footer-color">
  {{--
  |
  | Logo and contact details row.
  |
  | This row will have company logo and contact details info.
  |
  --}}
  <div class="container-fluid p-0">
    <div class="py-4 o-dark-shade">
      <div class="container">
        <div class="row">
          <div class="col-md-3 mb-3-rm justify-content-center">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}"
                class="img-fluid"
                style="max-width: 100px;"
                alt="{{ $company->name }} logo">
          </div>
          <div class="col-md-3 pt-3">
              <div class="h5 o-heading o-footer-text-color">
                ADDRESS
              </div>
              {{ $company->address }}
          </div>
          <div class="col-md-3 pt-3">
              <div class="h5 o-heading o-footer-text-color">
                PHONE
              </div>
              {{ $company->phone }}
          </div>
          <div class="col-md-3 pt-3">
              <div class="h5 o-heading o-footer-text-color">
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
  | This row has following columns.
  |
  | 1. About us
  | 2. Quick links
  | 3. Follow us (Social media links)
  | 4. Subscribe us
  |
  --}}
  <div class="container-fluid pt-4 pb-3">
    <div class="container pt-1">
      <div class="row">

        {{-- Company brief description --}}
        <div class="col-md-3 mb-4">
          <h2 class="h5 o-heading o-footer-text-color mb-3">
            About us
          </h2>
          <div class="mb-2">
            {{ $company->brief_description }}
          </div>
        </div>

        {{-- Quick links --}}
        <div class="col-md-3 mb-4">
          <h2 class="h5 o-heading o-footer-text-color mb-3">
            Quick links
          </h2>
          <div>
            <div class="my-1">
              <a href="/contact-us" class="text-reset text-decoration-none text-underline">
                Contact us
              </a>
            </div>
            <div class="my-1">
              <a href="/post" class="text-reset text-decoration-none text-underline">
                Posts
              </a>
            </div>
            <div class="my-1">
              <a href="/dashboard" class="text-reset text-decoration-none text-underline">
                Dashboard
              </a>
            </div>
          </div>
        </div>

        {{-- Social media --}}
        <div class="col-md-3 mb-5">
          <h2 class="h5 o-heading o-footer-text-color mb-3">
            Follow us
          </h2>
          <div>
            @if ($company->fb_link)
              <a href="{{ $company->fb_link }}" class="text-reset" target="_blank">
                <i class="fab fa-facebook fa-2x mr-2 "></i>
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
  | Copyright notice and package developer branding.
  | 
  --}}
  <hr />
  <div class="text-center pb-2 px-3">
    <div>
      &copy; {{ date('Y') }} | {{ $company->name }} | All rights reserved
    </div>
    <div>
      Powered by
      <a href="https://github.com/oitcode/samarium" class="text-reset" target="_blank"><u>Samarium</u></a>
      <i class="fas fa-check-circle ml-2"></i>
    </div>
  </div>
</div>
