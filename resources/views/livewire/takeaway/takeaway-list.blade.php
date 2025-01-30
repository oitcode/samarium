<div>

  {{-- Filter div --}}
  <div class="mb-3 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        <div class="dropdown">
          <button class="btn
              @if ($modes['showOnlyPendingMode'])
                btn-danger
              @elseif ($modes['showOnlyPaidMode'])
                btn-success
              @elseif ($modes['showOnlyPartiallyPaidMode'])
                btn-warning
              @elseif ($modes['showAllMode'])
                btn-dark border
              @endif
              dropdown-toggle"
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
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonToolbar">
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

    <div class="pt-2">
      <div class="d-flex">
        <div class="mr-4 font-weight-bold">
          Today : {{ $todayTakeawayCount }}
        </div>
        <div class="mr-4 font-weight-bold">
          Total : {{ $totalTakeawayCount }}
        </div>
      </div>
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none d-md-block">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="p-4 bg-white text-dark">
          <th>
            ID
          </th>
          <th class="d-none d-md-table-cell">
            Date
          </th>
          <th class="d-none d-md-table-cell">
            Time
          </th>
          <th>
            <span class="d-none d-md-inline">
              Payment
            </span>
            Status
          </th>
          <th class="d-none d-md-table-cell">
            Pending
          </th>
          <th>
            Amount
          </th>
        </tr>
      </thead>
      <tbody class="bg-white">
        @foreach ($takeaways as $takeaway)
          <tr wire:click="$dispatch('displayTakeaway', {takeawayId: {{ $takeaway->takeaway_id }} })" role="button">
            <td>
              {{ $takeaway->takeaway_id }}
            </td>
            <td class="d-none d-md-table-cell">
              {{--
                  Todo: Should show takeaway date
                  if needed then set appropriate date for
                  back dated takeaway entries
              --}}
              {{ $takeaway->saleInvoice->sale_invoice_date }}
            </td>
            <td class="d-none d-md-table-cell">
              {{ $takeaway->created_at->format('H:i A') }}
            </td>
            <td>
              @if ($takeaway->saleInvoice->payment_status == 'pending')
                <span class="badge badge-pill badge-danger">
                  Pending
                </span>
              @elseif ($takeaway->saleInvoice->payment_status == 'partially_paid')
                <span class="badge badge-pill badge-warning">
                  Partial
                </span>
              @elseif ($takeaway->saleInvoice->payment_status == 'paid')
                <span class="badge badge-pill badge-success">
                  Paid
                </span>
              @else
                {{ $takeaway->saleInvoice->payment_status }}
              @endif
            </td>
            <td class="d-none d-md-table-cell">
              @if ($takeaway->saleInvoice->creation_status == 'progress')
                @if (\App\SaleInvoiceAdditionHeading::where('name', 'vat')->first())
                  @php echo number_format( $takeaway->getPendingAmount() * 1.13); @endphp
                @else
                  @php echo number_format( $takeaway->getPendingAmount() ); @endphp
                @endif
              @else
                @php echo number_format( $takeaway->getPendingAmount() ); @endphp
              @endif
            </td>
            <td class="font-weight-bold">
              @if ($takeaway->saleInvoice->creation_status == 'progress')
                @if (\App\SaleInvoiceAdditionHeading::where('name', 'vat')->first())
                  @php echo number_format( $takeaway->getTotalAmount() * 1.13); @endphp
                @else
                  @php echo number_format( $takeaway->getTotalAmount() ); @endphp
                @endif
              @else
                @php echo number_format( $takeaway->getTotalAmount() ); @endphp
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Pagination links --}}
    {{ $takeaways->links() }}
  </div>

  {{-- Show in smaller screens --}}
  <div class="table-responsive d-md-none border bg-white">
    <table class="table">
      <tbody>
        @foreach ($takeaways as $takeaway)
          <tr>
            <td>
              {{ $takeaway->takeaway_id }}
            </td>
            <td>
              <p>
                @if (\Carbon\Carbon::today()->toDateString() == $takeaway->created_at->toDateString())
                  <i class="fas fa-star mr-2 text-primary"></i>
                  <span class="text-primary">
                    Today
                  </span>

                @else
                  <span>
                    {{ $takeaway->created_at->toDateString() }}
                  </span>
                @endif
              </p>
              <p>
                {{ $takeaway->created_at->format('H:i A') }}
              </p>
            </td>
            <td>
              <p class="h5">
                Rs
                @php echo number_format( $takeaway->getTotalAmount() ); @endphp
              </p>

              @if ($takeaway->saleInvoice->payment_status == 'pending')
                <span class="badge badge-pill badge-danger">
                  Pending
                </span>
              @elseif ($takeaway->saleInvoice->payment_status == 'partially_paid')
                <span class="badge badge-pill badge-warning">
                  Partial
                </span>
              @elseif ($takeaway->saleInvoice->payment_status == 'paid')
                <span class="badge badge-pill badge-success">
                  Paid
                </span>
              @else
                {{ $takeaway->saleInvoice->payment_status }}
              @endif
            </td>
            <td>
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="$dispatch('displayTakeaway', {takeawayId: {{ $takeaway->takeaway_id }} })">
                    <i class="fas fa-file text-primary mr-2"></i>
                    View
                  </button>
                  <button class="dropdown-item" wire:click="confirmDeleteTakeaway({{ $takeaway }})">
                    <i class="fas fa-trash text-danger mr-2"></i>
                    Delete
                  </button>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if ($modes['confirmDelete'])
    @livewire ('takeaway-list-confirm-delete', ['takeaway' => $deletingTakeaway,])
  @endif

</div>
