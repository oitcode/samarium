<button class="btn
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
            btn-success
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
    border shadow-sm m-0 badge-pill mr-3"
    style="font-size: 1.1rem;" wire:click="{{ $btnClickMethod }}">
  <i class="{{ $btnIconFaClass }} mr-3"></i>
  {{ $btnText }}
</button>
