<div>
  <div class="row">
  
    <div class="col-md-4" style="font-size: 1.5rem;">
      <div class="mb-2">
        <i class="fas fa-map-marker-alt mr-3"></i>
        {{ $company->name }}
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <i class="fas fa-phone mr-3"></i>
        {{ $company->phone }}
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <i class="fas fa-envelope mr-3"></i>
        {{ $company->email }}
      </div>
      <div class="mb-1" style="font-size: 1rem;">
        <i class="fas fa-map-marker-alt mr-3"></i>
        {{ $company->address }}
      </div>
    </div>
  
    <div class="col-md-4" style="font-size: 1.3rem;">
      <div class="mb-2">
        @if (false)
        <i class="fas fa-star mr-3"></i>
        @endif
        Social media
      </div>
      <div>
        @if ($company->fb_link)
          <a href="{{ $company->fb_link }}" target="_blank">
            <div class="float-left text-primary" style="">
              <i class="fab fa-facebook mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if ($company->twitter_link)
          <a href="{{ $company->twitter_link }}" target="_blank">
            <div class="float-left text-info" style="">
              <i class="fab fa-twitter mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if ($company->insta_link)
          <a href="{{ $company->insta_link }}" target="_blank">
            <div class="float-left text-danger" style="">
              <i class="fab fa-instagram mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if ($company->youtube_link)
          <a href="{{ $company->youtube_link }}" target="_blank">
            <div class="float-left text-danger" style="">
              <i class="fab fa-youtube mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        @if ($company->tiktok_link)
          <a href="{{ $company->tiktok_link }}" target="_blank">
            <div class="float-left text-danger" style="">
              <i class="fab fa-tiktok mr-3 fa-2x"></i>
            </div>
          </a>
        @endif
        <div class="clearfix">
        </div>
      </div>
    </div>

    @if (true)
    <div class="col-md-4" style="font-size: 1rem;">
      @if (false)
      <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
      @else
        <div class="text-secondary">
          {{ $company->tagline }}
        </div>
      @endif
    </div>
    @endif
  </div>
  <div class="text-center-rm mt-4">
    &copy; 2022 | Website developed by OIT
  </div>
</div>
