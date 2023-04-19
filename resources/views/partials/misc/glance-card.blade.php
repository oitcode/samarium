<a href="{{ route($btnRoute) }}">
  <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;" >
    <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
      <i class="{{ $iconFaClass }} fa-2x mr-2 mt-1"></i>

      <div class="mt-3-rm h5">
      {{ $btnTextPrimary }}
      </div>
    </div>

    @if ($btnTextSecondary)
      <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
        <div class="h3" style="color: #556;">
          {{ $btnTextSecondary }}
        </div>
      </div>
    @endif
  </div>
</a>
