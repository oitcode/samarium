<div class="bg-light border p-2">

  {{ $slot }}

  {{-- Clear Mode button --}}
  <div class="float-right mr-3">
    <button class="btn btn-light text-muted" {{-- style="border: 1px solid #abc !important;" --}} wire:click="clearModes">
      <i class="fa fa-street-view"></i>
    </button>
  </div>

  <div class="clearfix">
  </div>
</div>
