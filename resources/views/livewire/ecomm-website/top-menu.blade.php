<div>
  @if ($modes['showAllCategoriesMode'])
    <div class="row">
      @foreach ($productCategories as $productCategory)
        <div class="col-md-2">
          <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
              class="btn btn-success badge-pill">
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
