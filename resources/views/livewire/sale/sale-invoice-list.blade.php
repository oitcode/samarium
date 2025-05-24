<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="p-3 bg-white border d-flex justify-content-between">
        <div class="pt-2">
          <div class="d-flex">
            <div class="mr-4 px-2 font-weight-bold">
              Today : {{ $todaySaleInvoiceCount }}
            </div>
            <div class="mr-4 px-2 font-weight-bold">
              Total : {{ $totalSaleInvoiceCount }}
            </div>
          </div>
        </div>
        <div class="font-weight-bold h6 d-flex">
          <div class="d-flex">
            <div class="d-flex flex-column justify-content-center mr-3 o-heading">
              <i class="fas fa-funnel mr-1"></i>
              Filter
            </div>
            <div class="dropdown">
              <button class="btn
                  @if ($modes['showOnlyPendingMode'])
                    btn-outline-danger
                  @elseif ($modes['showOnlyPaidMode'])
                    btn-outline-success
                  @elseif ($modes['showOnlyPartiallyPaidMode'])
                    btn-warning
                  @elseif ($modes['showAllMode'])
                    btn-outline-dark border border-dark
                  @endif
                  dropdown-toggle"
                  style="min-width: 100px;"
                  type="button" id="dropdownMenuButtonToolbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if ($modes['showOnlyPendingMode'])
                  Pending
                @elseif ($modes['showOnlyPaidMode'])
                  Paid
                @elseif ($modes['showOnlyPartiallyPaidMode'])
                  Partially paid
                @elseif ($modes['showAllMode'])
                  All
                @else
                  Whoops
                @endif
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonToolbar">
                <button class="dropdown-item" wire:click="enterMode('showOnlyPendingMode')">
                  Pending
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyPartiallyPaidMode')">
                  Partially paid
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyPaidMode')">
                  Paid
                </button>
                <button class="dropdown-item" wire:click="enterMode('showAllMode')">
                  All
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell">
        ID
      </th>
      <th class="d-none d-md-table-cell">
        Date
      </th>
      <th class="d-none d-md-table-cell">
        Time
      </th>
      <th class="d-none d-md-table-cell">
        Customer
      </th>
      <th class="d-none d-md-table-cell">
        Amount
      </th>
      <th class="d-none d-md-table-cell">
        Payment Status
      </th>
      <th class="d-none d-md-table-cell text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($saleInvoices as $saleInvoice)
        {{-- Show in bigger screens --}}
        <x-table-row-component bsClass="d-none d-md-table-row">
          <td>
            {{ $saleInvoice->sale_invoice_id }}
          </td>
          <td class="d-none d-md-table-cell">
            {{--
                Todo: Should show saleInvoice date
                if needed then set appropriate date for
                back dated saleInvoice entries
            --}}
            {{ $saleInvoice->sale_invoice_date }}
          </td>
          <td class="d-none d-md-table-cell">
            {{ $saleInvoice->created_at->format('H:i A') }}
          </td>
          <td class="d-none d-md-table-cell">
            @if ($saleInvoice->customer)
              <span class="font-weight-bold">
                {{ $saleInvoice->customer->name }}
              </span>
            @else
              <i class="far fa-question-circle text-muted"></i>
            @endif
          </td>
          <td class="font-weight-bold">
            {{ config('app.transaction_currency_symbol') }}
            @if ($saleInvoice->creation_status == 'progress')
              @if ($hasVat)
                @php echo number_format( $saleInvoice->getTotalAmount() * 1.13); @endphp
              @else
                @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
              @endif
            @else
              @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
            @endif
          </td>
          <td>
            @if ($saleInvoice->payment_status == 'pending')
              <span class="badge badge-pill badge-danger">
                Pending
              </span>
            @elseif ($saleInvoice->payment_status == 'partially_paid')
              <span class="badge badge-pill badge-warning">
                Partial
              </span>
            @elseif ($saleInvoice->payment_status == 'paid')
              <span class="badge badge-pill badge-success">
                Paid
              </span>
            @else
              {{ $saleInvoice->payment_status }}
            @endif
          </td>
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingSaleInvoice->sale_invoice_id == $saleInvoice->sale_invoice_id)
                <button class="btn btn-danger mr-1" wire:click="deleteSaleInvoice">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeleteSaleInvoice">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingSaleInvoice->sale_invoice_id == $saleInvoice->sale_invoice_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Sale invoice cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeleteSaleInvoice">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
            </x-list-view-button-component>
          </td>
        </x-table-row-component>

      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $saleInvoices->links() }}
    </x-slot>
  </x-list-component>

</div>
