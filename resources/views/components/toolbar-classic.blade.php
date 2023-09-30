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
