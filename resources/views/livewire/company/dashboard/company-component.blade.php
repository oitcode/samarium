<div>

  <x-toolbar-classic toolbarTitle="Company">
    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  <div>

    {{--
       |
       | Flash message div
       |
    --}}

    @if (session()->has('message'))
      @include ('partials.flash-message', ['message' => session('message'),])
    @endif

    <div>
      <div class="bg-white p-3 mb-2">
        <div class="d-flex justify-content-between">
          <h2 class="h6 font-weight-bold" style="font-weight: 900; font-family: arial; color: #123;">
            Logo
          </h2>
          <div>
            @include ('partials.dashboard.spinner-button')
            @if ($company)
              <button class="btn btn-primary m-0 border"
                  wire:click="enterMode('updateLogoImageMode')"
                  style="min-width: 200px;">
                <i class="fas fa-pencil-alt mr-1"></i>
                Change logo
              </button>
            @endif
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-8">
            @if ($company && $company->logo_image_path)
              <div class="d-flex justify-content-between">
                <div class="d-flex justify-content-start mb-3">
                  <img src="{{ asset('storage/' . $company->logo_image_path) }}" class="img-fluid" style="height: 75px;">
                </div>
              </div>
            @else
              <div>
                <button class="btn btn-primary" wire:click="enterMode('updateLogoImageMode')">
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
            <div class="o-heading mb-3">
              Upload new image
            </div>
            <div class="mb-2">
              <input type="file" class="form-control" wire:model.live="logo_image">
              @error('logo_image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mt-3">
              @if ($company)
                <button class="btn btn-success" wire:click="updateLogoImage">
                  Update
                </button>
                <button class="btn btn-danger" wire:click="exitMode('updateLogoImageFromNewUploadMode')">
                  Cancel
                </button>
                @include ('partials.dashboard.spinner-button')
              @endif
            </div>
          </div>
        @endif

        @if ($modes['updateLogoImageFromLibraryMode'])
          @livewire ('cms.dashboard.media-select-image-component')
          <div class="mt-3">
            <button class="btn btn-success" wire:click="updateLogoImage">
              Update
            </button>
            <button class="btn btn-danger" wire:click="exitMode('updateLogoImageFromLibraryMode')">
              Cancel
            </button>
            @include ('partials.dashboard.spinner-button')
          </div>
        @endif
      </div>

      <div class="bg-white p-3 mb-4">
        <h2 class="h6 mb-4 font-weight-bold mb-3 o-heading">
          Basic Info
        </h2>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-home mr-1"></i>
              Name
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="name">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-circle mr-1"></i>
              Short name
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="short_name">
            @error('short_name') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-info-circle mr-1"></i>
              Tagline
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="tagline">
            @error('tagline') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-phone mr-1"></i>
              Phone
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="phone">
            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-envelope mr-1"></i>
              Email
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="email">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-map-marker-alt mr-1"></i>
              Address
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="address">
            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="form-row mb-3">
          <div class="col-md-4">
            <label style="min-width: 200px;">
              <i class="fas fa-info-circle mr-1"></i>
              PAN Number
            </label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" wire:model="pan_number">
            @error('pan_number') <span class="text-danger">{{ $message }}</span> @enderror
          </div>
        </div>

        {{-- Submit button section --}}
        <div class="mt-4 mb-2">
          @if ($company)
            @include ('partials.button-update')
          @else
            @include ('partials.button-store')
            @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
          @endif
          @include ('partials.dashboard.spinner-button')
        </div>
      </div>

      @if ($company)
        <div class="bg-white p-3 mb-4">
          <h2 class="h6 mb-3 o-heading">
            Social Media Links
          </h2>
          <div class="form-row mb-3">
            <div class="col-md-4">
              <label style="min-width: 200px;">
                <i class="fab fa-facebook"></i>
              </label>
            </div>
            <div class="col-md-8">
              <input type="text" class="form-control" wire:model="fb_link">
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
              <input type="text" class="form-control" wire:model="twitter_link">
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
              <input type="text" class="form-control" wire:model="insta_link">
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
              <input type="text" class="form-control" wire:model="youtube_link">
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
              <input type="text" class="form-control" wire:model="tiktok_link">
              @error('tiktok_link') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>

          {{-- Submit button section --}}
          <div class="mt-4 mb-2">
            @if ($company)
              @include ('partials.button-update')
            @else
              @include ('partials.button-store')
              @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCreateMode',])
            @endif
            @include ('partials.dashboard.spinner-button')
          </div>
        </div>

        <div class="p-0 px-0 mt-4 mt-md-0">

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

          <div class="bg-white border h-100">
            @if ($company)
              <div class="p-2">
                <h2 class="h6 mb-4 mt-2 o-heading">
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
                    <button class="btn btn-primary shadow-sm pl-3" wire:click="enterMode('companyInfoCreateMode')">
                      <i class="fas fa-plus-circle mr-1"></i>
                      Add company info
                    </button>
                  @endif
                </div>
              </div>
            @endif
          </div>
        </div>
      @endif
    </div>

    {{--
    |
    | Brief company description
    |
    | Brief description of the company. Could include location, products, niche, or any other
    | information.
    | 
    --}}

    @if ($company)
      <div class="my-4 bg-white border p-3">
        <h2 class="h6 o-heading">
          Brief description
        </h2>

        @if ($company->brief_description)
          @if ($modes['briefDescriptionUpdateMode'])
            @livewire ('company.dashboard.brief-description-edit', ['company' => $company,])
          @else
            <div class="py-3">
              {{ $company->brief_description}}
            </div>
            <div class="text-muted">
              <button class="btn btn-primary px-2 ml-0 pl-0" wire:click="enterMode('briefDescriptionUpdateMode')">
                <i class="fas fa-pencil-alt mr-1"></i>
                Edit
              </button>
            </div>
          @endif
        @else
          @if ($modes['briefDescriptionCreateMode'])
            @livewire ('company.dashboard.brief-description-create', ['company' => $company,])
          @else
            <div class="py-3 text-muted">
              No brief description.
            </div>
            <div class="text-muted">
              <button class="btn btn-light ml-0 pl-0 text-primary" wire:click="enterMode('briefDescriptionCreateMode')">
                Add brief description
              </button>
            </div>
          @endif
        @endif
      </div>
    @endif

    {{--
    |
    | Google map share link
    |
    | Google map share link of the company
    | 
    --}}

    @if ($company)
      <div class="my-4 bg-white border p-3">
        <h2 class="h6 o-heading">
          Google map share link
        </h2>

        @if ($company->google_map_share_link)
          @if ($modes['googleMapShareLinkUpdateMode'])
            @livewire ('company.dashboard.google-map-share-link-edit', ['company' => $company,])
          @else
            <div class="py-3">
              {{ $company->google_map_share_link}}
            </div>
            <div class="text-muted">
              <button class="btn btn-primary px-2 ml-0 pl-0" wire:click="enterMode('googleMapShareLinkUpdateMode')">
                <i class="fas fa-pencil-alt mr-1"></i>
                Edit
              </button>
            </div>
          @endif
        @else
          @if ($modes['googleMapShareLinkCreateMode'])
            @livewire ('company.dashboard.google-map-share-link-create', ['company' => $company,])
          @else
            <div class="py-3 text-muted">
              No google map share link.
            </div>
            <div class="text-muted">
              <button class="btn btn-light ml-0 pl-0 text-primary" wire:click="enterMode('googleMapShareLinkCreateMode')">
                Add google map share link.
              </button>
            </div>
          @endif
        @endif
      </div>
    @endif
  </div>

</div>
