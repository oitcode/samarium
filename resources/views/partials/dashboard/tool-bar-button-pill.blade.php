<div class="btn-rm
    @if (false)
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
            border-bottom-rm border-danger-rm
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
    @endif
    border-rm shadow-rm m-0 badge-pill-rm mr-4 px-3 h-100 border-none shadow-none o-flipper py-3"
    style="font-size: 1.1rem;

    @if (true)
    @isset($btnCheckMode)
      @isset ($modes)
        @isset ($modes[$btnCheckMode])
          @if ($modes[$btnCheckMode])
            {{--
            border-bottom: 5px solid #55a;
            padding-bottom: 10px;
            --}}
            background-color: #55a;
            color: white;
          @endif
        @endisset
      @endisset
    @endisset
    @endif
    "

    wire:click="{{ $btnClickMethod }}" role="button">
  <i class="{{ $btnIconFaClass }} mr-2"></i>
  <strong>
    {{ $btnText }}
  </strong>
</div>
