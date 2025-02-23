<div class="container-fluid py-4">

  <div class="container border p-0">
    <div class="d-flex justify-content-start mb-2 py-3 bg-white border">
      <h1 class="h4 o-heading bg-light text-dark pl-3">
        Checkout
      </h1>
    </div>
  
    @if (session()->has('cart'))
      <div class="row" style="margin: auto;">
        <div class="col-md-6 bg-white border-right px-5-rm py-2-rm">
          <div class="text-dark mt-3 mb-4">
            <h2 class="h5 o-heading">
              Products
            </h2>
          </div>
          <div class="table-responsive border">
            <table class="table mb-0">
              <tbody>
                @foreach ($cartItemsProduct as $line)
                  <tr class="border-bottom">
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
            </table>
          </div>
          <div class="d-flex justify-content-between px-3 mt-3">
            <div class="h5 o-heading">
              Total
            </div>
            <div class="h5 o-heading">
              @php echo number_format( $cartTotalAmount ); @endphp
            </div>
          </div>
        </div>
        <div class="col-md-6 p-0 bg-white">
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
          <div class="card border-0">
            <div class="card-body">
              <div class="text-dark mb-4">
                <h2 class="h5 o-heading">
                  Your details
                </h2>
              </div>

              <div class="form-group">
                <input class="form-control p-3 w-100" type="text"
                    style="height: 50px; width: 100%; color: #555;"
                    placeholder="Phone"
                    wire:model="phone">
                @error ('phone') <div class="text-danger"> {{ $message }} </div> @enderror
              </div>
  
              <div class="form-group">
                <input class="form-control p-3 w-100" type="text"
                    style="height: 50px; width: 100%; color: #555;"
                    placeholder="Address"
                    wire:model="address">
                @error ('address') <div class="text-danger"> {{ $message }} </div> @enderror
              </div>

              {{-- Confirm button --}}
              <div>
                <button class="btn btn-danger mr-3 w-100 p-3" wire:click="store">
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
    @else
      @if (session()->has('message'))
        @include ('partials.flash-message', ['message' => session('message'),])
      @else
        <div class="bg-white py-4 pl-3">
          <div class="mb-4">
            <h3 class="h6 font-weight-bold mb-3">
              Shopping cart is empty!
            </h3>
            No items in cart. Please add products to cart.
          </div>
          <div>
            <a href="/" class="btn btn-danger">
              Shop now
            </a>
          </div>
        </div>
      @endif
    @endif
  
    @guest
      <div class="bg-white border p-3 my-2">
        <div class="font-weight-bold mb-3">
          You are not signed in!
        </div>
        <div class="mb-3">
          Sign in to use many more features.
        </div>
        <div>
          <a href="{{ route('login') }}" class="btn btn-success">
            Sign in
          </a>
        </div>
      </div>
    @endguest
  </div>

</div>
