<div class="float-left mr-3">
  <button class="btn btn-light text-dark" {{-- style="border: 1px solid #abc !important;" --}} wire:click="{{ $clickMethod }}">
    <i class="{{ $faClass }}"></i>
    {{ $title }}
  </button>
</div>
