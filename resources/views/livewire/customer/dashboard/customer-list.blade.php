<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total customers: {{ $totalCustomerCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="">ID</th>
      <th class="">Name</th>
      <th class="">Phone</th>
      <th class="">Balance</th>
      <th class="">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($customers as $customer)
        <x-table-row-component bsClass="border">
          <x-table-cell>
            {{ $customer->customer_id }}
          </x-table-cell>
          <x-table-cell>
            <span>
              {{ ucwords($customer->name) }}
            </span>
          </x-table-cell>
          <td>
            @if ($customer->phone)
              {{ $customer->phone }}
            @else
              <i class="far fa-question-circle text-secondary"></i>
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
            @if ($modes['confirmDelete'])
              @if ($deletingCustomer->customer_id == $customer->customer_id)
                <button class="btn btn-danger mr-1" wire:click="deleteCustomer">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteCustomer">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingCustomer->customer_id == $customer->customer_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Customer cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteCustomer">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayCustomer', { customerId: {{ $customer->customer_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayCustomer', { customerId: {{ $customer->customer_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteCustomer({{ $customer->customer_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $customers->links() }}
    </x-slot>
  </x-list-component>

</div>
