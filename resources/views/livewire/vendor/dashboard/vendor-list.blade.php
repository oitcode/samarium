<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total vendors: {{ $totalVendorCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>ID</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Pending</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($vendors as $vendor)
        <x-table-row-component>
          <td>
            {{ $vendor->vendor_id }}
          </td>
          <td>
            {{ $vendor->name }}
          </td>
          <td>
            @if ($vendor->phone)
              {{ $vendor->phone }}
            @else
              <i class="far fa-question-circle text-secondary"></i>
            @endif
          <td>
            <span class="text-muted mr-1">
              {{ config('app.transaction_currency_symbol') }}
            </span>
            <span class="font-weight-bold">
              @php echo number_format( $vendor->getBalance() ); @endphp
            </span>
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingVendor->vendor_id == $vendor->vendor_id)
                <button class="btn btn-danger mr-1" wire:click="deleteVendor">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteVendor">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingVendor->vendor_id == $vendor->vendor_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Vendor cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteVendor">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayVendor', { vendorId: {{ $vendor->vendor_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayVendor', { vendorId: {{ $vendor->vendor_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="confirmDeleteVendor({{ $vendor->vendor_id }})">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $vendors->links() }}
    </x-slot>
  </x-list-component>

</div>
