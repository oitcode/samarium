<div>
  <div class="container">
    <div class="my-3 text-scondary">
      Displaying
      {{ count($products) }}
      out of
      {{ count($products) }}
      products
    </div>

    @if (count($products) > 0)
      <div class="row">
        @foreach ($products as $product)
          <div class="col-md-4 mb-4">
            @livewire ('website-product-list-display', ['product' => $product,])
          </div>
        @endforeach
      </div>
    @else
      <div class="p-2 text-secondary" style="font-size: 1.3rem;">
        No products
      </div>
    @endif
  </div>
</div>
