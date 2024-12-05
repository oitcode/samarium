<div>


  {{-- Customer table --}}
  @if ($customers != null && count($customers) > 0)

    {{-- Show in bigger screens --}}
    <div class="table-responsive border d-none d-md-block">
      <table class="table table-hover mb-0">
        <thead>
          <tr class="bg-white text-dark">
            <th>Name</th>
            <th>Phone</th>
            <th>Balance</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @if (count($customers) > 0)
            @foreach ($customers as $customer)
              <tr class="border" wire:click="$dispatch('displayCustomer', { customerId: {{ $customer->customer_id }} })" role="button">
                <td>
                  <span>
                    {{ ucwords($customer->name) }}
                  </span>
                </td>
                <td>
                  @if ($customer->phone)
                    {{ $customer->phone }}
                  @else
                    <span class="text-secondary">
                      No info
                    </span>
                  @endif
                </td>
                <td>
                  @if ($customer->getBalance() > 0)
                    <span class="text-muted mr-1">
                      Rs
                    </span>
                    <span class="font-weight-bold">
                      @php echo number_format( $customer->getBalance() ); @endphp
                    </span>
                  @else
                    Rs
                    @php echo number_format( $customer->getBalance() ); @endphp
                  @endif
                </td>
                <td>
                  @if (true)
                    <button class="btn btn-primary px-2 py-1" wire:click="">
                      <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button class="btn btn-danger px-2 py-1" wire:click="">
                      <i class="fas fa-trash"></i>
                    </button>
                    <button class="btn btn-success px-2 py-1" wire:click="">
                      <i class="fas fa-eye"></i>
                    </button>
                  @endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">
                <p class="font-weight-bold text-muted-rm h5 py-4 text-center" style="color: #fe8d01;">
                  <i class="fas fa-exclamation-circle mr-2"></i>
                  No customers yet
                <p>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>


    {{-- Show in smaller screens --}}
    <div class="table-responsive border d-md-none">
      <table class="table table-hover mb-0">
        <thead>
          <tr class="bg-white">
            <th></th>
            <th>Customer</th>
            <th>Balance</th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @if (count($customers) > 0)
            @foreach ($customers as $customer)
              <tr class="border">
                <td style="width: 5vw;">

                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-cog text-secondary"></i>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <button class="dropdown-item" wire:click="$dispatch('displayCustomer', { customerId: {{ $customer->customer_id }} })">
                        <i class="fas fa-file text-primary mr-2"></i>
                        View
                      </button>
                    </div>
                  </div>
                </td>
                <td>
                  <span>
                    {{ ucwords($customer->name) }}
                  </span>
                  <div class="text-secondary" style="0.9rem;">
                    @if ($customer->phone)
                      {{ $customer->phone }}
                    @else
                      <span style="color: orange;">
                        No info
                      </span>
                    @endif
                  </div>
                </td>
                <td>
                  @if ($customer->getBalance() > 0)
                    <span class="text-muted mr-1">
                      Rs
                    </span>
                    <span class="font-weight-bold">
                      @php echo number_format( $customer->getBalance() ); @endphp
                    </span>
                  @else
                    Rs
                    @php echo number_format( $customer->getBalance() ); @endphp
                  @endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <td colspan="3">
                <p class="font-weight-bold text-muted-rm h5 py-4 text-center" style="color: #fe8d01;">
                  <i class="fas fa-exclamation-circle mr-2"></i>
                  No customers yet
                <p>
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  @else
    <div class="text-secondary py-3">
      No customers.
    </div>
  @endif


</div>
