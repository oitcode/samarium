<div class="container my-4 mb-5">

    <div class="my-5">
      <h1 style="font-weight: bold; {{-- font-size: 1.5rem --}}; text-shadow: 0px 1px, 1px 0px, 1px 0px;">
        Checkout
      </h1>
    </div>

    @if (session()->has('cart'))
    <div class="row">
      <div class="col-md-6 bg-white text-white-rm border p-0 shadow">
        <div class="p-3">
          <h3 class="text-white-rm mb-3" style="font-family: Arial;">
            Order details
          </h3>
        </div>
        <div class="table-responsive bg-white-rm border">
          <table class="table">
            <thead>
              <tr class="bg-success text-white">
                <th>Item</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              @foreach ($cartItemsProduct as $line)
                <tr class="text-white-rm">
                  <td>
                    @if ($line['product']->image_path)
                      <img src="{{ asset('storage/' . $line['product']->image_path) }}" class="mr-2" style="width: 30px; height: 30px;">
                    @else
                      <i class="fas fa-angle-right mr-2"></i>
                    @endif
                    {{ $line['product']->name }}
                  </td>
                  <td>
                    {{ $line['quantity'] }}
                  </td>
                  <td>
                    @php echo number_format( $line['product']->selling_price ); @endphp
                  </td>
                  <td class="font-weight-bold">
                    @php echo number_format( $line['product']->selling_price * $line['quantity']); @endphp
                  </td>
                  <td>
                    <button class="btn btn-light">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>

            <tfoot>
              <tr class="text-white-rm" style="font-size: 1rem; color: red;">
                <th colspan="3" class="text-right font-weight-bold h3">
                  Rs
                </th>
                <td class="font-weight-bold h3">
                  @php echo number_format( $cartTotalAmount ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="col-md-6 p-0">
        @if (session()->has('message'))
          <div class="alert alert-success alert-dismissible fade show mx-3 my-2" role="alert">
            {{ session('message') }}
            We will call you soon.
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        {{-- Customer details --}}
        <div class="card border-0 shadow-lg">
          <div class="card-body">
            <div class="text-dark">
              <h3>
                Your details
              </h3>
            </div>
            <div class="form-group">
              <input class="form-control p-3 w-100" type="text"
                  style="height: 50px; width: 100%; font-size: 1rem; color: #555;"
                  placeholder="Phone"
                  wire:model.defer="phone">
              @error ('phone') <div class="text-danger"> {{ $message }} </div> @enderror
            </div>

            <div class="form-group">
              <input class="form-control p-3 w-100" type="text"
                  style="height: 50px; width: 100%; font-size: 1rem; color: #555;"
                  placeholder="Address"
                  wire:model.defer="address">
              @error ('address') <div class="text-danger"> {{ $message }} </div> @enderror
            </div>
          </div>
        </div>

        {{-- Payment options --}}
        <div class="card border-0 shadow-lg">
          <div class="card-body">
            <div class="text-dark">
              <h3>
                Payment options
              </h3>
            </div>

            <img src="{{ asset('img/cash-on-delivery-1.png') }}" class="mr-2" style="{{-- width: 100px; --}} height: 100px;">

          </div>
        </div>

        {{-- Confirm button --}}
        <div class="card border-0 shadow-lg">
          <div class="card-body">
            <div class="row" style="">
              <div class="col-md-12">
                <button class="btn btn-success mr-3 w-100 badge-pill" wire:click="store" style="font-size: 1.3rem;">
                  <i class="fas fa-check-circle mr-3"></i>
                  Place order
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
