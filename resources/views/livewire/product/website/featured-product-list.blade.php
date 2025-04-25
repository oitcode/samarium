<div>

  <div class="container my-5">
    <h2 class="h4 o-heading text-center">
      Featured properties
    </h2>

    <div class="row my-4" style="margin: auto;">
      @foreach ($featuredProducts as $product)
        @if ($product->show_in_front_end == 'yes')
          <div class="col-md-4 p-3">
            @livewire ('ecomm-website.product-list-display', ['product' => $product,])
          </div>
        @endif
      @endforeach
    </div>
  </div>

</div>
