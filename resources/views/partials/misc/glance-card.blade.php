<a
    @if ($btnRoute != '')
      href="{{ route($btnRoute) }}"
    @else
      href="#"
    @endif
    class="text-reset text-decoration-none">
  <div class="d-flex flex-column-rm justify-content-between border-rm shadow-rm {{ $bsBgClass ?? 'bg-success' }} p-2 m-0" style="">
    <div class="px-3 @if ($bsBgClass != 'bg-white') text-white @endif flex-grow-1" style="">

      <div class="mb-4 h5">
        {{ $btnTextPrimary }}
      </div>
      <div class="mt-3-rm h5">
        <span class="font-weight-bold h3">
          {{ $btnTextSecondary }}
        </span>
      </div>
    </div>

    @if ($btnTextSecondary)
      <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker-rm" style="">
        <div class="h3 text-primary-rm" style="">
          @if (false)
          <i class="{{ $iconFaClass }} fa-2x-rm mr-2 mt-1 @if ($bsBgClass != 'bg-white') text-white @else text-secondary @endif"></i>
          @endif
        </div>
      </div>
    @endif
  </div>
</a>
