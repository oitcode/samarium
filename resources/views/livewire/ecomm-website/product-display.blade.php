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

  <div class="row mb-3 border p-2 py-5-rm shadow-rm pt-3 bg-white" style="margin: auto;">
    <div class="col-md-8">
      <div class="row bg-warning-rm">
        <div class="col-md-6 mb-4">
          <div class="d-flex justify-content-center h-100">
            <div class="d-flex flex-column justify-content-start h-100">
              @if ($product->image_path)
                <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 500px; {{--max-width: 100px;--}}">
              @else
                <i class="fas fa-ellipsis-h fa-10x text-muted m-5"></i>
              @endif
            </div>
          </div>
        </div>
        <div class="col-md-6 pb-3 pl-3">
          <h1 class="h5 ml-2-rm mb-3 font-weight-bold" style="font-weight: bold;">
            {{ strtoupper($product->name) }}
          </h1>

          @if (false)
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
          @endif

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
            @if (false)
            <span class="mx-3 text-secondary">
            53 views
            </span>
            @endif
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

        @if (false)
        {{-- Features --}}
        <div class="bg-white px-3 border-rm mb-3-rm">
          <div>
            <div class="mb-3">
              <strong>
                Features
              </strong>
            </div>
            <div class="px-3" style="">
              <ul class="pl-0">
                <li>Metal body</li>
                <li>Robust and durable </li>
                <li>Rust free</li>
                <li>Quality check passed</li>
                <li>ISO:9001 certified</li>
              </ul>
            </div>
          </div>
        </div>

        <hr />
        @endif


        {{-- Product specification --}}
        @if (count($product->productSpecifications) > 0)
        <div class="bg-white p-3-rm border-rm mb-3">
          <div>
            @if (false)
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
            @endif

            @if (count($product->productSpecifications) > 0)
              <div class="mb-5-rm">
                <div class="mt-4">
                  <h3 class="h6 font-weight-bold ml-2 mb-3" style="font-weight: bold;">
                    Specifications
                  </h3>
                </div>
                <div class="table-responsive border-rm mb-0">
                  <table class="table table-bordered mb-0">
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
        <hr />
        @endif

        @if (false)
        {{-- Youtube video --}}
        <div class="bg-white p-3-rm border-rm mb-3">
          <div>
            <div class="mb-2">
              <strong>
                Video preview
              </strong>
            </div>

            <div class="col-md-12">
               <iframe class="w-100" height="315" src="https://www.youtube.com/embed/v=vabnZ9-ex7o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        @endif

        <hr />


        {{-- Rating and reviews --}}
        <div class="bg-white p-3-rm border-rm mb-3">
          <div>
            <div class="mb-2">
              <strong>
                Rating and reviews
              </strong>
            </div>
            @if (false)
            <div class="mb-3">
              <a href="">Add your review</a>
            </div>
            @endif
            <div class="px-3-rm" style="color: orange;">
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

        <hr />

        {{-- Questions and answers --}}
        <div class="bg-white p-3-rm border-rm mb-3">
          <div>
            <div class="mb-2">
              <strong>
                Question and answers
              </strong>
            </div>
            @if (false)
            <div>
              <a href="">Ask a question</a>
            </div>
            @endif
          </div>
        </div>

        @if (false)
        <hr />

        {{-- Share --}}
        <div class="mb-4">
          <div class="mb-3">
            <strong>
              Share
            </strong>
          </div>
          <div>
            <i class="fab fa-facebook fa-2x mr-4"></i>
            <i class="fab fa-whatsapp fa-2x mr-4"></i>
            <i class="fab fa-viber fa-2x mr-4"></i>
          </div>
        </div>
        @endif
    </div>

    <div class="col-md-4">


      @if (true)
      <div class="mb-4">
        <h2 class="h6 font-weight-bold text-secondary">
          Stock
        </h2>
        <div>
          <i class="fas fa-check-circle mr-1 text-success"></i>
          Available
        </div>
      </div>

      <div class="mb-4">
        <h2 class="h6 font-weight-bold text-secondary">
          Shipping
        </h2>
        <div>
          <i class="fas fa-check-circle mr-1 text-success"></i>
          Available
        </div>
      </div>

      @if (false)
      <div class="mb-4">
        <h2 class="h6 font-weight-bold text-secondary">
          Return
        </h2>
        <div>
          <i class="fas fa-times-circle mr-1 text-danger"></i>
          No return
        </div>
      </div>
      @endif
      @endif

    </div>


  </div>


  @if (false)
  <hr class="my-5"/>
  @endif

  @if (true)
  {{-- You may also like section --}}
  <div class="my-5 px-3 pt-3 bg-white border shadow">
    <h2 class="h5 font-weight-bold text-center-rm mt-2 mb-4" style="font-family: Arial;">
      YOU MAY ALSO LIKE
    </h2>

    @livewire ('ecomm-website.product-category-random-product-list', ['productCategory' => $product->productCategory,])

  </div>
  @endif

</div>
