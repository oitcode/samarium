<div>


  <div class="container-fluid bg-white border-rm">
  <div class="container pt-3 pb-5">
    <div class="row">
      @if (true)
      <div class="col-md-6 p-4 text-secondary-rm" style="">
          <div class="d-flex mb-4">
            @if (false)
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 50px;">
            @endif
            @if (true)
            <div class="d-flex flex-column justify-content-center ml-3-rm">
              <div class="mt-3-rm">
                <h2 class="h1 font-weight-bold">
                  {{ $company->name }}
                </h2>
              </div>
            </div>
            @endif
          </div>
  
          <div class="d-flex mb-2">
            <i class="fas fa-map-marker-alt text-primary-rm mr-2"></i>
            <span class="text-secondary-rm font-weight-bold" style="font-size: 1rem;">
              {{ $company->address }}
            </span>
          </div>
  
          <p class="mb-2" style="">
            <i class="fas fa-phone text-primary-rm mr-2"></i>
            <span class="text-secondary-rm font-weight-bold" style="font-size: 1rem;">
              {{ $company->phone }}
            </span>
          </p>
  
          <p class="mb-2" style="">
            <i class="fas fa-envelope text-primary-rm mr-2"></i>
            <span class="text-secondary-rm font-weight-bold" style="font-size: 1rem;">
              {{ $company->email }}
            </span>
          </p>
  
          @if (true)
          <div class="my-5" style="font-size: 1.3rem;">
            <h2 class="h4 my-3">
              Our social media pages
            </h2>
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
          @endif
      </div>
      @endif
      <div class="col-md-6 bg-white border py-4 shadow-lg-rm">
        <div style="font-size: 1.3rem;">
        <h2 class="h4 text-muted-rm text-md-center pl-3">
          <i class="far fa-paper-plane text-muted-rm mr-2"></i>
          Send us a message
          </h2>
        </div>
        <div class="p-3">
        
          @if (session()->has('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
          @endif
        
          <div class="form-group">
            <input type="text" class="form-control" wire:model.defer="sender_name" placeholder="Name">
            @error('sender_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <input type="email" class="form-control" wire:model.defer="sender_email" placeholder="Email">
            @error('sender_email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <input type="text" class="form-control" wire:model.defer="sender_phone" placeholder="Phone">
            @error('sender_phone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <textarea class="form-control" rows="3" wire:model.defer="message" placeholder="Message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <button type="submit"
              class="btn btn-primary-rm btn-block badge-pill py-3"
              wire:click="store"
              style="
                background-color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->ascent_bg_color }}
                  @else
                    orange
                  @endif
                  ;
                color:
                  @if (\App\CmsTheme::first())
                    {{ \App\CmsTheme::first()->ascent_text_color }}
                  @else
                    white
                  @endif
                  ;
              ">
            SEND MESSAGE
          </button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
