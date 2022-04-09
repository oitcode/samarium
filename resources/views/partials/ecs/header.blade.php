<div>

  <div class="{{ env('SITE_ECS_THEME_BS_CLASS') }}" style="height:3px;">
  </div>

  <div class="container-fluid border bg-primary-rm text-white-rm d-none d-md-block">
    <div class="container py-1">
      <div class="float-left mr-5 mt-2" style="font-size: 1rem; font-weight: bold;">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center h-100 align-self-center text-center text-secondary">
            <i class="fas fa-phone mr-3"></i>
            {{ $company->phone }}
          </div>
        </div>
      </div>

      @if ($company->insta_link)
        <a href="{{ $company->insta_link }}" target="_blank">
          <div class="float-right mr-3 h-100" style="font-size: 1.3rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1rem; font-weight:bold;">
                  <i class="fab fa-instagram mr-3 fa-2x-rm text-danger" style="font-size: 1.5rem;"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif

      @if ($company->fb_link)
        <a href="{{ $company->fb_link }}" target="_blank">
          <div class="float-right mr-3 h-100" style="font-size: 1.3rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.3rem; font-weight:bold;">
                  <i class="fab fa-facebook text-primary fa-2x-rm" style="font-size: 1.5rem;"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
      @if ($company->twitter_link)
        <a href="{{ $company->twitter_link }}" target="_blank">
          <div class="float-right mr-3 h-100" style="font-size: 1.3rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.3rem; font-weight:bold;">
                  <i class="fab fa-twitter mr-3 fa-2x-rm text-info"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
      @if ($company->youtube_link)
        <a href="{{ $company->youtube_link }}" target="_blank">
          <div class="float-right mr-3 h-100" style="font-size: 1.3rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.3rem; font-weight:bold;">
                  <i class="fab fa-youtube mr-3 fa-2x-rm text-danger"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
      @if ($company->tiktok_link)
        <a href="{{ $company->tiktok_link }}" target="_blank">
          <div class="float-right mr-3 h-100" style="font-size: 1.3rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.3rem; font-weight:bold;">
                  <i class="fab fa-tiktok mr-3 fa-2x-rm text-danger"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif

      <div class="clearfix">
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="bg-success-rm p-3 mb-4-rm border-bottom" style="">
        <a href="{{ route('website-home') }}" class="text-secondary">
          <div class="float-left mr-4">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
          </div>
          <div class="float-left mt-3 d-none d-md-block">
            <h1 class="mt-2 sr-only" style="font-weight: bold; font-size: 2rem;">{{ $company->name }}</h1>
            <div class="mt-3" style="font-size: 1.3rem;">
              {{ $company->tagline }}
            </div>
          </div>
        </a>
    
    
    
       @if (false)
       <div class="float-right mr-5 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
         @livewire ('website-shopping-cart-badge')
       </div>
       @endif
    
    
        <div class="clearfix">
        </div>
      </div>
    </div>
  </div>
</div>
