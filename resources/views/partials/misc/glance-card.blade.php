<a
    @if ($btnRoute != '')
      href="{{ route($btnRoute) }}"
    @else
      href="#"
    @endif
    class="text-reset text-decoration-none">
  <div class="d-flex flex-column-rm justify-content-between-rm border-rm shadow-rm {{ $bsBgClass ?? 'bg-success' }} bg-danger-rm p-2 m-0 rounded-lg-rm"
      style="border-radius: 25px;">
    <div class="px-3 @if ($bsBgClass != 'bg-white') text-white @endif flex-grow-1 badge-pill" style="">

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

    @if (false)
    @if ($btnTextSecondary)
      <div class="d-flex flex-column justify-content-center p-2 px-3 o-darker-rm" style="">
        <div class="h3 text-primary-rm" style="">
          @if (false)
          <i class="{{ $iconFaClass }} fa-2x-rm mr-2 mt-1 @if ($bsBgClass != 'bg-white') text-white @else text-secondary @endif"></i>
          @endif
        </div>
      </div>
    @endif
    @endif
  </div>
</a>
