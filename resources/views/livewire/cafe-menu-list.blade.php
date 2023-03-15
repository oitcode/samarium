<div>
  @if ($modes['productCategoryProductList'])
    @livewire ('cafe-menu-product-category-product-list', ['productCategory' => $selectedProductCategory,])
  @else
    <div class="">

      @if (false)
      <span class="mr-3" role="button" wire:click="enterMode('showFullMenuList')" wire:key="{{ rand() }}" style="text-decoration: underline;">
        Show all
      </span>
      @endif

      <div class="border-rm py-0 my-5 d-flex">
        <input type="text"
            class="mr-5"
            style="height: 50px; font-size: 1.5rem;"
            wire:model.defer="search_product_category"
            wire:keydown.enter="searchProductCategory">
        <button class="btn btn-success" style="font-size: 1.3rem;" wire:click="searchProductCategory">
          Find
        </button>
      </div>

      @if ($products == null || count($products) == 0)
        <div class="row">
          @foreach ($productCategories as $productCategory)
            <div class="col-md-3 border p-2 mr-3 mb-4 shadow {{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }}"
                wire:click="selectCategory('{{ $productCategory->product_category_id }}')"
                wire:key="{{ rand() }}"
                role="button"
                style="{{--background-color: #cfe;--}}">
              <div>
                <h3>
                  {{ $productCategory->name }}
                </h3>
              </div>
              <div class="text-dark-rm">
                <i class="fas fa-shopping-cart mr-1"></i>
                Products: {{ count($productCategory->products) }}
              </div>
            </div>
          @endforeach
        </div>
      @endif
    </div>
  @endif
</div>
