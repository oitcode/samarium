<div>


  {{-- Show in bigger screens --}}
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
          <div class="p-2-rm bg-light-rm border-rm mr-4" style="">
              <div class="h-100 d-flex flex-column justify-content-center bg-dark text-white px-3" style="{{-- background-color: #aaa; --}}">
                <h1 class="h1 font-weight-bold px-3-rm py-3 mb-0 btn-rm {{  config('app.oc_ascent_btn_color') }}-rm badge-pill-rm p-3-rm">
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
