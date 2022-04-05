<div>
  <div class="my-3 text-scondary">
    Displaying
    {{ count($productCategory->products) }}
    out of
    {{ count($productCategory->products) }}
    products
  </div>

  {{-- Show in smaller screens --}}
  <div class="d-md-none">
    <div class="table-responsive">
      <table class="table">
        <tbody>
          @foreach ($productCategory->products as $product)
            <tr>
              <td>
                <img src="{{ asset('storage/' . $product->image_path) }}" class="mr-3" style="width: 75px; height: 75px;">
              </td>
              <td>
                <div class="mb-3">
                  {{ $product->name }}
                </div>
                <div>
                  Rs
                  {{ $product->selling_price }}
                </div>
              </td>
              <td>
                <button href="" class="btn text-danger border-danger"
                  wire:click="$emit('updateProduct', {{ $product->product_id }})">
                  <i class="fas fa-shopping-cart"></i>
                  Cart
                </button>
              </td>
            </tr>
          @endforeach
        <tbody>
      </table>
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div class="d-none d-md-block">
    @if (count($productCategory->products) > 0)
      <div class="row">
        @foreach ($productCategory->products as $product)
          <div class="col-md-4 mb-4">
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
