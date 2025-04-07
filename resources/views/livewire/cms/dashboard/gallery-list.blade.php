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
      <x-table-row-component>
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
          <x-list-edit-button-component clickMethod="$dispatch('displayGallery', { galleryId: {{ $gallery->gallery_id }} })">
          </x-list-edit-button-component>
          <x-list-view-button-component clickMethod="$dispatch('displayGallery', { galleryId: {{ $gallery->gallery_id }} })">
          </x-list-view-button-component>
          <x-list-delete-button-component clickMethod="$dispatch('confirmDeleteGallery', {{ $gallery }})">
          </x-list-delete-button-component>
        </td>
      </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $galleries->links() }}
    </x-slot>
  </x-list-component>

</div>
