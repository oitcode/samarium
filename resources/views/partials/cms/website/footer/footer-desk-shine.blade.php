<div class="container-fluid py-4" style="background-color: {{ config('app.website_footer_bg_color') }}; color: white;">
  <div class="container">
    <div class="row" style="margin: auto;">
      <div class="col-md-4 py-4">
        <h2 class="h5 o-heading mb-4" style="color: {{ config('app.website_footer_heading_color') }}">
          Contact Information
        </h2>
        <div>
          <div class="mb-2">
            <i class="fas fa-map-marker-alt mr-1"></i>
            {{ $company->address }}
          </div>
          <div class="mb-2">
            <i class="fas fa-envelope mr-1"></i>
            {{ $company->email }}
          </div>
          <div class="mb-2">
            <i class="fas fa-phone mr-1"></i>
            {{ $company->phone }}
          </div>
        </div>
      </div>
      <div class="col-md-4 py-4">
        <h2 class="h5 o-heading mb-4" style="color: {{ config('app.website_footer_heading_color') }}">
          Quick Links
        </h2>
        <div>
          <div class="mb-2">
            <a href="/contact-us" class="text-reset text-decoration-none text-underline">
              Contact us
            </a>
          </div>
          <div class="mb-2">
            <a href="/post" class="text-reset text-decoration-none text-underline">
              Posts
            </a>
          </div>
          <div class="mb-2">
            <a href="/dashboard" class="text-reset text-decoration-none text-underline">
              Dashboard
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 py-4">
        <h2 class="h5 o-heading mb-4" style="color: {{ config('app.website_footer_heading_color') }}">
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
    </div>
    <div class="row" style="margin: auto;">
      <div class="col-md-8 py-4">
        <h2 class="h5 o-heading mb-4" style="color: {{ config('app.website_footer_heading_color') }}">
          About us
        </h2>
        <div class="mb-2">
          {{ $company->brief_description }}
        </div>
      </div>
      <div class="col-md-4 py-4">
        @livewire ('ecomm-website.subscribe-us', [
            'introMessage' => 'Please enter your email address to get latest updates on our activities.',
            'headingTextColor' => config('app.website_footer_heading_color'),
        ])
      </div>
      <div class="col-md-4 py-4">
      </div>
    </div>
  </div>

  <div class="container pt-4 text-center" style="border-top: 1px solid #345;">
    &copy 2025 | {{ $company->name }} | All rights reserved
  </div>
</div>
