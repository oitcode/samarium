<div>

  {{-- Show only in big screens for now --}}
  <div class="container-fluid bg-light d-none d-md-block py-4">
    <div class="container">
      <div class="row">
        {{-- Product categories --}}
        <div class="col-md-3">
          <div class="d-flex flex-column h-100" >
            <div class="bg-white py-3 flex-grow-1 border rounded">
              <div class="h5 mb-3 pl-3 o-heading">
                Product categories
              </div>
              @php
                $ii = 0;
              @endphp
              @foreach ($productCategories as $productCategory)
                @if ($ii >= 5)
                  @break
                @endif
                <a
                    href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                    class="text-decoration-none text-dark"
                >
                  <div class="px-3 py-2">
                      <button class="btn btn-outline-dark w-100">
                        <span class="h6 font-weight-bold">
                          {{ $productCategory->name }}
                        </span>
                      </button>
                  </div>
                </a>
                @php
                  $ii++;
                @endphp
              @endforeach
              <div class="p-3 border-top text-center">
                <a href="#o-all-categories" class="text-dark">
                <button class="btn btn-danger w-100">
                  See all categories
                </button>
                </a>
              </div>
            </div>
          </div>
        </div>

        {{-- Featured products --}}
        <div class="col-md-9 pt-3">
          <div class="d-flex flex-column h-100">
            <div>
              <h2 class="h5 text-dark o-heading mb-4">
                Featured products
              </h2>
            </div>
            <div class="flex-grow-1">
              <div class="row py-3" style="margin: auto;">
                @foreach (\App\Models\Product::where('featured_product', 'yes')->get() as $product)
                    <div class="col-md-4">
                      <a href="{{ route('website-product-view', [$product->product_id, str_replace(' ', '-', $product->name)]) }}"
                          class="text-decoration-none">
                        <div class="card h-100 border-0">
                          <div class="d-flex flex-column justify-content-between h-100">
                              <div class="d-flex justify-content-center">
                                  @if ($product->image_path)
                                    <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{
                                    $product->name }}" style="max-height: 150px;">
                                  @else
                                    <i class="fas fa-ellipsis-h fa-8x text-muted m-5"></i>
                                  @endif
                              </div>
                            <div class="d-flex flex-column justify-content-end flex-grow-1 overflow-auto">
                              <div class="p-2">
                                  <h2 class="h6 font-weight-bold mt-2 text-dark text-center" style="font-family: Arial;">
                                    {{ ucwords($product->name) }}
                                  </h2>
                                  <div class="mt-0 text-muted h6 font-weight-bold text-center">
                                    @if ($product->selling_price != 0)
                                      Rs
                                      @php echo number_format( $product->selling_price ); @endphp
                                    @else
                                    &nbsp;
                                    @endif
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Show product search --}}
  <div>
    @if (! $modes['searchResult'])

      {{--
      |
      | Most viewed products
      |
      --}}
      <div class="container py-5">
        <h2 class="h5 o-heading mt-2 mb-1">
          Most viewed
        </h2>
        <p class="text-secondary">
          Our most viewed products
        </p>
        <div class="row">
          @foreach (\App\Models\Product::orderBy('website_views', 'desc')->limit('3')->get() as $product)
            <div class="col-6 col-md-4">
              <a href="{{ route('website-product-view', [$product->product_id, str_replace(" ", "-", $product->name)]) }}"
                  class="text-decoration-none"
              >
                <div class="card h-100 border-0">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <div class="d-flex justify-content-center">
                      @if ($product->image_path)
                        <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="{{
                        $product->name }}" style="max-height: 150px;">
                      @else
                        <i class="fas fa-ellipsis-h fa-8x text-muted m-5"></i>
                      @endif
                    </div>
                    <div class="d-flex flex-column justify-content-end flex-grow-1 overflow-auto">
                      <div class="p-2">
                        <h2 class="h6 font-weight-bold mt-2 text-dark text-center" style="font-family: Arial;">
                          {{ ucwords($product->name) }}
                        </h2>
                        <div class="mt-0 text-muted h6 font-weight-bold text-center">
                          @if ($product->selling_price != 0)
                            Rs
                            @php echo number_format( $product->selling_price ); @endphp
                          @else
                          &nbsp;
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>

      {{--
      |
      | Show all product categories
      |
      --}}

      <div class="container py-5" id="o-all-categories">
        <h2 class="h4 o-heading mt-2 mb-1">
          Categories
        </h2>
        <p class="text-secondary">
          Browse our products by category
        </p>
        <div class="row">
          @foreach ($productCategories as $productCategory)
            <div class="col-6 col-md-3 my-4">
              <div class="h-100">
                {{-- Show in bigger screens --}}
                <div class="h-100">
                  <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}"
                      class="text-decoration-none"
                  >
                    <div class="card h-100 shadow border-0">
                      <div class="d-flex flex-column justify-content-between h-100">
                        <div class="d-flex justify-content-center">
                            @if ($productCategory->image_path)
                              <img class="img-fluid" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{ $productCategory->name }}" style="max-height: 150px;">
                            @else
                              <i class="fas fa-ellipsis-h fa-4x text-muted m-5"></i>
                            @endif
                        </div>
                        <div class="d-flex flex-column justify-content-between flex-grow-1 overflow-auto">
                          <div class="pt-2">
                            <h2 class="h6 font-weight-bold mt-2 text-dark text-center py-0 my-0" style="font-family: Arial;">
                              {{ ucwords($productCategory->name) }}
                            </h2>
                          </div>
                          <div class="py-1 px-2 pb-3 text-muted text-center">
                            Products:
                            {{ count($productCategory->products) }}
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @else
    @endif
  </div>

  {{--
  |
  | Testimonials
  |
  --}}

  @if (\App\Models\Testimonial\Testimonial::count() > 0)
    <div class="container-fluid py-5 border bg-light">
      <div class="container">
        <h2 class="h5 o-heading mb-4">
          What our customers say
        </h2>
        @livewire ('testimonial.website.testimonial-list')
      </div>
    </div>
  @endif

</div>
