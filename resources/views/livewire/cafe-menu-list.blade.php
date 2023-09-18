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

      <div class="bg-white border p-3 mb-4">
        <div class="mb-4">
          <input type="text"
              class="mr-5 h-100 form-control w-50"
              style="{{-- height: 50px; --}} font-size: 1.5rem; background-color: #cfc;"
              wire:model.defer="search_product_category"
              wire:keydown.enter="searchProductCategory"
              autofocus>
        </div>
        <div>
          @include ('partials.button-general', ['clickMethod' => "searchProductCategory", 'btnText' => 'Search',])
        </div>
      </div>

      @if ($products == null || count($products) == 0)
        @if (false)
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

        <div class="table-responsive bg-white">
          <table class="table">
            <thead>
              <tr>
                <th>Category</th>
                <th>Products</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($productCategories as $productCategory)
                <tr>
                  <td wire:click="selectCategory('{{ $productCategory->product_category_id }}')" role="button">
                    <strong>
                      {{ $productCategory->name }}
                    </strong>
                  </td>
                  <td>
                    {{ count($productCategory->products) }}
                  </td>
                  <td>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  @endif
</div>
