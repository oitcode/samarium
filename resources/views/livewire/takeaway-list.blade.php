<div>

  <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>

  {{-- Top flash cards --}}
  @if (true)
  <div class="row mb-1">
    <div class="col-md-6">
      <div class="mb-4">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-skating',
            'btnTextPrimary' => 'Today',
            'btnTextSecondary' => $todayTakeawayCount,
        ])
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-4">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-skating',
            'btnTextPrimary' => 'Total',
            'btnTextSecondary' => $totalTakeawayCount,
        ])
      </div>
    </div>
  </div>
  @endif


  <div class="d-flex mb-4 pl-3" style="font-size: 1rem;">
    <div class="mr-4">
      Today : {{ $todayTakeawayCount }}
    </div>
    <div class="mr-4">
      Total : {{ $totalTakeawayCount }}
    </div>
  </div>

  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none d-md-block">
    <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border">
      <thead>
        <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
            p-4" style="font-size: 1rem;">
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
          @if (false)
          <th>
            Action
          </th>
          @endif
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($takeaways as $takeaway)
          <tr wire:click="$emit('displayTakeaway', {{ $takeaway->takeaway_id }})" role="button">
            <td>
              {{ $takeaway->takeaway_id }}
            </td>
            <td class="d-none d-md-table-cell" style="font-size: 1rem;">
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
            @if (false)
            <td>
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="$emit('displayTakeaway', {{ $takeaway->takeaway_id }})">
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
            @endif
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
                <span class="badge-rm badge-pill-rm badge-primary-rm text-primary">
                  Today
                </span>

              @else
                <span class="text-secondary-rm" style="font-size: 1rem;">
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
                <button class="dropdown-item" wire:click="$emit('displayTakeaway', {{ $takeaway->takeaway_id }})">
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
