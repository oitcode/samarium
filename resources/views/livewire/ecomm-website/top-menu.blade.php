<div>
  <div class="row p-0">
    @foreach ($productCategories as $productCategory)
      <div class="col-md-2 p-0 m-0 bg-warning-rm">
        <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
            class="btn btn-success">
          {{ $productCategory->name }}
        </a>
      </div>
    @endforeach
    <div class="col-md-2 p-0 m-0 bg-warning-rm">
      <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
          class="">
        Show all
      </a>
    </div>
  </div>
</div>
