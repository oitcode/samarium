<a
    @if ($btnRoute != '')
      href="{{ route($btnRoute) }}"
    @else
      href="#"
    @endif
    class="text-reset text-decoration-none">
  <div class="d-flex flex-column-rm justify-content-between-rm border-rm shadow-rm {{ $bsBgClass ?? 'bg-success' }} bg-danger-rm p-2 m-0 rounded-lg-rm"
      style="border-radius: 25px;">
    <div class="px-3 @if ($bsBgClass != 'bg-white') text-white @endif flex-grow-1 badge-pill">

      @if (true)
      <div class="d-flex justify-content-between my-4 @if ($bsBgClass != 'bg-white') text-white @else text-secondary @endif">
        <div>
          <i class="{{ $iconFaClass }} fa-2x"></i>
        </div>
        <div>
          <i class="fas fa-ellipsis-v fa-1x"></i>
        </div>
      </div>
      @endif

      <div class="h6 font-weight-bold mb-4 @if ($bsBgClass != 'bg-white') text-white @else text-secondary @endif">
        @if (strtolower($btnTextPrimary) == 'new')
          <span class="badge badge-pill badge-danger">
          {{ $btnTextPrimary }}
        @else
          {{ $btnTextPrimary }}
        @endif
      </div>
      <div class="mt-3-rm h5">
        <span class="font-weight-bold h5">
          {{ $btnTextSecondary }}
        </span>
      </div>
    </div>

  </div>
</a>
