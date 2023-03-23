<div>
  @if ($modes['showAllCategoriesMode'])
    <div class="mb-3">
      <button 
          class="btn btn-outline-danger badge-pill"
          wire:click="closeFullMenu">
        Close full menu
      </button>
    </div>
    <div class="row">
      @foreach ($productCategories as $productCategory)
        <div class="col-4 col-md-2 mb-3">
          <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
              class="btn btn-success badge-pill-rm">
            {{ $productCategory->name }}
          </a>
        </div>
      @endforeach
    </div>
  @else
    <div class="d-flex p-0">
      @foreach ($productCategories as $productCategory)
        <div class="col-md-2-rm p-0 mr-2 bg-warning-rm">
          <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
              class="btn btn-success badge-pill">
            {{ $productCategory->name }}
          </a>
        </div>
      @endforeach
      <div class="col-md-2 p-0 m-0 bg-warning-rm">
        <button 
            class="btn btn-outline-success badge-pill"
            wire:click="showAllCategories">
          Show all
        </button>
      </div>
    </div>
  @endif
</div>
