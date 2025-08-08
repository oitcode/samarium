<div>

  <div class="container-fluid m-0 py-5" style="background-color: #eee;">
    <div class="container">
      <div class="d-flex flex-column justify-content-center px-3 text-center">
        <div class="mb-3">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" style="max-width: 100px; max-height: 100px;">
        </div>
        <div class="d-flex flex-column justify-content-center">
          <h2 class="h4 card-title mb-0 o-heading">
              {{ $company->name }}
          </h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid m-0 cool-bg">
    <div class="container p-0 py-4">
      <div class="row" style="margin: auto;">
        @if ($onlyForm != 'yes')
          <div class="col-md-8 p-0">
            <div class="card h-100 border-0 bg-info p-0 pb-4 pb-md-0 bg-transparent">
                <div class="card-body d-flex flex-column p-0 pr-3 bg-transparent">
                    <!-- Address -->
                    <div class="card contact-card mb-0 py-0 border-0 bg-transparent">
                        <div class="card-body py-3 bg-transparent">
                            <div class="d-flex align-items-center">
                                <div class="bg-primary text-white rounded-circle contact-icon d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1 o-heading">Address</h5>
                                    <p class="mb-0 text-muted">{{ $company->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="card contact-card mb-0 py-0 border-0 bg-transparent">
                        <div class="card-body py-3 bg-transparent">
                            <div class="d-flex align-items-center">
                                <div class="bg-success text-white rounded-circle contact-icon d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1 o-heading">Phone</h5>
                                    <p class="mb-0 text-muted">{{ $company->phone }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="card contact-card mb-5 mb-md-0 py-0 border-0 bg-transparent">
                        <div class="card-body py-3 bg-transparent">
                            <div class="d-flex align-items-center">
                                <div class="bg-info text-white rounded-circle contact-icon d-flex align-items-center justify-content-center mr-3">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h5 class="mb-1 o-heading">Email</h5>
                                    <p class="mb-0 text-muted">{{ $company->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Social media -->
                    <div class="card contact-card mb-4 mb-md-0 py-0 border-0 flex-grow-1 bg-transparent">
                        <div class="card-body p-0 bg-transparent">
                            <div class="d-flex flex-column justify-content-center h-100 p-3">
                              <h2 class="h4 o-heading mb-4 mb-md-5">
                                  <i class="fas fa-share-alt mr-2"></i>
                                  Follow Us
                              </h2>
                              <div class="d-flex">
                                  @if ($company->fb_link)
                                    <a href="{{ $company->fb_link }}" target="_blank"
                                        class="btn btn-primary btn-lg mr-3 rounded-circle social-icon" style="width: 50px; height: 50px;">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                  @endif
                                  @if ($company->twitter_link)
                                    <a href="{{ $company->twitter_link }}" target="_blank"
                                        class="btn btn-info btn-lg mr-3 rounded-circle social-icon" style="width: 50px; height: 50px;">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                  @endif
                                  @if ($company->insta_link)
                                    <a href="{{ $company->insta_link }}" target="_blank"
                                        class="btn btn-danger btn-lg mr-3 rounded-circle social-icon" style="width: 50px; height: 50px;">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                  @endif
                                  @if ($company->youtube_link)
                                    <a href="{{ $company->youtube_link }}" target="_blank"
                                        class="btn btn-danger btn-lg mr-3 rounded-circle social-icon" style="width: 50px; height: 50px;">
                                        <i class="fab fa-youtube"></i>
                                    </a>
                                  @endif
                                  @if ($company->tiktok_link)
                                    <a href="{{ $company->tiktok_link }}" target="_blank"
                                        class="btn btn-danger btn-lg mr-3 rounded-circle social-icon" style="width: 50px; height: 50px;">
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                  @endif
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        @endif

        <div class="@if ($onlyForm == 'yes') col-md-12 @else col-md-4 @endif text-danger border p-0 px-3 px-md-0 o-border-radius h-100 pt-4 pb-3 shadow">
          <div>
            <h2 class="h4 o-heading px-4 pb-3 px-3">
              @if (false)
              <i class="fas fa-comment mr-2"></i>
              @endif
              Send us a message
            </h2>
            <p class="px-4 py-3 table-primary text-primary mx-3 o-border-radius">
              Please write us your message.
              We will get back to you soon!
            </p>
          </div>
          @if (false)
          <hr class="mb-4" width="10%" style="border: 3px solid black; margin: 0 0;"/>
          @endif
          <div class="p-3">
            @if (session()->has('message'))
              <div class="alert alert-success">
                {{ session('message') }}
              </div>
            @endif
          
            <div class="form-group">
              <input type="text" class="form-control o-border-radius" wire:model="sender_name" placeholder="Name">
              @error('sender_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          
            <div class="form-group">
              <input type="email" class="form-control o-border-radius" wire:model="sender_email" placeholder="Email">
              @error('sender_email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          
            <div class="form-group">
              <input type="text" class="form-control o-border-radius" wire:model="sender_phone" placeholder="Phone">
              @error('sender_phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          
            <div class="form-group mb-4">
              <textarea class="form-control o-border-radius" rows="3" wire:model="message" placeholder="Message"></textarea>
              @error('message') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          
            <button type="submit" class="btn btn-block badge-pill py-3 o-ascent-color mt-4" wire:click="store">
              SEND MESSAGE
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
