<div class="card shadow-none">
  <div class="card-body p-0">

    <div wire:loading class="p-2 text-info">
      Loading ...
    </div>


      {{-- Show in bigger screen --}}
      <div class="d-none d-md-block">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            @if (true)
            <thead>
              <tr class="bg-white text-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>No of images</th>
                <th>Space</th>
                @if (true)
                <th>Action</th>
                @endif
              </tr>
            </thead>
            @endif

            <tbody>
              @if (!is_null($galleries) && count($galleries) > 0)
                @foreach ($galleries as $gallery)
                <tr>
                  <td class="text-muted-rm">
                    {{ $gallery->gallery_id }}
                  </td>

                  <td class="h6 font-weight-bold">
                    <strong wire:click="$dispatch('displayGallery', { gallery: {{ $gallery }} })" role="button">
                    {{ $gallery->name }}
                    </strong>
                  </td>

                  <td class="text-secondary-rm">
                    {{ $gallery->description }}
                  </td>

                  <td class="text-secondary-rm">
                    {{ count($gallery->galleryImages) }}
                  </td>

                  <td class="text-secondary-rm">
                    {{ $gallery->totalDiskSpaceOccupied() }}
                  </td>

                  <td>
                    @if (true)
                      <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayGallery', { gallery: {{ $gallery }} })">
                        <i class="fas fa-pencil-alt"></i>
                      </button>
                      <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayGallery', { gallery: {{ $gallery }} })">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-danger px-2 py-1" wire:click="$dispatch('confirmDeleteGallery', {{ $gallery }})">
                        <i class="fas fa-trash"></i>
                      </button>
                    @endif
                  </td>
                </tr>
                @endforeach
              @else
                <tr>
                  <td colspan="6">
                    <p class="font-weight-bold text-muted-rm h4 py-4 text-center" style="color: #fe8d01;">
                      <i class="fas fa-exclamation-circle mr-2"></i>
                      No galleries
                    <p>
                  </td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
      {{-- Show in smaller screens --}}
      <div class="d-md-none">

        @foreach ($galleries as $gallery)
          <div class="bg-white border px-3">
            <div class="h4-rm py-4">
              <span  wire:click="$dispatch('displayGallery', { gallery: {{ $gallery }} })" class="h5 text-dark font-weight-bold" role="button">
                {{ \Illuminate\Support\Str::limit($gallery->name, 60, $end=' ...') }}
              </span>

              <br/ >
              <br/ >

              Num of images: {{ count($gallery->galleryImages) }}
              <br/>
            </div>
            <div>
              <span class="btn btn-light mr-3 mb-3" wire:click="$dispatch('confirmDeleteGallery', {{ $gallery }})">
                <i class="fas fa-trash mr-1"></i>
                Delete gallery
              </span>
            </div>
          </div>
        @endforeach
      </div>
  </div>
</div>
