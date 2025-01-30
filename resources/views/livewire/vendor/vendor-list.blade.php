<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total customers: {{ \App\Customer::count() }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>ID</th>
      <th>Name</th>
      <th>Pending</th>
      <th class="text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($vendors as $vendor)
        <tr>
          <td>
            {{ $vendor->vendor_id }}
          </td>
          <td>
            {{ $vendor->name }}
          </td>
          <td>
            <span class="text-muted mr-1">
              Rs
            </span>
            <span class="font-weight-bold">
              @php echo number_format( $vendor->getBalance() ); @endphp
            </span>
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayVendor', { vendor: {{ $vendor }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayVendor', { vendor: {{ $vendor }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $vendors->links() }}
    </x-slot>
  </x-list-component>

</div>
