<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total vendors: {{ $totalVendorCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>ID</th>
      <th>Name</th>
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
            <span class="text-muted mr-1">
              {{ config('app.transaction_currency_symbol') }}
            </span>
            <span class="font-weight-bold">
              @php echo number_format( $vendor->getBalance() ); @endphp
            </span>
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displayVendor', { vendorId: {{ $vendor->vendor_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayVendor', { vendorId: {{ $vendor->vendor_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
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
