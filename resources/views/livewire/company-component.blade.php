<div class="card shadow mb-4">
  <div class="card-body" style="font-size: 1.3rem;">

    <div class="form-group">
      <label for="">Name</label>
      <input type="text" class="form-control" wire:model.defer="name" style="font-size: 1.3rem;">
      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Tagline</label>
      <input type="text" class="form-control" wire:model.defer="tagline" style="font-size: 1.3rem;">
      @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Phone</label>
      <input type="text" class="form-control" wire:model.defer="phone" style="font-size: 1.3rem;">
      @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Email</label>
      <input type="text" class="form-control" wire:model.defer="email" style="font-size: 1.3rem;">
      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Address</label>
      <input type="text" class="form-control" wire:model.defer="address" style="font-size: 1.3rem;">
      @error('address') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">PAN Number</label>
      <input type="text" class="form-control" wire:model.defer="pan_num" style="font-size: 1.3rem;">
      @error('pan_num') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Logo</label>
      <input type="file" class="form-control" wire:model="logo_image">
      @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <h2 class="mt-4">
      Social Media Links
    </h2>

    <div class="form-group">
      <label for="">Facebook</label>
      <input type="text" class="form-control" wire:model.defer="fb_link" style="font-size: 1.3rem;">
      @error('fb_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Twitter</label>
      <input type="text" class="form-control" wire:model.defer="twitter_link" style="font-size: 1.3rem;">
      @error('twitter_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Instagram</label>
      <input type="text" class="form-control" wire:model.defer="insta_link" style="font-size: 1.3rem;">
      @error('insta_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Youtube</label>
      <input type="text" class="form-control" wire:model.defer="youtube_link" style="font-size: 1.3rem;">
      @error('youtube_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Tiktok</label>
      <input type="text" class="form-control" wire:model.defer="tiktok_link" style="font-size: 1.3rem;">
      @error('tiktok_link') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($company)
      <button type="submit" class="btn btn-primary p-3" wire:click="update" style="font-size: 1.3rem;">
        Update
      </button>
    @else
      <button type="submit" class="btn btn-primary p-3" wire:click="store" style="font-size: 1.3rem;">
        Craete
      </button>
    @endif
    <button type="submit" class="btn btn-danger p-3" wire:click="$emit('exitCreateMode')" style="font-size: 1.3rem;">
      Cancel
    </button>

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>
  </div>
</div>
