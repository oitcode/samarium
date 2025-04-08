<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h6 o-heading">
        Purchasee search
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
      Total: {{ count($purchases) }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Purchase ID
      </th>
      <th>
        Vendor
      </th>
      <th>
        Pending
      </th>
      <th>
        Total
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @if ($purchases != null && count($purchases) > 0)
        @foreach ($purchases as $purchase)
          <x-table-row-component>
            <td>
              {{ $purchase->purchase_id }}
            </td>
            <td class="h6">
              @if ($purchase->vendor)
                {{ $purchase->vendor->name }}
              @endif
            </td>
            <td class="h6 font-weight-bold">
              {{ $purchase->getPendingAmount() }}
            </td>
            <td>
              {{ config('app.transaction_currency_symbol') }}
              {{ $purchase->getTotalAmount() }}
            </td>
            <td class="text-right">
              <x-list-edit-button-component clickMethod="$dispatch('displayPurchase', { purchaseId : {{ $purchase->purchase_id }} })">
              </x-list-edit-button-component>
              <x-list-view-button-component clickMethod="$dispatch('displayProduct', { purchaseId : {{ $purchase->purchase_id }} })">
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
