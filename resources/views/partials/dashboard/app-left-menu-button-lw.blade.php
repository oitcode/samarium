<button class="btn
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
          @else
          @endif
        @else
          bg-dark
        @endisset
      @else
        bg-dark
      @endisset
    @else
      bg-dark
    @endisset
    m-0 py-3 w-100 text-left rounded-0 font-weight-bold text-white-rm o-heading"
    wire:click="{{ $btnClickMethod }}" wire:key="{{ rand() . $btnCheckMode }}">
  <div class="d-flex justify-content-between">
    <div>
      <i class="{{ $btnIconFaClass }} mr-2"></i>
      {{ $btnText }}
      <div class="ml-5 p-0" wire:loading wire:target="{{ $btnClickMethod }}">
        <span class="spinner-border spinner-border-sm text-primary" role="status">
        </span>
      </div>
    </div>
    <div>
      <i class="fas fa-angle-down mr-3"></i>
    </div>
  </div>
</button>
