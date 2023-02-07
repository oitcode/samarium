<div class="card shadow mb-4">
  <div class="card-body" style="{{--font-size: 1.3rem;--}}">

    @if (false)
    <h1>
      Company
    </h1>
    @endif

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

    <div class="form-group">
      @if (false)
      <label for="">Name</label>
      @endif
      <input type="text" class="form-control" wire:model.defer="name" style="{{-- font-size: 1.3rem; --}}">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      @if (false)
      <label for="">Tagline</label>
      @endif
      <input type="text" class="form-control" wire:model.defer="tagline" style="{{-- font-size: 1.3rem; --}}">
      @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      @if (false)
      <label for="">Phone</label>
      @endif
      <input type="text" class="form-control" wire:model.defer="phone" style="{{-- font-size: 1.3rem; --}}">
      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      @if (false)
      <label for="">Email</label>
      @endif
      <input type="text" class="form-control" wire:model.defer="email" style="{{-- font-size: 1.3rem; --}}">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      @if (false)
      <label for="">Address</label>
      @endif
      <input type="text" class="form-control" wire:model.defer="address" style="{{-- font-size: 1.3rem; --}}">
      @error('address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      @if (false)
      <label for="">PAN Number</label>
      @endif
      <input type="text" class="form-control" wire:model.defer="pan_number" style="{{-- font-size: 1.3rem; --}}">
      @error('pan_number') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      @if (false)
      <label for="">Logo</label>
      @endif
      <input type="file" class="form-control" wire:model="logo_image">
      @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <h2 class="h5 text-secondary mt-4 mb-3">
      Social Media Links
    </h2>

    <div class="form-group">
      <i class="fab fa-facebook"></i>
      <label for="">Facebook</label>
      <input type="text" class="form-control" wire:model.defer="fb_link" style="{{-- font-size: 1.3rem; --}}">
      @error('fb_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <i class="fab fa-twitter"></i>
      <label for="">Twitter</label>
      <input type="text" class="form-control" wire:model.defer="twitter_link" style="{{-- font-size: 1.3rem; --}}">
      @error('twitter_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <i class="fab fa-instagram"></i>
      <label for="">Instagram</label>
      <input type="text" class="form-control" wire:model.defer="insta_link" style="{{-- font-size: 1.3rem; --}}">
      @error('insta_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <i class="fab fa-youtube"></i>
      <label for="">Youtube</label>
      <input type="text" class="form-control" wire:model.defer="youtube_link" style="{{-- font-size: 1.3rem; --}}">
      @error('youtube_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <i class="fab fa-tiktok"></i>
      <label for="">Tiktok</label>
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

  @if (false)
  @livewire ('gallery-component')
  @endif
</div>
