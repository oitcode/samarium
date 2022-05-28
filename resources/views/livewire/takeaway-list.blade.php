<div>

  <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>

  <div class="d-flex mb-4 pl-3" style="font-size: 1rem;">
    <div class="mr-4">
      Today : {{ $todayTakeawayCount }}
    </div>
    <div class="mr-4">
      Total : {{ $totalTakeawayCount }}
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered-rm table-hover shadow-sm border" style="font-size: 1.3rem;">
      <thead>
        <tr class="bg-success-rm text-white-rm">
          <th>
            ID
          </th>
          <th>
            Date
          </th>
          <th>
            Time
          </th>
          @if (false)
          <th>
            Status
          </th>
          @endif
          <th>
            Payment Status
          </th>
          <th>
            Pending
          </th>
          <th>
            Amount
          </th>
          <th>
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($takeaways as $takeaway)
          <tr
              {{--  --}}
              >
            <td>
              {{ $takeaway->takeaway_id }}
            </td>
            <td class="" style="font-size: 1rem;">
              {{ $takeaway->created_at->toDateString() }}
            </td>
            <td>
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
            <td>
              {{ $takeaway->getPendingAmount() }}
            </td>
            <td>
              {{ $takeaway->getTotalAmount() }}
            </td>
            <td>
              @if (false)
              <button class="btn p-2 border mr-3" 
                  wire:click="{{--$emit('displayPurchase', {{ $purchase->purchase_id }})--}}">
                <i class="fas fa-folder-open text-primary"></i>
              </button>
              <button class="btn p-2 border mr-3"
                  wire:click="{{--enterConfirmDeletePurchaseMode({{ $purchase }})--}}">
                <i class="fas fa-trash text-danger"></i>
              </button>
              @endif
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
