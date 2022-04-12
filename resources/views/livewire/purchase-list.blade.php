<div>


  @if (true)
  <div class="my-3 text-secondary py-3" style="font-size: 1.3rem;">
    @if (true)
    <i class="fas fa-calendar mr-2"></i>
    @endif

    <input type="date" wire:model.defer="startDate" class="mr-3" />
    <input type="date" wire:model.defer="endDate" class="mr-3" />

    <button class="btn btn-success" wire:click="getPurchasesForDateRange">
      Go
    </button>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
  </div>

  <div class="my-4 py-4 px-3 border bg-white shadow-sm">
    <h2>
        Total:
        @php echo number_format( $total ); @endphp
    </h2>
  </div>

  @endif

  @if (true)
  @if (!is_null($purchases) && count($purchases) > 0)
  <div class="table-responsive">
    <table class="table table-hover table-bordered" style="font-size: 1.3rem;">
      <thead>
        <tr class="bg-success-rm text-white-rm">
          <th>
            ID
          </th>
          <th style="width: 200px;">
            Date
          </th>
          <th>
            Items
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

      <tbody>
        @foreach ($purchases as $purchase)
          <tr wire:key="{{ rand() }}">
            <td>
              {{ $purchase->purchase_id }}
            </td>
            <td class="" style="font-size: 1rem;">
              {{ $purchase->created_at->toDateString() }}
            </td>
            <td>
              @if ($purchase->purchaseItems)
                @foreach ($purchase->purchaseItems as $purchaseItem )
                  {{ $purchaseItem->product->name }}
                @endforeach
              @else
                NONE
              @endif
            </td>
            <td>
              @if ($purchase)
              @if ($purchase->payment_status == 'pending')
                <span class="badge badge-pill badge-danger">
                  Pending
                </span>
              @elseif ($purchase->payment_status == 'partially_paid')
                <span class="badge badge-pill badge-warning">
                  Partial
                </span>
              @elseif ($purchase->payment_status == 'paid')
                <span class="badge badge-pill badge-success">
                  Paid
                </span>
              @else
                {{ $purchase->payment_status }}
              @endif
              @endif
            </td>
            <td>
              @php echo number_format( $purchase->getPendingAmount() ); @endphp
            </td>
            <td>
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
            </td>
            <td>
              <button class="btn p-2 border mr-3" 
                  wire:click="$emit('displayPurchase', {{ $purchase->purchase_id }})">
                <i class="fas fa-folder-open text-primary"></i>
                View
              </button>
              <button class="btn p-2 border mr-3"
                  wire:click="enterConfirmDeletePurchaseMode({{ $purchase }})">
                <i class="fas fa-trash text-danger"></i>
                Delete
              </button>
            </td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr style="font-size: 1.8rem;">
          <th colspan="5" class="text-right pl-3">
            Total
          </th>
          <td>
              @php echo number_format($total); @endphp
          </td>
          <td>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
  @else
    <div class="p-3 text-secondary">
      No purchases
    </div>
  @endif
  @endif
  @if ($modes['confirmDeletePurchase'])
    @livewire ('purchase-list-purchase-delete-confirm', ['purchase' => $deletingPurchase,])
  @endif

</div>
