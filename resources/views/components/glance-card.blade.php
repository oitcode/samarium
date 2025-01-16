<div class="p-0 m-0" role="button">
  <a
      @if ($btnRoute != '')
        href="{{ route($btnRoute) }}"
      @else
        href="#"
      @endif
      class="text-reset text-decoration-none">
    <div class="d-flex {{ $bsBgClass ?? 'bg-success' }} p-2 m-0"
        style="border-radius: 25px;">
      <div class="px-3 @if ($bsBgClass != 'bg-white') text-white @endif flex-grow-1 badge-pill">
        <div class="d-flex justify-content-between my-4 @if ($bsBgClass != 'bg-white') text-white @else text-secondary @endif">
          <div>
            <i class="{{ $iconFaClass }} fa-2x"></i>
          </div>
          <div>
            <i class="fas fa-ellipsis-v fa-1x"></i>
          </div>
        </div>
        <div class="h6 font-weight-bold mb-4 @if ($bsBgClass != 'bg-white') text-white @else text-secondary @endif o-heading">
          {{ $btnTextPrimary }}
        </div>
        <div class="h5 font-weight-bold">
          {{ $btnTextSecondary }}
        </div>
      </div>
    </div>
  </a>
</div>
