<div>

  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h6 o-heading">
        Sales invoice search
      </h1>
    </div>
    <div class="d-flex">
      <div class="my-1 mr-5">
        <input type="text"
            class="mr-5 h-100-rm form-control"
            wire:model="search_sale_invoice_id"
            wire:keydown.enter="search"
            placeholder="Search by Sale invoice ID"
            autofocus>
        <div class="mt-3">
          @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
        </div>
      </div>
      <div class="my-1">
        <input type="text"
            class="mr-5 h-100-rm form-control"
            wire:model="search_customer_name"
            wire:keydown.enter="searchByCustomerName"
            placeholder="Search by customer name"
            autofocus>
        <div class="mt-3">
          @include ('partials.button-general', ['btnBsClass' => 'btn-light border', 'clickMethod' => "searchByCustomerName", 'btnText' => 'Search',])
        </div>
      </div>
    </div>
  </div>

  <x-list-component>
    <x-slot name="listInfo">
      @if ($saleInvoice)
        Total: Todo
      @endif
    </x-slot>

    <x-slot name="listHeadingRow">
      <th>
        Bill ID
      </th>
      <th>
        Date
      </th>
      <th>
        Customer
      </th>
      <th>
        Pendig
      </th>
      <th>
        Total
      </th>
      <th class="text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @if ($saleInvoice)
        <x-table-row-component>
          <td>
            {{ $saleInvoice->sale_invoice_id }}
          </td>
          <td class="h6 font-weight-bold">
            {{ $saleInvoice->created_at }}
          </td>
          <td>
            @if ($saleInvoice->customer)
              {{ $saleInvoice->customer->name }}
            @else
              None
            @endif
          </td>
          <td>
            {{ $saleInvoice->getPendingAmount() }}
          </td>
          <td>
            {{ $saleInvoice->getTotalAmount() }}
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>
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

</div>
