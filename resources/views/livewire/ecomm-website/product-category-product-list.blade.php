<div class="p-3-rm border-rm bg-warning-rm">

  {{-- Breadcrumb --}}
  <div class="py-1 text-secondary mb-4-rm" style="font-size: 1.15rem;">
    <a class="text-primary-rm"
        href="{{ route('website-home') }}"
        style="{{-- color: #000; --}}">
      Home
    </a>

    <i class="fas fa-angle-right  mx-1"></i>
    <a class="text-primary-rm"
        href=""
        style="{{-- color: #000; --}}">
      {{ $productCategory->name }}
    </a>
  </div>
  @if (true)
  <div class="container">
    <div class="row">
      <div class="col-md-8 p-3">
        <div class="d-flex justify-content-center h-100" style="background-color: #eaeaea;">
          <div class="d-flex flex-column justify-content-center h-100">
            <h2 class="text-white-rm mt-3" style="font-size: 2rem;">
              {{ $productCategory->name }}
            </h2>
            <p class="text-secondary">
              Please see our products
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4 p-3">
        <div class="border bg-light-rm shadow p-3 h-100 rounded" style="{{--background-color: #eaeaef;--}}">
          <div class="d-flex">
            <div>
              @if (false)
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
              @endif
            </div>
            <div>
              <img class="img-fluid-rm h-25-rm w-100-rm"
                  src="{{ asset('storage/' . $productCategory->image_path) }}"
                  alt="{{ $productCategory->name }}"
                  style="max-height: 150px; max-width: 100px;">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif




  @if (false)
  <div class="bg-danger-rm text-white-rm py-3 px-2 pl-3-rm border-rm shadow-sm-rm d-flex justify-content-center"
      style="background-color: #efefef; {{-- color: #555;  border: 10px solid #aaf;font-size: 1.15rem; border-left: 10px solid brown;--}} ">
    <div class="" style=" {{-- background-color: white; color: black;--}} ">
      <div class="h2 font-weight-bold pt-3 text-center">
        @if (false)
        <i class="fas fa-chevron-right mx-1"></i>
        @endif
        {{ $productCategory->name }}
      </div>
      <div class="text-secondary text-center">
        Total products: 14
      </div>
    </div>
  </div>
  @endif

  {{-- Show in bigger screens --}}
  <div class="d-none-rm d-md-block-rm">

    {{-- First deal with its sub product categories --}}
    @if ($productCategory->subProductCategories)
      @foreach ($productCategory->subProductCategories as $subProductCategory)
        @livewire ('ecomm-website.product-category-product-list-l1', ['productCategory' => $subProductCategory,], key(rand()))
      @endforeach
    @endif

    {{-- Now deal with its products --}}
    @if (true)
    @if (count($productCategory->products) > 0)
      @if (true)
      @if ($productCategory->subProductCategories)
        <div class="my-3 bg-danger-rm py-3" style="{{-- background-color: #eaeaea; color: black; --}}">
          &nbsp;
        </div>
      @endif
      @endif

      <div class="row" wire:key="{{ rand() }}">
        @foreach ($productCategory->products as $product)

          {{-- Do not display inactive products --}}
          @if ($product->is_active == 0)
            @continue
          @endif

          {{-- Do not display base products --}}
          @if ($product->is_base_product == 1)
            @continue
          @endif

          {{-- Do not display products show_in_front_end is not yes --}}
          @if ($product->show_in_front_end != 'yes')
            @continue
          @endif


          <div class="col-6 col-md-3 mb-4">
            @livewire ('ecomm-website.product-list-display', ['product' => $product,])
          </div>
        @endforeach
      </div>
    @else
      <div class="p-2 text-secondary" style="font-size: 1.3rem;">
        No products
      </div>
    @endif
    @endif
  </div>

  </div>
</div>
