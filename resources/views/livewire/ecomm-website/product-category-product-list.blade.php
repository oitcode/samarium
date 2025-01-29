<div>

  {{-- Breadcrumb --}}
  <div class="py-1">
    <a class="text-reset" href="{{ route('website-home') }}">
      Home
    </a>
    <i class="fas fa-angle-right  mx-1"></i>
    <a class="text-reset"
        href=""
        style="{{-- color: #000; --}}">
      {{ $productCategory->name }}
    </a>
  </div>
  <div class="container mt-4 bg-warning p-0">
    <div class="m-0 p-0">
      <div class="p-0">
        <div class="d-flex justify-content-center h-100" style="background-color: #eaeaea;">
          <div class="d-flex flex-column justify-content-center h-100">
            <h2 class="mt-3">
              {{ $productCategory->name }}
            </h2>
            <p class="text-secondary">
              Total products:
              {{ count($productCategory->products) }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div>
    {{-- First deal with its sub product categories --}}
    @if ($productCategory->subProductCategories)
      @foreach ($productCategory->subProductCategories as $subProductCategory)
        @livewire ('ecomm-website.product-category-product-list-l1', ['productCategory' => $subProductCategory,], key(rand()))
      @endforeach
    @endif

    {{-- Now deal with its products --}}
    @if (count($productCategory->products) > 0)
      @if ($productCategory->subProductCategories)
        <div class="my-3 py-3">
          &nbsp;
        </div>
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
      <div class="p-2 text-secondary">
        No products
      </div>
    @endif
  </div>

</div>
