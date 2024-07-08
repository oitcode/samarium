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
      p-0">
      @if (isset($toolbarTitle) && (isset($titleNone) && $titleNone != 'yes'))
        @if ($toolbarTitle != '')
          <div class="p-2-rm bg-light-rm border-rm" style="">
              <div class="h-100 d-flex flex-column justify-content-center bg-warning-rm">
                <h1 class="h1 font-weight-bold px-3-rm py-3 mb-0 btn-rm {{  env('OC_ASCENT_BTN_COLOR') }}-rm badge-pill-rm p-3-rm" style="font-size: 1.2rem;">
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

  {{-- Show in smaller screens --}}
  @if (false)
  <div class="d-md-none d-flex justify-content-between mb-4">
    <div>
      <div class="dropdown">
        <button class="btn btn-light p-3 border shadow-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-list"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          @if (false)
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>
          @endif
          {{ $slot }}
        </div>
      </div>
    </div>
    <div class="">
      <div class="d-flex flex-column justify-content-center h-100 bg-warning-rm">
        @isset ($toolbarTitle)
          <div class="h-100 d-flex flex-column justify-content-center bg-warning-rm">
            <h1 class="h5 font-weight-bold px-3 pt-4-rm">
              {{ $toolbarTitle }}
            </h1>
          </div>
        @else
          <div class="h-100 d-flex flex-column justify-content-center bg-warning-rm">
            <h1 class="h5 font-weight-bold px-3 pt-4-rm">
              Component
            </h1>
          </div>
        @endisset
      </div>
    </div>
  </div>
  @endif


</div>
