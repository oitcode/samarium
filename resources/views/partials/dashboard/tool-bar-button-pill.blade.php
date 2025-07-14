<div>
  {{-- For bigger screens --}}
  <div class="d-none d-md-block h-100">
    <div class="d-flex flex-column justify-content-center h-100">
      <div
          class="border btn-rm
          @isset ($borderLess)
            @if ($borderLess == 'yes')
              border-0
            @endif
          @endisset
          m-0 mr-3 px-4 h-100-rm o-flipper-rm py-2 d-flex flex-column justify-content-center badge-pill-rm rounded-rm text-white-rm o-border-radius
          o-app-left-menu-hl-color-bg o-app-left-menu-hl-color-text
          @isset($btnBsColor)
            {{ $btnBsColor }}-rm
          @else
            o-package-color-rm
          @endisset
          "
          wire:click="{{ $btnClickMethod }}" role="button">
        <div>
          <div>
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
