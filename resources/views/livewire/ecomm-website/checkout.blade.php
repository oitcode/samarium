<div class="container my-4 mb-5">

    <div class="my-5">
      <h1 style="font-weight: bold; {{-- font-size: 1.5rem --}}; text-shadow: 0px 1px, 1px 0px, 1px 0px;">
        Checkout
      </h1>
    </div>

    @if (session()->has('cart'))
    <div class="row">
      <div class="col-md-6 bg-white text-white-rm border-right px-5 py-2 shadow-rm">
        <div class="p-3">
          @if (false)
          <h3 class="text-white-rm mb-3" style="font-family: Arial;">
            Order details
          </h3>
          @endif
        </div>
        <div class="table-responsive bg-white-rm border-rm">
          <table class="table">
            @if (false)
            <thead>
              <tr class="bg-success text-white">
                <th>Item</th>
                <th>Quantity</th>
                <th>Rate</th>
                <th>Total</th>
                <th>Action</th>
              </tr>
            </thead>
            @endif

            <tbody>
              @foreach ($cartItemsProduct as $line)
                <tr class="text-white-rm border-bottom">
                  <td class="border-0">
                    @if ($line['product']->image_path)
                      <img src="{{ asset('storage/' . $line['product']->image_path) }}" class="mr-2" style="width: 30px; height: 30px;">
                    @else
                      <i class="fas fa-angle-right mr-2"></i>
                    @endif
                    {{ $line['product']->name }}
                  </td>
                  <td class="border-0">
                    {{ $line['quantity'] }}
                  </td>
                  <td class="border-0">
                    @php echo number_format( $line['product']->selling_price ); @endphp
                  </td>
                  <td class="font-weight-bold border-0">
                    @php echo number_format( $line['product']->selling_price * $line['quantity']); @endphp
                  </td>
                  <td class="border-0">
                    <button class="btn btn-light">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
            </tbody>

            @if (false)
            <tfoot>
              <tr class="text-white-rm" style="font-size: 1rem; color: red;">
                <th colspan="3" class="text-right font-weight-bold h3">
                  Rs
                </th>
                <td colspan="2" class="font-weight-bold h3">
                  @php echo number_format( $cartTotalAmount ); @endphp
                </td>
              </tr>
            </tfoot>
            @endif
          </table>
        </div>
        <div class="my-4 text-secondary">
          <p>
            Thank you for shopping with us. We hope you will like our services and products.
            Fill required details and click on place order.
          </p>
        </div>

        <div class="d-flex justify-content-between">
          <div class="h2 font-weight-bold">
            Total
          </div>
          <div class="h2 font-weight-bold">
            @php echo number_format( $cartTotalAmount ); @endphp
          </div>
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
        <div class="card border-0 shadow-lg-rm">
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
        @if (false)
        <div class="card border-0 shadow-lg-rm">
          <div class="card-body">
            <div class="text-dark">
              <h3>
                Payment options
              </h3>
            </div>

            <img src="{{ asset('img/cash-on-delivery-1.png') }}" class="mr-2" style="{{-- width: 100px; --}} height: 100px;">

          </div>
        </div>
        @endif

        {{-- Confirm button --}}
        <div class="card border-0 shadow-lg-rm">
          <div class="card-body">
            <div class="row" style="">
              <div class="col-md-12">
                <button class="btn btn-dark mr-3 w-100 badge-pill-rm p-3" wire:click="store" style="font-size: 1.3rem;">
                  <i class="fas fa-check-circle mr-3"></i>
                  Place order
                </button>
                <div class="d-flex justify-content-center my-3 text-secondary">
                  <div>
                    <p>
                      By placing this order you agree to our
                      <span class="text-primary">
                        terms and conditions
                      </span>
                      and
                      <span class="text-primary">
                        return policy
                      </span>
                    </p>
                  </div>
                </div>
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
