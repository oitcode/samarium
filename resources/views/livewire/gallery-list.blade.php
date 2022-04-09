<div class="card shadow-none">
  <div class="card-body p-0">

    <div wire:loading class="p-2 text-info">
      Loading ...
    </div>


    @if (!is_null($galleries) && count($galleries) > 0)
      <table class="table table-sm  table-hover table-valign-middle">
        @if (true)
        <thead>
          <tr class="border-top">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        @endif

        <tbody>
          @foreach($galleries as $gallery)
          <tr>
            <td class="text-muted">
              {{ $gallery->gallery_id }}
            </td>

            <td>
              <a class="text-dark" href="" wire:click.prevent="$emit('displayGallery', {{ $gallery }})">
                {{ $gallery->name }}
              </a>
            </td>

            <td class="text-secondary">
              {{ $gallery->description }}
            </td>

            <td>
              <span class="btn btn-tool btn-sm border rounded-circle mr-3" wire:click="$emit('updateGallery', {{ $gallery }})">
                <i class="fas fa-pencil-alt text-primary"></i>
              </span>
              <span class="btn btn-tool btn-sm border rounded-circle" wire:click="$emit('confirmDeleteGallery', {{ $gallery }})">
                <i class="fas fa-trash text-danger"></i>
              </span>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="px-3 mt-2 text-muted">
        <small>
          No records to display.
        </small>
      </div>
    @endif
  </div>
</div>
