<div>

  {{-- Search Bar --}}
  <div class="mb-4 p-3 border shadow-sm d-flex-rm">

    @if (false)
    <div class="float-left mr-3">
        <h2 class="text-secondary">
          Search
        </h2>
    </div>
    @endif

    <div class="float-left mr-3">
      <div>
        <label class="text-secondary">
          <i class="fas fa-user mr-3"></i>
          Name
        </label>
      </div>
      <input type="text" style="font-size: 1.1rem;">
    </div>

    <div class="float-left mr-3">
      <div>
        <label class="text-secondary">
          <i class="fas fa-phone mr-3"></i>
          Phone
        </label>
      </div>
      <input type="text" style="font-size: 1.1rem;">
    </div>

    <div class="float-right mr-3">
      <button class="btn btn-danger h-100 p-3" style="font-size: 1.3rem;">
        Creditors
      </button>
    </div>

    <div class="clearfix">
    </div>
  </div>

  @if ($customers != null && count($customers) > 0)

    <div class="row">
      @foreach ($customers as $customer)
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-header bg-warning-rm" {{--style="background-image: linear-gradient(to right, #7B3F00, #8B3F00);"--}}>
              <span style="font-size: 1.3rem;">
              {{ $customer->name }}
              </span>
            </div>
            <div class="card-body p-0">
              <div class="row">
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody style="font-size: 1.3rem;">
                        <tr>
                          <th>
                            <span class="badge mr-2">
                            <i class="fas fa-phone"></i>
                            </span>
                              {{ $customer->phone }}
                          </th>
                        </tr>
                        <tr>
                          <th class="text-danger">
                            <i class="fas fa-rupee-sign"></i>
                            @php echo number_format( $customer->getBalance() ); @endphp
                          </th>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <div class="p-2">
                    <a class="btn btn-success"href="" wire:click.prevent="$emit('displayCustomer', {{ $customer->customer_id }})">
                      <i class="fas fa-shopping-cart mr-2"></i>
                      {{ $customer->name }}
                    </a>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="d-flex justify-content-center h-100">
                    <div class="justify-content-center align-self-center text-center">
                      <h3 class="font-weight-bold text-success" style="font-size: 2.5rem;">
                        @if (false)
                        <img src="{{ asset('img/logo_1.jpg' ) }}" class="img-fluid">
                        @endif
                        <i class="fas fa-user"></i>
                      </h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No customers.
    </div>
  @endif
</div>
