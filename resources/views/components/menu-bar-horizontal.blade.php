<div class="bg-light border p-2">
  {{ $slot }}

  {{--
     |
     | Clear Mode button
     |
  --}}
  <div class="d-flex justify-content-end">
    <div class="float-right mr-3">
      <button class="btn btn-light text-muted" wire:click="clearModes">
        <i class="fa fa-street-view"></i>
      </button>
    </div>
  </div>
</div>
