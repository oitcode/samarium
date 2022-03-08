<div>

  <div class="container-fluid border bg-light">
    <div class="container py-2">
      <div class="float-right mr-5" style="font-size: 1rem; font-weight: bold;">
        <div class="d-flex justify-content-center h-100">
          <div class="justify-content-center h-100 align-self-center text-center text-secondary">
            @if (false)
            <span class="bad badge-pill text-white mr-3" style="background-color: purple;">
              Viber
            </span>
            @endif
            <span class="bad badge-pill badge-success mr-3">
              Call
            </span>
            <i class="fas fa-phone mr-3"></i>
            {{ $company->phone }}
          </div>
        </div>
      </div>
      <div class="clearfix">
      </div>
    </div>
  </div>

  <div class="container">
    <div class="o-ws-header bg-success-rm text-white-rm p-3 mb-4-rm border-bottom" style="{{--background-color: maroon;--}}">
      <a href="{{ route('website-home') }}">
        <div class="float-left mr-4">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
        </div>
        <div class="float-left mt-3">
          <h1 class="mt-2 text-dark" style="font-weight: bold; font-size: 2rem;">{{ $company->name }}</h1>
          <div class="text-secondary">
            {{ $company->tagline }}
          </div>
        </div>
      </a>
  
  
  
      @if ($company->fb_link)
        <a href="{{ $company->fb_link }}" target="_blank">
          <div class="float-right mr-3 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.8rem; font-weight:bold;">
                  <i class="fab fa-facebook text-primary fa-2x-rm" style="font-size: 2.5rem;"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
      @if ($company->twitter_link)
        <a href="{{ $company->twitter_link }}" target="_blank">
          <div class="float-right mr-3 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.8rem; font-weight:bold;">
                  <i class="fab fa-twitter mr-3 fa-2x text-info"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
  
      @if ($company->insta_link)
        <a href="{{ $company->insta_link }}" target="_blank">
          <div class="float-right mr-3 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.8rem; font-weight:bold;">
                  <i class="fab fa-instagram mr-3 fa-2x-rm text-danger" style="font-size: 2.5rem;"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
      @if ($company->youtube_link)
        <a href="{{ $company->youtube_link }}" target="_blank">
          <div class="float-right mr-3 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.8rem; font-weight:bold;">
                  <i class="fab fa-youtube mr-3 fa-2x text-danger"></i>
                </span>
              </div>
            </div>
          </div>
        </a>
      @endif
  
      @if ($company->tiktok_link)
        <a href="{{ $company->tiktok_link }}" target="_blank">
          <div class="float-right mr-3 h-100 mt-3" style="font-size: 1.5rem; font-weight: bold;">
            <div class="d-flex justify-content-center h-100">
              <div class="justify-content-center h-100 align-self-center text-center">
                <span class="" style="font-size: 1.8rem; font-weight:bold;">
                  <i class="fab fa-tiktok mr-3 fa-2x text-danger"></i>
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
</div>
