<button type="submit"
    class="btn btn-success btn-block px-3 py-3 shadow-sm" wire:click="{{ $clickMethod }}"
    {{-- style="background-color: {{ config('app.oc_select_color', '#000050') }}; color: white;" --}} >
  <strong>
    {{ $btnText }}
  </strong>
</button>
