<div class="d-inline-block-rm">
  <a href="{{ route('website-checkout') }}">
    <i class="fas fa-shopping-cart fa-2x mr-2 text-white"></i>
  </a>

  {{-- Loading spinner --}}
  <div wire:loading class="m-0">
    <span class="spinner-border text-info mr-3" role="status">
    </span>
  </div>

</div>
