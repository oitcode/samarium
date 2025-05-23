<div class="my-1">
  <div class="mb-1 py-3 px-0 d-flex
      @isset ($toolbarAlign)
        @if ($toolbarAlign == 'left')
          justify-content-start
        @else
          justify-content-between
        @endif
      @else
        justify-content-between
      @endisset
      bg-white-rm pl-1
      p-0">
      @if (true || isset($toolbarTitle) && (isset($titleNone) && $titleNone != 'yes'))
        @if ($toolbarTitle != '')
          <div class="mr-4" style="">
            <div class="h-100 d-flex flex-column justify-content-center">
              <h1 class="h4 o-heading py-3 mb-0">
                {{ $toolbarTitle }}
              </h1>
            </div>
          </div>
        @endif
      @else
      @endisset
    <div class="d-flex">
      {{ $slot }}
    </div>
  </div>
</div>
