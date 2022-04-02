<div>

  <div class="my-3 text-secondary py-3" style="font-size: 1.3rem;">
    @if (false)
    <i class="fas fa-calendar mr-2"></i>
    @endif

    <input type="date" wire:model.defer="startDate" class="mr-3">
    <input type="date" wire:model.defer="endDate" class="mr-3">

    <button class="btn btn-success" wire:click="getPurchasesForDateRange">
      Go
    </button>

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </span>
  </div>

  <div class="my-4 py-4 px-3 border bg-white shadow-sm">
    <h2>
        Total:
        @php echo number_format($total); @endphp
    </h2>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered" style="font-size: 1.3rem;">
      <thead>
        <tr class="bg-success text-white">
          <th>
            ID
          </th>
          <th>
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
        </tr>
      </thead>

      <tbody>
        @foreach ($purchases as $purchase)
          <tr
              wire:click="$emit('displayPurchase', {{ $purchase->purchase_id }})"
              role="button">
            <td>
              {{ $purchase->purchase_id }}
            </td>
            <td class="" style="font-size: 1rem;">
              {{ $purchase->created_at->toDateString() }}
            </td>
            <td>
              @foreach ($purchase->purchaseItems as $purchaseItem )
                {{ $purchaseItem->product->name }}
              @endforeach
            </td>
            @if (false)
            <td>
              @if ($takeaway->status == 'open')
                <span class="badge badge-danger">
                  Open
                </span>
              @elseif ($takeaway->status == 'closed')
                <span class="badge badge-success">
                  Closed
                </span>
              @else
                {{ $takeaway->status }}
              @endif
            </td>
            @endif
            <td>
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
            </td>
            <td>
              @php echo number_format( $purchase->getPendingAmount() ); @endphp
            </td>
            <td>
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
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
        </tr>
      </tfoot>
    </table>
  </div>
</div>
