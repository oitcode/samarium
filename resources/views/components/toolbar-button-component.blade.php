<button class="btn {{ $btnBsClass }} btn-light-rm px-3 mr-md-3 m-md-0  badge-pill border-rm text-nowrap"
    style="border: 2px solid #888;"
    wire:click="{{ $btnClickMethod }}">
  {{ $slot }}
</button>
