<div class="container p-3 mb-3">
  @if (false)
  <h2>
    Categories
  </h2>
  @endif
  <div class="row">
    @foreach ($productCategories as $productCategory)
        <div class="col-md-2 border p-0">
          <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
            <button class="btn btn-danger w-100 h-100" style="font-size: 1.1rem;">
              {{ $productCategory->name }}
            </button>
          </a>
        </div>
    @endforeach
  </div>
</div>
