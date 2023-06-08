<div class="mb-4">
  <div>

    @if (false)
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
    @endif

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

    <div class="row">
      <div class="col-md-8">
        <h2 class="h5 mb-3">
          Basic Info
        </h2>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-image mr-1"></i>
              Logo
            </label>
            @endif
          </div>
          <div class="col-md-8">
            @if ($company && $company->logo_image_path)
              <div class="d-flex">
                <div class="d-flex justify-content-start mb-3">
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 75px;">
                </div>
                <div class="mx-4">
                  <button class="btn btn-light" wire:click="enterMode('updateLogoImageMode')">
                    <i class="fas fa-pencil-alt mr-1"></i>
                    Change
                  </button>
                </div>
              </div>
            @else
              <div>
                <button class="btn btn-light" wire:click="enterMode('updateLogoImageMode')">
                  Set
                </button>
              </div>
            @endif
          </div>
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

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-home mr-1"></i>
              Name
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="name" style="{{-- font-size: 1.3rem; --}}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-info-circle mr-1"></i>
              Tagline
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="tagline" style="{{-- font-size: 1.3rem; --}}">
            @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-phone mr-1"></i>
              Phone
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="phone" style="{{-- font-size: 1.3rem; --}}">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-envelope mr-1"></i>
              Email
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="email" style="{{-- font-size: 1.3rem; --}}">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-map-marker-alt mr-1"></i>
              Address
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="address" style="{{-- font-size: 1.3rem; --}}">
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            @if (true)
            <label style="min-width: 200px;">
              <i class="fas fa-info-circle mr-1"></i>
              PAN Number
            </label>
            @endif
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="pan_number" style="{{-- font-size: 1.3rem; --}}">
            @error('pan_number') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>


        <h2 class="h5 mt-4 mb-3">
          Social Media Links
        </h2>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-facebook"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="fb_link" style="{{-- font-size: 1.3rem; --}}">
            @error('fb_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-twitter"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="twitter_link" style="{{-- font-size: 1.3rem; --}}">
            @error('twitter_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-instagram"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="insta_link" style="{{-- font-size: 1.3rem; --}}">
            @error('insta_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-youtube"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="youtube_link" style="{{-- font-size: 1.3rem; --}}">
            @error('youtube_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fab fa-tiktok"></i>
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model.defer="tiktok_link" style="{{-- font-size: 1.3rem; --}}">
            @error('tiktok_link') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        {{-- Submit button section --}}
        <div class="my-4">
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

      <div class="col-md-4">
        {{--
        |
        | Company info section
        |
        | Show this section only if company already exists. Do not show this
        | during first time when company is being created for the first time.
        |
        | Additional info is added only once company is already created. This
        | will keep the workflow clean as well.
        | 
        --}}
        @if ($company)
          <div>
            <h2 class="h5 mb-3">
              Additional Info
            </h2>

            {{-- Show additional company info --}}
            @if (count($company->companyInfos) > 0)
              @foreach ($company->companyInfos as $companyInfo)
                @livewire ('company.dashboard.company-info-display',
                    ['companyInfo' => $companyInfo,],
                    key('company-info-' . $companyInfo->company_info_id)
                )
              @endforeach
            @else
              <div>
                No additional company info.
              </div>
            @endif

            {{-- Show additional company info --}}
            <div class="my-3">
              @if ($modes['companyInfoCreateMode'])
                @livewire ('company.dashboard.company-info-create', ['company' => $company,])
              @else
                <button class="btn btn-success" wire:click="enterMode('companyInfoCreateMode')">
                  Add company info
                </button>
              @endif
            </div>

          </div>
        @endif
      </div>

    </div>

  </div>

</div>
