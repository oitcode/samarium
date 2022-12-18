<div class="h-100">
  {{-- Show in bigger screens --}}
  <div class="d-md-none">
  </div>
  {{-- Show in bigger screens --}}
  <div class="d-none d-md-block h-100">
    <div class="card h-100 shadow">

      <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
        <div class="p-0">
          <img class="img-fluid" src="{{ asset('storage/' . $product->image_path) }}" alt="Card image cap" style="{{--max-height: 100px; max-width:
          100px;--}}">
        </div>
        <div class="d-flex flex-column justify-content-between flex-grow-1 overflow-auto">
          <div class="p-2">
            <div class="mb-1">
              <i class="far fa-star" style="color: orange;"></i>
              <i class="far fa-star" style="color: orange;"></i>
              <i class="far fa-star" style="color: orange;"></i>
              <i class="far fa-star" style="color: orange;"></i>
              <i class="far fa-star" style="color: orange;"></i>
              <span class="mx-1 text-muted">
                (0) reviews
              </span>
            </div>
            <a href="{{ route('website-product-view', [$product->product_id, $product->name]) }}">
              <h2 class="h3 mt-2 mb-2" style="color: #004; font-family: Arial; font-weight: bold;">
                {{ $product->name }}
              </h2>
            </a>
            <div class="h5 text-secondary text-left">
              Rs.
              @php echo number_format( $product->selling_price ); @endphp
            </div>
          </div>
          <div class="mb-4 px-2">
            <button class="btn btn-success mt-3 p-3 px-3" wire:click.prevent="addItemToCart({{ $product->product_id }})">
              <span class="h5">
              ADD TO CART
              </span>
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
