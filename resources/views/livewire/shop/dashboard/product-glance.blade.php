<div class="bg-white border">
  @if (true)
  <div class="d-flex justify-content-between">
    <div class="pt-3 pl-3 border-rm">
      <h2 class="h6 font-weight-bold">
        <i class="fas fa-book mr-1"></i>
        Products
      </h2>
    </div>

    <div class="d-flex">
      <div>
        <i class="fas fa-cog mr-3 mt-3"></i>
      </div>
    </div>

  </div>
  @endif



  {{-- First row --}}
  <div class="row pb-2" style="margin: auto;">

    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('sale') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;" >
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-dice-d6 fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Products
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $productCount }}
            </div>
          </div>
        </div>
      </a>
    </div>

    @if (true)
    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-purchase') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;">
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-list fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Categories
            </div>
          </div>
          <div class="d-flex flex-column justify-content-center p-2 px-3" style="background-color: #ccd;">
            <div class="h3" style="color: #556;">
              {{ $productCategoryCount }}
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-md-4 p-2 m-0" role="button">
      <a href="{{ route('dashboard-expense') }}">
        <div class="d-flex flex-column-rm justify-content-between border" style="background-color: #eee;">
          <div class="p-3 bg-primary-rm text-white-rm flex-grow-1 d-flex-rm" style="color: #779;">
            <i class="fas fa-dolly fa-2x mr-2 mt-1"></i>

            <div class="mt-3-rm h5">
            Inventory
            </div>
          </div>
        </div>
      </a>
    </div>
    @endif

  </div>

  @if (true)
  <div class="my-2 px-2 text-secondary">
    Powred by <a href="">Oztrich</a>
  </div>
  @endif
</div>
