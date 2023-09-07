<button class="btn
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
            {{--
            {{ env('OC_ASCENT_BTN_COLOR') }}
            btn-dark
            --}}
            o-darker
          @else
            {{ env('OC_ASCENT_BTN_COLOR') }}
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
    m-0 py-3 w-100 text-left rounded-0"
    style="font-size: calc(0.7rem + 0.15vw);" wire:click="{{ $btnClickMethod }}">
  <div class="d-flex justify-content-between">
    <div>
      <strong>
        <i class="{{ $btnIconFaClass }} mr-3"></i>
        {{ $btnText }}
      </strong>
      <span  class="ml-5" wire:loading>
        ...
      </span>
    </div>
    <div>
      <i class="fas fa-angle-down mr-3"></i>
    </div>
  </div>
</button>
