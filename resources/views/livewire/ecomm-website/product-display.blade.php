<div class="p-3-rm">

  <div class="py-1 text-secondary-rm mb-3 h5" style="">
    @if (false)
    <i class="fas fa-home mr-1"></i>
    @endif
    <a class="text-primary-rm text-reset"
        href="{{ route('website-home') }}"
        style="{{-- color: #000; --}}">
      Home
    </a>

    <i class="fas fa-angle-right mx-1"></i>
    <a class="text-primary-rm text-reset"
        href="{{ route('website-product-category-product-list', [$product->productCategory->product_category_id, $product->productCategory->name]) }}"
        style="{{-- color: #000; --}}">
      {{ $product->productCategory->name }}
    </a>

    <i class="fas fa-angle-right  mx-1"></i>
    {{ $product->name }}
  </div>

  <div class="row mb-3 border p-2 py-5-rm  bg-white shadow-rm" style="margin: auto;">
    <div class="col-md-8">
      <div class="row bg-warning-rm">
        <div class="col-md-6">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-start h-100">
              @if ($product->image_path)
                <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 500px; {{--max-width: 100px;--}}">
              @else
                <i class="fas fa-dice-d6 fa-10x text-muted m-5"></i>
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-6 pb-3 pl-3">
          <h1 class="h5 ml-2-rm mb-3 font-weight-bold" style="font-weight: bold;">
            {{ strtoupper($product->name) }}
          </h1>

          <div class="my-3">
            <span class="badge-rm badge-pill-rm badge-success-rm" style="">
              Available
            </span>
            @if (false)
            <span class="badge badge-pill badge-danger">
              Limited stock
            </span>
            @endif
          </div>

          @if (true)
          <div class="mb-3" style="font-size: 0.7rem;">
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <i class="far fa-star" style="color: orange;"></i>
            <span class="mx-1 text-muted">
              (0) reviews
            </span>
          </div>
          @endif

          @if ($product->selling_price != 0)
            <h3 class="h5 ml-2-rm mb-3 text-danger font-weight-bold" style="font-weight: bold;">
              Rs
              @php echo number_format( $product->selling_price ); @endphp
            </h3>
          @endif
          <hr />
          <div class="">
            <h2 class="h6 font-weight-bold text-secondary">
              Product description
            </h2>
            <p class="h6 ml-2-rm mb-3 text-secondary-rm border-top-rm border-bottom-rm">
              {{ $product->description }}
            </p>
          </div>
          @if (true)
          <hr />
          @endif


          <div>
            <button class="btn btn-danger btn-block-rm badge-pill-rm py-3-rm h2-rm h-100-rm w-100 mb-0 p-3 mb-3"
                style="{{-- background-color: #5a0; --}} font-family: Arial;"
                wire:click="addItemToCart({{ $product->product_id }})">
              <span class="h5">
                @if (false)
                <i class="fas fa-plus-circle mr-1"></i>
                @endif
                <i class="fas fa-shopping-cart mr-1"></i>
                @if (true)
                ADD TO
                @endif
                CART
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

        @if (count($product->productSpecifications) > 0)
        {{-- Product specification --}}
        <div class="bg-white p-3 border-rm mb-3">
          <div>
            <div class="mb-3">
              <strong class="text-muted">
                PRODUCT DETAILS
              </strong>
              </br>
              @if (false)
              <strong class="h5">
                {{ $product->name }}
              </strong>
              @endif
            </div>

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
                        <th class="bg-light-rm border-dark" style="{{-- background-color: #eee; --}}">
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
        </div>
        @endif

        {{-- Rating and reviews --}}
        <div class="bg-white p-3 border-rm mb-3">
          <div>
            <div class="mb-3">
              <strong>
                Rating and reviews
              </strong>
            </div>
            <div class="px-3" style="color: orange;">
              <div>
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                (0)
              </div>
              <div>
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                (0)
              </div>
              <div>
                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                (0)
              </div>
              <div>
                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                (0)
              </div>
              <div>
                <i class="fas fa-star"></i>
                (0)
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="col-md-4">

      @if (false)
      <div class="mb-4">
        <h2 class="h6 font-weight-bold text-secondary">
          Delivery
        </h2>
        <div>
          <i class="fas fa-map-marker-alt mr-1"></i>
          + 5 miles | Some place
        </div>
      </div>

      <div class="mb-4">
        <h2 class="h6 font-weight-bold text-secondary">
          Service
        </h2>
        <div>
          <i class="fas fa-dice-d6 mr-1"></i>
          24/7 Working days
        </div>
      </div>

      <div class="mb-4">
        <h2 class="h6 font-weight-bold text-secondary">
          Stats
        </h2>
        <div>
          <i class="fas fa-th mr-1"></i>
          58 views | 91 Likes | 22 Shares
        </div>
      </div>
      @endif

    </div>


  </div>


  @if (false)
  <hr class="mb-5"/>
  @endif

  @if (false)
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
