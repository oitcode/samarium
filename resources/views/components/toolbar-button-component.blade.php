<button class="btn {{ $btnBsClass }} btn-light-rm px-3 mr-5 mr-md-3 m-1 m-md-0  badge-pill border-rm"
    style="border: 2px solid #888;"
    wire:click="{{ $btnClickMethod }}">
  {{ $slot }}
</button>
