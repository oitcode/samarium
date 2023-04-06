<div class="mb-4">
  <div class="" style="{{--font-size: 1.3rem;--}}">

    {{-- Toolbar --}}
    <div class="mb-4">
      @if ($company)
        <button type="submit" class="btn btn-success badge-pill p-2 px-3" wire:click="update" style="">
          <i class="fas fa-save mr-1"></i>
          Update
        </button>
      @else
        <button type="submit" class="btn btn-success p-1" wire:click="store" style="">
          Craete
        </button>
        <button type="submit" class="btn btn-danger p-1" wire:click="$emit('exitCreateMode')" style="">
          Cancel
        </button>
      @endif

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>

    @if (session()->has('message'))
      {{-- Flash message div --}}
      <div class="p-2">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle mr-3"></i>
          {{ session('message') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span class="text-success" aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    @endif

    <h2 class="h5 text-secondary mb-3">
      Basic Info
    </h2>

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-image mr-1"></i>
        Logo
      </label>
      @endif
      @if ($company && $company->logo_image_path)
        <div class="d-flex justify-content-start mb-3">
          <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 75px;">
        </div>
        <div class="mx-4">
          <button class="btn btn-light" wire:click="enterMode('updateLogoImageMode')">
            <i class="fas fa-pencil-alt mr-1"></i>
            Change
          </button>
        </div>
      @else
        <div>
          <button class="btn">
            Set
          </button>
        </div>
      @endif
      @if (false)
      <input type="file" class="form-control" wire:model="logo_image">
      @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
      @endif
    </div>

    @if ($modes['updateLogoImageMode'])
      <div class="my-4">
        <div class="d-flex">
          <div class="mr-3">
            <button class="btn btn-primary" wire:click="enterMode('updateLogoImageFromNewUploadMode')">
              Upload
            </button>
          </div>
          <div class="mr-3">
            <button class="btn btn-success" wire:click="enterMode('updateLogoImageFromLibraryMode')">
              Media library
            </button>
          </div>
          <div class="mr-3">
            <button class="btn btn-danger" wire:click="exitMode('updateLogoImageMode')">
              Cancel
            </button>
          </div>
        </div>
      </div>
    @endif

    @if ($modes['updateLogoImageFromNewUploadMode'])
      <div class="my-4 p-3 bg-white border">
        Upload new image
        <div>
          <input type="file" class="form-control" wire:model="logo_image">
          @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div>
          <button class="btn btn-danger" wire:click="exitMode('updateLogoImageFromNewUploadMode')">
            Cancel
          </button>
        </div>
      </div>
    @endif

    @if ($modes['updateLogoImageFromLibraryMode'])
      @livewire ('cms.dashboard.media-select-image-component')
    @endif

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-home mr-1"></i>
        Name
      </label>
      @endif
      <input type="text" class="form-control" wire:model.defer="name" style="{{-- font-size: 1.3rem; --}}">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-info-circle mr-1"></i>
        Tagline
      </label>
      @endif
      <input type="text" class="form-control" wire:model.defer="tagline" style="{{-- font-size: 1.3rem; --}}">
      @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-phone mr-1"></i>
        Phone
      </label>
      @endif
      <input type="text" class="form-control" wire:model.defer="phone" style="{{-- font-size: 1.3rem; --}}">
      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-envelope mr-1"></i>
        Email
      </label>
      @endif
      <input type="text" class="form-control" wire:model.defer="email" style="{{-- font-size: 1.3rem; --}}">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-map-marker-alt mr-1"></i>
        Address
      </label>
      @endif
      <input type="text" class="form-control" wire:model.defer="address" style="{{-- font-size: 1.3rem; --}}">
      @error('address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      @if (true)
      <label style="min-width: 200px;">
        <i class="fas fa-info-circle mr-1"></i>
        PAN Number
      </label>
      @endif
      <input type="text" class="form-control" wire:model.defer="pan_number" style="{{-- font-size: 1.3rem; --}}">
      @error('pan_number') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    <h2 class="h5 text-secondary mt-4 mb-3">
      Social Media Links
    </h2>

    <div class="d-flex form-group">
      <label style="min-width: 200px;">
        <i class="fab fa-facebook"></i>
      </label>
      <input type="text" class="form-control" wire:model.defer="fb_link" style="{{-- font-size: 1.3rem; --}}">
      @error('fb_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      <label style="min-width: 200px;">
        <i class="fab fa-twitter"></i>
      </label>
      <input type="text" class="form-control" wire:model.defer="twitter_link" style="{{-- font-size: 1.3rem; --}}">
      @error('twitter_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      <label style="min-width: 200px;">
        <i class="fab fa-instagram"></i>
      </label>
      <input type="text" class="form-control" wire:model.defer="insta_link" style="{{-- font-size: 1.3rem; --}}">
      @error('insta_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      <label style="min-width: 200px;">
        <i class="fab fa-youtube"></i>
      </label>
      <input type="text" class="form-control" wire:model.defer="youtube_link" style="{{-- font-size: 1.3rem; --}}">
      @error('youtube_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="d-flex form-group">
      <label style="min-width: 200px;">
        <i class="fab fa-tiktok"></i>
      </label>
      <input type="text" class="form-control" wire:model.defer="tiktok_link" style="{{-- font-size: 1.3rem; --}}">
      @error('tiktok_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($company)
      <button type="submit" class="btn btn-success badge-pill p-2 px-3" wire:click="update" style="">
        <i class="fas fa-save mr-1"></i>
        Update
      </button>
    @else
      <button type="submit" class="btn btn-success badge-pill p-3" wire:click="store" style="">
        Create
      </button>
      <button type="submit" class="btn btn-danger badge-pill p-3" wire:click="$emit('exitCreateMode')" style="">
        Cancel
      </button>
    @endif

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>
  </div>

</div>
