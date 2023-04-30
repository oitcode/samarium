<div class="bg-warning-rm">
  @if ($modes['showAllCategoriesMode'])
    <div class="my-3 p-3">
      <button 
          class="btn btn-light badge-pill-rm text-white-rm"
          wire:click="closeFullMenu">
        Close full menu
      </button>
    </div>
    <div class="p-3">
      <div class="row mb-4" style="margin: auto;">
        @foreach ($productCategories as $productCategory)
          <div class="col-4 col-md-2 mb-3-rm border-rm">
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
        <div class="p-0 border-right">
          <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
              class="btn btn-success-rm badge-pill-rm font-weight-bold text-white p-3" style="font-size: 1.3rem;">
            {{ $productCategory->name }}
          </a>
        </div>
      @endforeach
      <div class="col-md-2 p-0 m-0 bg-warning-rm border-right">
        <button 
            class="btn btn-outline-success-rm badge-pill-rm font-weight-bold p-3 text-white"
            style="font-size: 1.3rem";
            wire:click="showAllCategories">
          Show all
        </button>
      </div>
    </div>
  @endif
</div>
