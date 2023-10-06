<button type="submit"
    class="btn
        @isset ($btnColor)
           btn-light
        @else
        @endisset
        px-3 py-3
    "
    wire:click="{{ $clickMethod }}"
    style="font-size: 1.1rem ;
        @isset ($btnColor)
        @else
          background-color: {{ env('OC_SELECT_COLOR', '#000050') }}; color: white;
        @endisset
    ;">
  <strong>
    {{ $btnText }}
  </strong>
</button>
