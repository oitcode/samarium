<div class="card shadow-none">
  <div class="card-body p-0">

    <div wire:loading class="p-2 text-info">
      Loading ...
    </div>


    @if (!is_null($galleries) && count($galleries) > 0)
      {{-- Show in bigger screen --}}
      <div class="d-none d-md-block">
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            @if (true)
            <thead>
              <tr class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }} border-top">
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
              @foreach($galleries as $gallery)
              <tr>
                <td class="text-muted-rm">
                  {{ $gallery->gallery_id }}
                </td>

                <td class="h6 font-weight-bold">
                  <strong wire:click="$emit('displayGallery', {{ $gallery }})" role="button">
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

                @if (true)
                <td>
                  @if (false)
                  <span class="btn btn-tool btn-sm border rounded-circle mr-3" wire:click="$emit('updateGallery', {{ $gallery }})">
                    <i class="fas fa-pencil-alt text-primary"></i>
                  </span>
                  @endif
                  <span class="btn btn-tool btn-sm-rm text-danger" wire:click="$emit('confirmDeleteGallery', {{ $gallery }})">
                    <i class="fas fa-trash mr-1"></i>
                    Delete
                  </span>
                </td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      {{-- Show in smaller screens --}}
      <div class="d-md-none">

        @foreach ($galleries as $gallery)
          <div class="bg-white border px-3">
            <div class="h4-rm py-4">
              <span  wire:click="$emit('displayGallery', {{ $gallery }})" class="h5 text-dark font-weight-bold" role="button">
                {{ \Illuminate\Support\Str::limit($gallery->name, 60, $end=' ...') }}
              </span>

              <br/ >
              <br/ >

              Num of images: {{ count($gallery->galleryImages) }}
              <br/>
            </div>
            <div>
              <span class="btn btn-light mr-3 mb-3" wire:click="$emit('confirmDeleteGallery', {{ $gallery }})">
                <i class="fas fa-trash mr-1"></i>
                Delete gallery
              </span>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="px-3 mt-2 text-muted">
        <small>
          No records to display.
        </small>
      </div>
    @endif
  </div>
</div>
