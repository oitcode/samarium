<div>
  <div class="container-fluid py-4 border">
    <div class="container">
      <h2 class="h3 text-secondary-rm">
        Contact us
      </h2>
    </div>
  </div>
  <div class="container-fluid bg-white border">
  <div class="container py-4">
    <div class="row">
      <div class="col-md-6 p-4 text-secondary-rm" style="font-size: 1.3rem;">
          <div class="d-flex mb-3">
            <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 80px;">
            <div class="d-flex flex-column justify-content-center ml-3">
              <div class="mt-3">
              </div>
            </div>
          </div>
  
          <p class="mb-2" style="font-size: 1.1rem;">
            <i class="fas fa-map-marker-alt mr-3"></i>
            {{ $company->address }}
          </p>
  
          <p class="mb-2" style="font-size: 1.1rem;">
            <i class="fas fa-phone mr-3"></i>
            {{ $company->phone }}
          </p>
  
          <p class="mb-2" style="font-size: 1.1rem;">
            <i class="fas fa-envelope mr-3"></i>
            {{ $company->email }}
          </p>
  
          @if (true)
          <div class="mt-4" style="font-size: 1.3rem;">
            <div class="mb-2">
              Social media
            </div>
            <div class="text-secondary my-3">
              Our social media pages
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
          @endif
      </div>
      <div class="col-md-6 bg-white border py-4 shadow">
        <div style="font-size: 1.3rem;">
        Your message
        </div>
        <div class="p-3">
        
          @if (session()->has('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
          @endif
        
          <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" wire:model.defer="sender_name">
            @error('sender_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <label for="">Email Address</label>
            <input type="email" class="form-control" wire:model.defer="sender_email">
            @error('sender_email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <label for="">Phone</label>
            <input type="text" class="form-control" wire:model.defer="sender_phone">
            @error('sender_phone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <div class="form-group">
            <label for="">Message</label>
            <textarea class="form-control" rows="3" wire:model.defer="message"></textarea>
            @error('message') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        
          <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
