<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h6 o-heading">
        Customer search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          wire:model="vendor_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>

  @if ($searchDone)
  <x-list-component>
    <x-slot name="listInfo">
      Total: {{ count($vendors) }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Customer ID
      </th>
      <th>
        Customer
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @if ($vendors != null && count($vendors) > 0)
        @foreach ($vendors as $vendor)
          <x-table-row-component wire:key="{{ $vendor->vendor_id }}">
            <td>
              {{ $vendor->vendor_id }}
            </td>
            <td class="h6">
              {{ $vendor->name }}
            </td>
            <td class="text-right">
              <x-list-edit-button-component clickMethod="$dispatch('displayVendor', { vendorId : {{ $vendor->vendor_id }} })">
              </x-list-edit-button-component>
              <x-list-view-button-component clickMethod="$dispatch('displayVendor', { vendorId : {{ $vendor->vendor_id }} })">
              </x-list-view-button-component>
              <x-list-delete-button-component clickMethod="">
              </x-list-delete-button-component>
            </td>
          </x-table-row-component>
        @endforeach
      @else
        <td>
          No results
        </td>
      @endif
    </x-slot>

    <x-slot name="listPaginationLinks">
    @if (false)
      {{ $products->links() }}
    @endif
    </x-slot>
  </x-list-component>
  @endif

</div>
