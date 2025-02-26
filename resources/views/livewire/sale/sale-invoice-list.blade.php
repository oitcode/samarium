<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="p-3 bg-white border d-flex justify-content-between">
        <div class="pt-2">
          <div class="d-flex">
            <div class="mr-4 px-2 py-1 border font-weight-bold">
              Today : {{ $todaySaleInvoiceCount }}
            </div>
            <div class="mr-4 px-2 py-1 border font-weight-bold">
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
        Sale invoice ID
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
              <span class="font-weight-bold" style="color: #fe8d01;">
                {{ $saleInvoice->customer->name }}
              </span>
            @else
              <span class="font-weight-bold" style="color: #fe8d01;">
                None 
              </span>
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
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </x-table-row-component>

        {{-- Show in smaller screens --}}
        <x-table-row-component bsClass="d-md-none">
          <td>
            {{ $saleInvoice->sale_invoice_id }}
          </td>
          <td>
            <p>
              @if (\Carbon\Carbon::today()->toDateString() == $saleInvoice->created_at->toDateString())
                <i class="fas fa-star mr-2 text-primary"></i>
                <span class="text-primary">
                  Today
                </span>

              @else
                <span>
                  {{ $saleInvoice->created_at->toDateString() }}
                </span>
              @endif
            </p>
            <p>
              {{ $saleInvoice->created_at->format('H:i A') }}
            </p>
          </td>
          <td>
            <p class="h5">
              Rs
              @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
            </p>

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
          <td>
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog text-secondary"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" wire:click="$dispatch('displaySaleInvoice', { saleInvoiceId: {{ $saleInvoice->sale_invoice_id }} })">
                  <i class="fas fa-file text-primary mr-2"></i>
                  View
                </button>
                <button class="dropdown-item" wire:click="confirmDeleteSaleInvoice({{ $saleInvoice }})">
                  <i class="fas fa-trash text-danger mr-2"></i>
                  Delete
                </button>
              </div>
            </div>
          </td>
        </x-table-row-component>
      @endforeach

      @if ($modes['confirmDelete'])
        @livewire ('saleInvoice-list-confirm-delete', ['saleInvoice' => $deletingSaleInvoice,])
      @endif
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $saleInvoices->links() }}
    </x-slot>
  </x-list-component>

</div>
