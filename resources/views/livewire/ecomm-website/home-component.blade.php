<div>

  {{-- Online store hero --}}
  @if (false)
  @include ('partials.os.hero')
  @endif

  @if (false)
  @include ('partials.ecomm-website.main-flier')
  @endif

  @if (false)
  @include ('partials.ecomm-website.main-hero')
  @endif





  @if (true)
  <div class="container">
    <div class="row">
      <div class="col-md-8 p-3">
        <div class="bg-danger-rm text-white border shadow p-3 h-100" style="background-color: orange;">
          <h2>
            Buy some of the most extraordinary products
          </h2>
          <p class="text-secondary-rm">
            Largest collection of hand made items
          </p>
          <div class="my-5">
            <button class="btn btn-light bg-white-rm">
              Explore more
            </button>
          </div>
        </div>
      </div>
      <div class="col-md-4 p-3">
        <div class="border bg-light-rm shadow p-3 h-100 rounded" style="background-color: #eaeaef;">
          <div class="d-flex">
            <div>
              <p class="text-secondary">
                Thanks for visiting our online store.
              </p>
              <p class="text-secondary">
                Explore our products.
              </p>
              <div class="mt-5 mb-4">
                <a href=""  class="font-weight-bold" style="color: orange;">
                  <span style="font-size: 1.1rem;">
                    Register now
                  </span>
                </a>
              </div>
            </div>
            <div>
              <img class="img-fluid h-25-rm w-100-rm"
                  src="{{ asset('storage/' . $company->logo_image_path) }}"
                  alt="Our image collection"
                  style="{{--max-height: 250px; max-width: 250px;--}}">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif




  {{-- Show product search --}}
  @if (false)
  <div class="container p-3 border mt-4">
    @error ('search_name')
      <div class="py-2 text-danger">
        <i class="fas fa-exclamation-circle mr-3"></i>
        Enter search name
      </div>
    @enderror
    <input type="text" class="mr-3" wire:model.defer="search_name" placeholder="Search product"/>
    <button class="btn btn-success shadow-sm" style="font-size: 1.3rem;" wire:click="search">
      Go
    </button>
  </div>
  @endif

  <div>
  @if (! $modes['searchResult'])
    @if (false)
    {{-- Show products of each product category --}}
    @foreach ($productCategories as $productCategory)
      @if (count($productCategory->products) > 0 || count($productCategory->subProductCategories) > 0)
        <div class="container mt-4">
          @if (false)
          <h2 class="mb-3">
            {{ $productCategory->name }}
          </h2>
          <hr/>
          @endif
          @livewire ('ecomm-website.product-category-product-list', ['productCategory' => $productCategory,],
              key(rand() * $productCategory->product_category_id))
        </div>
      @endif
    @endforeach
    @endif

    {{-- Show this for now --}}
    <div class="container p-5">
      <h2 class="h1 mt-2 mb-1">
        Categories
      </h2>
      <p class="text-secondary">
        Browse our products by category
      </p>
      <div class="row bg-danger-rm">
        @foreach ($productCategories as $productCategory)

          <div class="col-md-3 my-4">
            <div class="h-100 shadow-rm">
              {{-- Show in smaller screens --}}
              <div class="d-md-none">
              </div>
            
              {{-- Show in bigger screens --}}
              <div class="d-none-rm d-md-block-rm h-100">
                <div class="card h-100 shadow border-0">
            
                  <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
                    <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
                      <div class="d-flex justify-content-center bg-warning-rm">
                          @if ($productCategory->image_path)
                            <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{ $productCategory->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
                          @else
                            <i class="fas fa-dice-d6 fa-8x text-muted m-5"></i>
                          @endif
                      </div>
                    </a>
            
                    <div class="d-flex flex-column justify-content-between flex-grow-1 overflow-auto" style="background-color: #f5f5f5;">
                      <div class="p-2">
                        <a href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
                          <h2 class="h4 font-weight-bold mt-2 mb-2 text-dark" style="font-family: Arial;">
                            {{ strtoupper($productCategory->name) }}
                          </h2>
                        </a>
            
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          @if (false)
          <div class="col-md-3 m-0 p-3 border-rm bg-warning-rm">
            <a class="text-reset h-100" href="{{ route('website-product-category-product-list', [$productCategory->product_category_id, $productCategory->name]) }}">
              <div class="d-flex bg-white text-dark border p-3-rm shadow-lg h-100">
                <div class="bg-white text-secondary p-5 flex-grow-1-rm">
                  <div class="d-flex-rm flex-column-rm justify-content-center-rm mr-4-rm bg-danger-rm w-50-rm">
                    @if (false)
                    <i class="fas fa-hashtag fa-2x mr-2 text-warning-rm" style="color: orange;"></i>
                    @endif
                    @if ($productCategory->image_path)
                      <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{ $productCategory->name }}" style="{{--max-height: 250px; max-width: 250px;--}}">
                    @else
                      <i class="fas fa-clone fa-3x"></i>
                    @endif
                  </div>
                  <h2 class="h-100-rm" style="font-family: Mono;">
                    {{ $productCategory->name }}
                  </h2>
                </div>
                @if (false)
                <div class="d-flex justify-content-end">
                  <div class="d-flex flex-column justify-content-center mr-4-rm bg-danger-rm w-50">
                    @if (false)
                    <i class="fas fa-hashtag fa-2x mr-2 text-warning-rm" style="color: orange;"></i>
                    @endif
                    @if ($productCategory->image_path)
                      <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $productCategory->image_path) }}" alt="{{
                      $productCategory->name }}" style="{{--max-height: 250px; max-width: 250px;--}}">
                    @else
                      <i class="fas fa-clone fa-3x"></i>
                    @endif
                  </div>
                </div>
                @endif
              </div>
            </a>
          </div>
          @endif











        @endforeach
      </div>
    </div>

  @else
    @if (false)
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
                @livewire ('website-product-list-display', ['product' => $product,], key(rand() * $product->product_id))
              </div>
            @endforeach
          </div>
        @else
          <div class="p-2 text-secondary" style="font-size: 1.3rem;">
            Not found: {{ $search_name }} 
          </div>
        @endif
      </div>
    </div>
    @endif
  @endif
  </div>
</div>
