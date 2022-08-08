<div class="container my-4">
    <h2 class="text-secondary">
      Checkout
    </h2>

    @if (session()->has('cart'))
    <div class="row">
      <div class="col-md-6">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($cartItemsProduct as $line)
                <tr>
                  <td>
                    {{ $line['product']->name }}
                  </td>
                  <td>
                    {{ $line['quantity'] }}
                  </td>
                  <td>
                    @php echo number_format( $line['product']->selling_price ); @endphp
                  </td>
                  <td>
                    @php echo number_format( $line['product']->selling_price * $line['quantity']); @endphp
                  </td>
                </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr style="font-size: 1.3rem;">
                <th colspan="3" class="text-right">
                  Grand Total
                </th>
                <td>
                  @php echo number_format( $cartTotalAmount ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="col-md-6">
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show mx-3 my-2" role="alert">
            {{ session('message') }}
            We will call you soon.
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card">
          <div class="card-header p-3" style="{{--background-color: maroon;--}}">
            <div class="text-secondary">
              <h3>
                Customer details
              </h3>
            </div>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label>
                <i class="fas fa-phone mr-2"></i>
                Phone
                @error ('phone')
                  <span class="text-danger ml-4">
                    {{ $message }}
                  </span>
                @enderror
              </label>
              <input class="p-3 w-100" type="text" style="height: 50px; width: 100%; font-size: 1.5rem; color: #555;" wire:model.defer="phone">
            </div>

            <div class="mb-3">
              <label>
                <i class="fas fa-map-marker-alt mr-2"></i>
                Address
                @error ('address')
                  <span class="text-danger ml-4">
                    {{ $message }}
                  </span>
                @enderror
              </label>
              <input class="p-3 w-100" type="text" style="height: 50px; width: 100%; font-size: 1.5rem; color: #555;" wire:model.defer="address">
            </div>

            <div class="row" style="">
              <div class="col-md-6">
                <button class="btn btn-success mr-3 w-100" wire:click="store" style="font-size: 1.3rem;">
                  <i class="fas fa-shopping-cart mr-3"></i>
                  CONFIRM
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
      @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show mx-3 my-2" role="alert">
          {{ session('message') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @else
        <div class="my-4 text-secondary">
          No items in cart. Please add products to cart.
        </div>
      @endif

    @endif
</div>
