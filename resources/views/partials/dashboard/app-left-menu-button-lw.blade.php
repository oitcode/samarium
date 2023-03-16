<button class="btn
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
            {{--
            {{ env('OC_ASCENT_BTN_COLOR') }}
            --}}
            btn-dark
          @else
            bg-white
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
    border shadow-sm m-0 badge-pill-rm mr-3 w-100 text-left"
    style="font-size: 1.1rem;" wire:click="{{ $btnClickMethod }}">
  <i class="{{ $btnIconFaClass }} mr-3"></i>
  {{ $btnText }}
  <span  class="ml-5" wire:loading>
    ...
  </span>
</button>
