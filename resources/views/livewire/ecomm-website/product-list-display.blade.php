<div class="h-100 shadow">
  {{-- Show in smaller screens --}}
  <div class="d-md-none">
  </div>

  {{-- Show in bigger screens --}}
  <div class="d-none-rm d-md-block-rm h-100">

    <div class="card h-100 shadow-sm border-0">

      <div class="d-flex flex-column justify-content-between h-100 bg-success-rm">
          <div class="d-flex justify-content-center bg-warning-rm">
            @if ($product->image_path)
              <img class="img-fluid h-25-rm w-100-rm" src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" style="max-height: 150px; {{--max-width: 100px;--}}">
            @else
              <i class="fas fa-dice-d6 fa-8x text-muted m-5"></i>
            @endif
          </div>

        <div class="d-flex flex-column justify-content-between flex-grow-1 overflow-auto" style="background-color: #f5f5f5;">
          <div class="p-2">
            <a href="{{ route('website-product-view', [$product->product_id, $product->name]) }}">
              <h2 class="h3 font-weight-bold mt-2 mb-2 text-dark" style="font-family: Arial;">
                {{ $product->name }}
              </h2>
            </a>
            @if (false)
            <div class="mb-1" style="font-size: 0.7rem;">
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
            <div class="h5 text-dark text-left mt-3" style="font-weight: bold;">
              Rs.
              @php echo number_format( $product->selling_price ); @endphp
            </div>
            @if (false)
              @if (rand()%2 == 0)
              <div class="h6 text-dark text-left">
                Free shipping
              </div>
              @endif
              @if (rand()%2 == 0)
              <div class="h6 text-dark text-left">
                Discount
                <span class="text-success">
                  50%
                </span>
              </div>
              @endif
            @endif
            <div class="text-danger mt-3">
              <span class="btn btn-outline-success-rm btn-light badge-pill-rm p-1 px-3" wire:click.prevent="addItemToCart({{ $product->product_id }})">
                <i class="fas fa-plus-circle mr-1"></i>
                Cart
              </span>
              {{-- Loading spinner --}}
              <span wire:loading class="spinner-border text-info mr-3"
                  role="status"
                  style="font-size: 1rem;">
              </span>
            </div>

          </div>
          @if (false)
          <div class="mb-4 px-2">
            <button class="btn btn-success mt-3 p-3 px-3" wire:click.prevent="addItemToCart({{ $product->product_id }})">
              <span class="h5">
              ADD TO CART
              </span>
            </button>
          </div>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
