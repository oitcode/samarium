<button class="btn
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
            @if (false)
            {{ env('OC_ASCENT_BTN_COLOR') }}
            @endif
          @else
            @if (false)
            {{ env('OC_ASCENT_BTN_COLOR') }}
            @endif
          @endif
        @else
          bg-white
        @endisset
      @else
        bg-white
      @endisset
    @else
      bg-white
    @endisset
    m-0 py-3 w-100 text-left rounded-0 font-weight-bold text-white"
    style="font-size: calc(0.7rem + 0.15vw); " wire:click="{{ $btnClickMethod }}" wire:key="{{ rand() + $btnCheckMode }}">
  <div class="d-flex justify-content-between">
    <div>
      <strong>
        <i class="{{ $btnIconFaClass }} text-muted-rm mr-2"></i>
      </strong>
      <strong style="{{-- text-shadow: 0.5px 0 {{ env('OC_UNSELECT_TXT_COLOR') }}; font-weight:bold; --}}">
        {{ $btnText }}
      </strong>
      <div class="ml-5 p-0" wire:loading wire:target="{{ $btnClickMethod }}">
        <span class="spinner-border spinner-border-sm text-primary" role="status" style="font-size: 0.5rem; !important">
        </span>
      </div>
    </div>
    <div>
      <i class="fas fa-angle-down mr-3"></i>
    </div>
  </div>
</button>
