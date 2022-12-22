<div>

  <div class="row mb-5">
    <div class="col-md-6">
      <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
    </div>
    <div class="col-md-6 py-3">
      <h2 class="ml-2 mb-4" style="font-weight: bold;">
        {{ $product->name }}
      </h2>
      <h3 class="h4 ml-2 mb-4" style="font-weight: bold;">
        Rs.
        @php echo number_format( $product->selling_price ); @endphp
      </h3>
      <hr />
      <h3 class="h4 ml-2 mb-3 text-secondary border-top-rm border-bottom-rm">
        {{ $product->description }}
      </h3>
      <hr />
      <div class="mt-3 mb-3 py-3">
        <div class="text-secondary mb-2">
          Quantity
        </div>
        <input type="text" class="py-2">
      </div>
      <button class="btn btn-primary btn-block py-3" style="font-family: Arial;">
        <span class="h5">
          ADD TO CART
        </span>
      </button>
      {{-- You may also like section --}}
      <div class="my-5 py-3 border-top border-bottom">
        <h2 class="h5 text-center" style="font-family: Arial;">
        MORE INFORMATION
        <i class="fas fa-angle-right ml-3"></i>
        </h2>
      </div>
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

  <hr class="mb-5"/>

  {{-- You may also like section --}}
  <div class="mb-5">
    <h2 class="text-center" style="font-family: Arial;">YOU MAY ALSO LIKE</h2>
  </div>

</div>
