<div>
  {{-- For bigger screens --}}
  <div class="d-none d-md-block h-100">
  <div
      class="border btn-rm
      @if (true)
      @isset($btnCheckMode)
        @isset ($modes)
          @isset ($modes[$btnCheckMode])
            @if ($modes[$btnCheckMode])
              border-bottom-rm border-danger-rm
              bg-success
              text-white
            @else
              {{--
              @if ($btnText == 'New' || $btnText == 'Create')
                {{ env('OC_ASCENT_BG_COLOR') }} text-white
              @else
                bg-white
              @endif
              --}}
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
      m-0 mr-3 px-4 h-100 o-flipper py-3 d-flex flex-column justify-content-center badge-pill
      @if (false)
      {{--
      @if ($btnText == 'New' || $btnText == 'Create')
        {{ env('OC_ASCENT_BG_COLOR') }}
        {{ env('OC_ASCENT_TEXT_COLOR') }}
        shadow-lg
        badge-pill
      @else
        bg-white
        badge-pill
      @endif
      --}}
      @endif
      "

  
  
      style="font-size: 1.1rem;
      @if (true)
      @isset($btnCheckMode)
        @isset ($modes)
          @isset ($modes[$btnCheckMode])
            @if ($modes[$btnCheckMode])
              {{--
              border-bottom: 5px solid #55a;
              padding-bottom: 10px;
              background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
              color: white;
              color: white;
              background-color: green !important;
              --}}
              {{--
              border: 1px solid {{ env('OC_SELECT_COLOR', '#000050') }} !important;
              --}}
            @endif
          @endisset
        @endisset
      @endisset
      @endif
      "
  
      wire:click="{{ $btnClickMethod }}" role="button">
    <div class="">
      <div class="">
        @if ($btnText != '')
          <i class="{{ $btnIconFaClass }} @if ($btnText != '') mr-2 @endif p-0"></i>
          <strong>
            {{ $btnText }}
          </strong>
        @else
          <i class="{{ $btnIconFaClass }} @if ($btnText != '') mr-2 @endif p-0"></i>
        @endif
      </div>
    </div>
  </div>
  </div>

  {{-- For smaller screens --}}
  <div class="d-md-none">
  <div
      class="btn-rm d-md-none
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
              background-color: {{ env('OC_SELECT_COLOR', '#000050') }};
              color: white;
              --}}
              color: {{ env('OC_SELECT_COLOR', '#000050') }};
              border-left: 10px solid {{ env('OC_SELECT_COLOR', '#000050') }};
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
  </div>


</div>
