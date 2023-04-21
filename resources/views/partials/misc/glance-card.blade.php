<a href="{{ route($btnRoute) }}">
  <div class="d-flex flex-column-rm justify-content-between border bg-success" style="{{-- background-color: #254; --}}">
    <div class="p-3 bg-primary-rm text-white flex-grow-1 d-flex-rm" style="{{-- color: #ccc; --}}">
      <i class="{{ $iconFaClass }} fa-2x mr-2 mt-1"></i>

      <div class="mt-3-rm h5">
      {{ $btnTextPrimary }}
      </div>
    </div>

    @if ($btnTextSecondary)
      <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker" style="{{-- background-color: #456; --}}">
        <div class="h3 text-white" style="{{-- color: #ddd; --}}">
          {{ $btnTextSecondary }}
        </div>
      </div>
    @endif
  </div>
</a>
