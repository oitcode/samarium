<div>

  {{-- For big screens --}}
  <div class="d-none d-md-block">
    @if (true)
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
            {{-- Only show top level categories --}}
            @if ($productCategory->parentProductCategory)
              @continue
            @endif
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
        @if (true)
        @foreach ($productCategories as $productCategory)
          <div class="p-0 border-right-rm">
            <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                class="btn btn-success-rm badge-pill-rm font-weight-bold text-white-rm p-3">
              {{ strtoupper($productCategory->name) }}
            </a>
          </div>
        @endforeach
        @endif
        <div class="col-md-2 p-0 m-0 bg-warning-rm border-right-rm">
          <a 
              href="{{ route('website-home') }}"
              class="btn btn-light badge-pill-rm font-weight-bold p-3 text-white-rm"
              wire:click="">
            <i class="fas fa-arrow-right fa-2x-rm mr-2 pt-2"></i>
          </a>
        </div>
      </div>
    @endif
    @endif
  </div>

  {{-- For smaller screens --}}
  <div class="d-md-none">

    @if (true)
    <div class="d-flex justify-content-end border" style="background-color: #eaeaea;">
      @if ($modes['showMobileMenuMode'])
        <div class="p-3">
          <button class="btn btn-danger" wire:click="exitMode('showMobileMenuMode')">
            <i class="fas fa-times fa-2x mr-2"></i>
          </button>
        </div>
      @else
        <div class="p-3">
          <button class="btn btn-danger" wire:click="enterMode('showMobileMenuMode')">
            <i class="fas fa-list fa-2x mr-2"></i>
          </button>
        </div>
      @endif
    </div>

    @if ($modes['showMobileMenuMode'])
      <div class="d-flex flex-column p-0">
        @foreach ($productCategories as $productCategory)
          {{-- Only show top level categories --}}
          @if ($productCategory->parentProductCategory)
            @continue
          @endif
          <div class="p-0 border-bottom" style="background-color: #e0e0e0;">
            <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                class="btn-block text-reset font-weight-bold p-3 text-decoration-none">
              {{ strtoupper($productCategory->name) }}
            </a>
          </div>
        @endforeach
      </div>
    @endif
    @endif
  </div>

</div>
