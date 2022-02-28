<div>

  @if ($customers != null && count($customers) > 0)
    @if (false)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>PAN Num</th>
            <th>Balance</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($customers as $customer)
            <tr>
              <td>
                {{ $customer->customer_id }}
              </td>
              <td>
                <a href="" wire:click.prevent="$emit('displayCustomer', {{ $customer->customer_id }})">
                {{ $customer->name }}
                </a>
              </td>
              <td>
                {{ $customer->phone }}
              </td>
              <td>
                {{ $customer->email }}
              </td>
              <td>
                {{ $customer->address }}
              </td>
              <td>
                {{ $customer->pan_num }}
              </td>
              <td>
                {{ $customer->getBalance() }}
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    @endif

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
