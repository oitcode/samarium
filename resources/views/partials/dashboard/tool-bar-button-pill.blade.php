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
              bg-primary
              text-white
            @else
              {{--
              @if ($btnText == 'New' || $btnText == 'Create')
                {{ config('app.oc_ascent_bg_color') }} text-white
              @else
                bg-white
              @endif
              --}}
              bg-primary
            @endif
          @else
            bg-primary
          @endisset
        @else
          bg-primary
        @endisset
      @else
        bg-primary
      @endisset
      @endif

      @isset ($borderLess)
        @if ($borderLess == 'yes')
          border-0
        @endif
      @endisset

      m-0 mr-3 px-4 h-100 o-flipper py-1 d-flex flex-column justify-content-center badge-pill-rm rounded text-white
      @isset($btnBsColor)
        {{ $btnBsColor }}
      @endisset
      "
  
      style="
      @if (true)
      @isset($btnCheckMode)
        @isset ($modes)
          @isset ($modes[$btnCheckMode])
            @if ($modes[$btnCheckMode])
              {{--
              border-bottom: 5px solid #55a;
              padding-bottom: 10px;
              background-color: {{ config('app.oc_select_color', '#000050') }};
              color: white;
              color: white;
              background-color: green !important;
              --}}
              {{--
              border: 1px solid {{ config('app.oc_select_color', '#000050') }} !important;
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
      class="btn btn-primary d-md-none m-0 px-4 h-100 border-none shadow-none o-flipper-rm py-3 d-flex flex-column justify-content-center rounded"
      wire:click="{{ $btnClickMethod }}" role="button">
    <div class="">
        <i class="{{ $btnIconFaClass }} mr-2"></i>
        <strong>
          {{ $btnText }}
        </strong>
    </div>
  </div>
  </div>

</div>
