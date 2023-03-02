<div class="p-3">

  <div class="py-2 text-secondary mb-4" style="font-size: 1.15rem;">
    <i class="fas fa-circle mr-1"></i>
    Products

    <i class="fas fa-angle-right  mx-3"></i>
    {{ $product->productCategory->name }}

    <i class="fas fa-angle-right  mx-3"></i>
    {{ $product->name }}
  </div>

  <div class="row mb-5 border p-2 bg-white shadow">
    <div class="col-md-6">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-center h-100">
          <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 250px;">
        </div>
      </div>
    </div>
    <div class="col-md-6 py-3">
      <h1 class="h4 ml-2 mb-3" style="font-weight: bold;">
        {{ $product->name }}
      </h1>
      <h3 class="h3 ml-2 mb-3" style="font-weight: bold;">
        Rs.
        @php echo number_format( $product->selling_price ); @endphp
      </h3>
      <hr />
      <p class="h5 ml-2 mb-3 text-secondary border-top-rm border-bottom-rm">
        {{ $product->description }}
      </p>
      <hr />
      <div class="d-flex">
        <div class="mt-3-rm mb-3-rm pb-3 mr-4">
          <div class="text-secondary mb-2">
            Quantity
          </div>
          <input type="text" class="py-1" style="font-size: 1.1rem;">
        </div>
        <div class="flex-grow-1 bg-warning-rm">
          <div class="h-100 d-flex flex-column justify-content-center">
            <button class="btn btn-primary btn-block py-3" style="background-color: #004; font-family: Arial;">
              <span class="h5">
                ADD TO CART
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <hr class="mb-5"/>

  @if (true)
  {{-- You may also like section --}}
  <div class="mb-5">
    <h2 class="text-center" style="font-family: Arial;">YOU MAY ALSO LIKE</h2>

    <div class="row">
      <div class="col-md-3">
          @livewire ('website-product-list-display', ['product' => \App\Product::where('product_id', 1)->first(), ])
      </div>
      <div class="col-md-3">
          @livewire ('website-product-list-display', ['product' => \App\Product::where('product_id', 2)->first(), ])
      </div>
      <div class="col-md-3">
          @livewire ('website-product-list-display', ['product' => \App\Product::where('product_id', 3)->first(), ])
      </div>
  @if (false)
      <div class="col-md-3">
          @livewire ('website-product-list-display', ['product' => \App\Product::where('product_id', 4)->first(), ])
      </div>
  @endif
    </div>
  </div>
  @endif

</div>
