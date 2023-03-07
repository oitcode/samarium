<div class="d-inline-block-rm">
  <a href="{{ route('website-checkout') }}" style="font-size: 1.2rem; font-weight: bold;">
    <i class="fas fa-shopping-cart mr-2 text-dark"></i>
    @if (false)
    <span class="text-dark">
    Rs
    @php echo number_format( $total ); @endphp
    </span>
    @endif
  </a>

  {{-- Loading spinner --}}
  <div wire:loading class="m-0"
      style="font-size: 1.5rem;">
    <span class="spinner-border text-info mr-3" role="status">
    </span>
  </div>

  <!-- Flash message div -->
  @if (false)
  @if (session()->has('yoho12'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('yoho12') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif
  @endif
</div>
