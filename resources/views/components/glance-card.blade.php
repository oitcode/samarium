<div class="p-0 m-0 border o-border-radius o-package-color-rm" style="" role="button">
<div class="o-darker-rm o-border-radius bg-white-rm shadow-sm" style="@isset ($bgColor) background-color: {{ $bgColor }} @endisset">
  <a
      @if ($btnRoute != '')
        href="{{ route($btnRoute) }}"
      @else
        href="#"
      @endif
      class="text-reset text-decoration-none">
    <div class="d-flex {{ $bsBgClass ?? 'bg-success' }}-rm bg-light-rm text-dark-rm p-md-2 m-0 rounded" style="border-radius: 15px !important;">
      <div class="px-3 @if ($bsBgClass != 'bg-white') text-white-rm @endif flex-grow-1 badge-pill d-flex-rm py-4">
        @if (false)
        <div class="d-flex justify-content-between my-2 my-md-4 @if ($bsBgClass != 'bg-white') text-white-rm @else text-white-rm @endif">
          <div class="d-none d-md-block">
            <i class="{{ $iconFaClass }} fa-2x"></i>
          </div>
          <div class="d-none d-md-block">
            <i class="fas fa-ellipsis-v fa-1x"></i>
          </div>
        </div>
        @endif
        <div class="d-flex justify-content-between h6 font-weight-bold my-2 mb-my-4 @if ($bsBgClass != 'bg-white') text-white-rm @else text-white-rm @endif o-heading">
          <span>
            {{ strtoupper($btnTextPrimary) }}
          </span>
          <i class="{{ $iconFaClass }} fa-2x-rm"></i>
        </div>
        <div class="h4 o-heading text-white-rm mt-3">
          {{ $btnTextSecondary }}
        </div>
      </div>
    </div>
  </a>
</div>
</div>
