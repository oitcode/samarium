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
    {{ $productCategory->name }}
  </div>

  <div class="my-3 mb-4 text-scondary">
    Displaying
    {{ count($productCategory->products) }}
    out of
    {{ count($productCategory->products) }}
    products
  </div>

  {{-- Show in smaller screens --}}
  @if (false)
  <div class="d-md-none">
    <div class="table-responsive">
      <table class="table">
        <tbody>
          @foreach ($productCategory->products as $product)
            <tr wire:key="{{ $loop->index * rand() }}">
              <td>
                @if ($product->image_path)
                  <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 75px; height: 75px;">
                @else
                  <div class="h-100 d-flex justify-content-center">
                    <div class="d-flex flex-columns justify-content-center">
                    </div>
                  </div>
                  <i class="fas fa-check-circle fa-2x"></i>
                @endif
              </td>
              <td>
                <div class="mb-3">
                  <a href="{{ route('website-product-view', [$product->product_id, $product->name]) }}">
                    {{ $product->name }}
                  </a>
                </div>
                <div>
                  Rs
                  {{ $product->selling_price }}
                </div>
              </td>
              <td>
                <button href="" class="btn text-danger border-danger"
                    wire:click="addItemToCart({{ $product->product_id }})"
                    wire:key="{{ $loop->index }} * rand() ">
                  <i class="fas fa-shopping-cart"></i>
                  Cart
                <span wire:loading class="spinner-border text-white" role="status" style="font-size: 0.8rem;">
                </span>
                </button>
              </td>
            </tr>
          @endforeach
        <tbody>
      </table>
    </div>
  </div>
  @endif

  {{-- Show in bigger screens --}}
  <div class="d-none-rm d-md-block-rm">
    @if (count($productCategory->products) > 0)
      <div class="row" wire:key="{{ rand() }}">
        @foreach ($productCategory->products as $product)
          <div class="col-6 col-md-3 mb-4">
            @livewire ('website-product-list-display', ['product' => $product,])
          </div>
        @endforeach
      </div>
    @else
      <div class="p-2 text-secondary" style="font-size: 1.3rem;">
        No products
      </div>
    @endif
  </div>

  </div>
</div>
