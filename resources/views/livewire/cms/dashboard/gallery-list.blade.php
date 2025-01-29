<div>

  <x-list-component>
    <x-slot name="listInfo">
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>ID</th>
      <th>Name</th>
      <th>No of images</th>
      @if (false)
      <th>Space</th>
      @endif
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($galleries as $gallery)
      <tr>
        <td>
          {{ $gallery->gallery_id }}
        </td>
        <td class="h6 font-weight-bold">
          <strong>
          {{ $gallery->name }}
          </strong>
        </td>
        <td>
          {{ count($gallery->galleryImages) }}
        </td>
        @if (false)
        <td>
          {{ $gallery->totalDiskSpaceOccupied() }}
        </td>
        @endif
        <td class="text-right">
          <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayGallery', { gallery: {{ $gallery }} })">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayGallery', { gallery: {{ $gallery }} })">
            <i class="fas fa-eye"></i>
          </button>
          <button class="btn btn-danger px-2 py-1" wire:click="$dispatch('confirmDeleteGallery', {{ $gallery }})">
            <i class="fas fa-trash"></i>
          </button>
        </td>
      </tr>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $galleries->links() }}
    </x-slot>
  </x-list-component>

</div>
