<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total customers: {{ $customersCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell">Name</th>
      <th class="d-none d-md-table-cell">Phone</th>
      <th class="d-none d-md-table-cell">Balance</th>
      <th class="d-none d-md-table-cell text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($customers as $customer)
        {{-- Show in bigger screens --}}
        <x-table-row-component bsClass="d-none d-md-table-row border">
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
                {{ config('app.transaction_currency_symbol') }}
              </span>
              <span class="font-weight-bold">
                @php echo number_format( $customer->getBalance() ); @endphp
              </span>
            @else
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $customer->getBalance() ); @endphp
            @endif
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayCustomer', { customerId: {{ $customer->customer_id }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayCustomer', { customerId: {{ $customer->customer_id }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </x-table-row-component>

        {{-- Show in smaller screens --}}
        <x-table-row-component bsClass="d-md-none border">
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
                {{ config('app.transaction_currency_symbol') }}
              </span>
              <span class="font-weight-bold">
                @php echo number_format( $customer->getBalance() ); @endphp
              </span>
            @else
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $customer->getBalance() ); @endphp
            @endif
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $customers->links() }}
    </x-slot>
  </x-list-component>

</div>
