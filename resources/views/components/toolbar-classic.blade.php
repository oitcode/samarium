<div>

  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block d-md-flex justify-content-between bg-white border">
    <div>
      @isset ($toolbarTitle)
        <div class="h-100 d-flex flex-column justify-content-center bg-warning-rm">
          <h1 class="h4 font-weight-bold px-3 pt-4-rm">
            {{ $toolbarTitle }}
          </h1>
        </div>
      @else
        <div class="h-100 d-flex flex-column justify-content-center bg-warning-rm">
          <h1 class="h4 font-weight-bold px-3 pt-4-rm">
            Component
          </h1>
        </div>
      @endisset
    </div>
    <div class="d-flex">
      {{ $slot }}
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="d-flex justify-content-between mb-4">
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

</div>
