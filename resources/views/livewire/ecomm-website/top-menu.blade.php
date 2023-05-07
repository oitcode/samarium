<div>

  {{-- For big screens --}}
  <div class="d-none d-md-block">
    @if ($modes['showAllCategoriesMode'])
      <div class="my-3 p-3">
        <button 
            class="btn btn-danger badge-pill-rm text-white-rm"
            wire:click="closeFullMenu">
          <i class="fas fa-times fa-2x mr-2"></i>
        </button>
      </div>
      <div class="p-3">
        <div class="row mb-4" style="margin: auto;">
          @foreach ($productCategories as $productCategory)
            <div class="col-4 col-md-2 mb-3-rm border-rm border-left mb-5">
              <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                  class="btn-rm btn-success-rm badge-pill-rm text-white">
                {{ $productCategory->name }}
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @else
      <div class="d-flex p-0 bg-warning-rm border-left-rm border-right-rm">
        @foreach ($productCategories as $productCategory)
          <div class="p-0 border-right-rm">
            <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                class="btn btn-success-rm badge-pill-rm font-weight-bold text-white p-3" style="font-size: 1.3rem;">
              {{ strtoupper($productCategory->name) }}
            </a>
          </div>
        @endforeach
        <div class="col-md-2 p-0 m-0 bg-warning-rm border-right-rm">
          <button 
              class="btn btn-dark badge-pill-rm font-weight-bold p-3 text-white"
              style="font-size: 1.3rem";
              wire:click="showAllCategories">
            <i class="fas fa-list fa-2x mr-2"></i>
          </button>
        </div>
      </div>
    @endif
  </div>

  {{-- For smaller screens --}}
  <div class="d-md-none">

    <div class="d-flex justify-content-end">
      @if ($modes['showMobileMenuMode'])
        <div class="p-3">
          <button class="btn btn-success" wire:click="exitMode('showMobileMenuMode')">
            <i class="fas fa-times fa-2x mr-2"></i>
          </button>
        </div>
      @else
        <div class="p-3">
          <button class="btn btn-success" wire:click="enterMode('showMobileMenuMode')">
            <i class="fas fa-list fa-2x mr-2"></i>
            @if (false)
            Menu
            @endif
          </button>
        </div>
      @endif
    </div>

    @if ($modes['showMobileMenuMode'])
      <div class="d-flex flex-column p-0 bg-warning-rm border-left-rm border-right-rm">
        @foreach ($productCategories as $productCategory)
          {{-- Only show top level categories --}}
          @if ($productCategory->parentProductCategory)
            @continue
          @endif
          <div class="p-0 border-right-rm">
            <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                class="btn btn-light btn-block badge-pill-rm font-weight-bold text-white-rm p-3" style="font-size: 1.3rem;">
              {{ strtoupper($productCategory->name) }}
            </a>
          </div>
        @endforeach
      </div>
    @endif
  </div>

</div>
