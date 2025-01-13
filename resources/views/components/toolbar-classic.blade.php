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
      bg-white pl-3
      p-0">
      @if (true || isset($toolbarTitle) && (isset($titleNone) && $titleNone != 'yes'))
        @if ($toolbarTitle != '')
          <div class="mr-4" style="">
              <div class="h-100 d-flex flex-column justify-content-center bg-dark-rm text-muted-rm px-3-rm">
                <h1 class="h4 font-weight-bold-rm py-3 mb-0" style="font-weight: 900; font-family: arial; color: #123;">
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
