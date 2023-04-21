<a href="{{ route($btnRoute) }}">
  <div class="d-flex flex-column-rm justify-content-between border {{ $bsBgClass ?? 'bg-success' }}" style="">
    <div class="p-3 text-white flex-grow-1" style="">
      <i class="{{ $iconFaClass }} fa-2x mr-2 mt-1"></i>

      <div class="mt-3-rm h5">
      {{ $btnTextPrimary }}
      </div>
    </div>

    @if ($btnTextSecondary)
      <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker" style="">
        <div class="h3 text-white" style="">
          {{ $btnTextSecondary }}
        </div>
      </div>
    @endif
  </div>
</a>
