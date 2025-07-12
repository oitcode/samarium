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
    m-0 py-2 pt-3-rm w-100 text-left rounded-0 font-weight-bold o-heading
    {{ config('app.app_menu_dropdown_button_text_color') }}-rm
    text-white-rm
    "
    style="color: {{ config('app.app_left_menu_text_color') }}"
    wire:click="{{ $btnClickMethod }}" wire:key="{{ rand() . $btnCheckMode }}">
  <div class="d-flex justify-content-between">
    <div>
      <i class="{{ $btnIconFaClass }} mr-2" style="@isset($iconColor) color: {{ $iconColor }} @endisset"></i>
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
