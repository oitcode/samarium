<div>
  <div class="row">
    @foreach ($productCategories as $productCategory)
      <div class="col-md-2">
        <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
            class="text-decoration-none">
          <button class="btn btn-outline-success badge-pill mr-5">
          {{ $productCategory->name }}
          </button>
        </a>
      </div>
    @endforeach
  </div>
</div>
