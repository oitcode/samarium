<div>

  <div class="row">
    <div class="col-md-6">
      <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap">
    </div>
    <div class="col-md-6 py-3">
      <h2 class="ml-2 mb-4">
        {{ $product->name }}
      </h2>
      <h3 class="h4 ml-2 mb-3">
        Rs.
        @php echo number_format( $product->selling_price ); @endphp
      </h3>
      <hr />
      <h3 class="h4 ml-2 mb-3">
        {{ $product->description }}
      </h3>
      <button class="btn btn-primary btn-block py-2">
        ADD TO CART
      </button>
    </div>
  </div>
  @if (false)
  <div class="p-3">
    <div class="row">
      <div class="col-md-6">
        <h2 class="my-3">
          Order / Inquiry
        </h2>
        @livewire ('website-product-order', ['product' => $product,])
      </div>
    </div>
  </div>
  @endif
</div>
