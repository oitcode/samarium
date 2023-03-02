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

      @if ($products == null || count($products) == 0)
        @if (false)
        <span class="mr-3" role="button" wire:click="selectCategory('{{ $productCategory->product_category_id }}')" wire:key="{{ rand() }}" style="text-decoration: underline;">
          {{ $productCategory->name }}
        </span>
        @endif

        <div class="row">
          @foreach ($productCategories as $productCategory)
            <div class="col-md-3 border p-5 mr-3 mb-4 shadow bg-success text-white"
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
