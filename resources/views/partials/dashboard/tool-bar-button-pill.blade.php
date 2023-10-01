<div
    class="btn-rm
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
    border-rm shadow-rm m-0 badge-pill-rm mr-4-rm px-4 h-100 border-none shadow-none o-flipper py-3 d-flex flex-column justify-content-center rounded"


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
            background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
            color: white;
          @endif
        @endisset
      @endisset
    @endisset
    @endif
    "

    wire:click="{{ $btnClickMethod }}" role="button">
  <div class="">
    <div class="d-flex justify-content-center">
      <i class="{{ $btnIconFaClass }} mr-2"></i>
    </div>
    <div class="d-flex justify-content-center">
      <strong>
        {{ $btnText }}
      </strong>
    </div>
  </div>
</div>
