<div class="p-3">

  <div class="py-2 text-secondary-rm mb-4" style="font-size: 1.15rem;">
    <i class="fas fa-home mr-1"></i>
    <a class="text-primary-rm"
        href="{{ route('website-home') }}"
        style="color: #000;">
      <i class="fas fa-dot text-info mr-2"></i>
      Products
    </a>

    <i class="fas fa-angle-right  mx-1"></i>
    <a class="text-primary-rm"
        href="{{ route('website-product-category-product-list', [$product->productCategory->product_category_id, $product->productCategory->name]) }}"
        style="color: #000;">
      {{ $product->productCategory->name }}
    </a>

    <i class="fas fa-angle-right  mx-1"></i>
    {{ $product->name }}
  </div>

  <div class="row mb-5 border p-2 py-5  bg-white shadow">
    <div class="col-md-3">
      <div class="d-flex justify-content-center h-100">
        <div class="d-flex flex-column justify-content-start h-100">
          @if ($product->image_path)
            <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
          @else
            <i class="fas fa-dice-d6 fa-10x text-muted m-5"></i>
          @endif
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
      <p class="h5 ml-2 mb-3 text-secondary-rm border-top-rm border-bottom-rm">
        {{ $product->description }}
      </p>
      @if (false)
      <hr />
      @endif

      @if (count($product->productSpecifications) > 0)
        <hr />
        <div class="mb-5">
          <div class="mt-4">
            <h3 class="h5 ml-2 mb-3" style="font-weight: bold;">
              Specifications
            </h3>
          </div>
          <div class="table-responsive border-rm">
            <table class="table mb-0">
              @foreach ($product->productSpecifications as $spec)
                <tr class="">
                  <th class="bg-light-rm border-dark" style="background-color: #eee;">
                    {{ $spec->spec_heading }}
                  </th>
                  <td class="bg-success-rm text-white-rm border-dark">
                    {{ $spec->spec_value }}
                  </td>
                </tr>
              @endforeach
            </table>
          </div>
        </div>
      @endif
    </div>
    <div class="col-md-3">
      <div class="d-flex">
        @if (false)
        <div class="mt-3-rm mb-3-rm pb-3 mr-4">
          <div class="text-secondary mb-2">
            Quantity
          </div>
          <input type="text" class="py-1" style="font-size: 1.1rem;">
        </div>
        @endif
        <div class="flex-grow-1 bg-warning-rm">
          <div class="h-100 d-flex flex-column justify-content-center">
            <button class="btn btn-primary btn-block badge-pill py-3 h5"
                style="background-color: #5a0; font-family: Arial;"
                wire:click="addItemToCart({{ $product->product_id }})">
              <span class="h5">
                <i class="fas fa-shopping-cart mr-1"></i>
                ADD TO CART
              </span>
            </button>
            {{-- Loading spinner --}}
            <span wire:loading class="spinner-border text-info mr-3"
                role="status"
                style="font-size: 1rem;">
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (false)
  <hr class="mb-5"/>
  @endif

  @if (true)
  {{-- You may also like section --}}
  <div class="my-5 pt-5">
    <h2 class="text-center mb-5" style="font-family: Arial;">YOU MAY ALSO LIKE</h2>

    <div class="row">
      <div class="col-md-3">
          @livewire ('ecomm-website.product-list-display', ['product' => \App\Product::where('product_id', 1)->first(), ])
      </div>
      <div class="col-md-3">
          @livewire ('ecomm-website.product-list-display', ['product' => \App\Product::where('product_id', 2)->first(), ])
      </div>
      <div class="col-md-3">
          @livewire ('ecomm-website.product-list-display', ['product' => \App\Product::where('product_id', 3)->first(), ])
      </div>
  @if (false)
      <div class="col-md-3">
          @livewire ('ecomm-website.product-list-display', ['product' => \App\Product::where('product_id', 4)->first(), ])
      </div>
  @endif
    </div>
  </div>
  @endif

</div>
