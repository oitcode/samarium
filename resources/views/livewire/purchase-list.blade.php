<div>
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
              {{ $purchase->created_at->format('H:i A') }}
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
                <span class="badge badge-danger">
                  Pending
                </span>
              @elseif ($purchase->payment_status == 'partially_paid')
                <span class="badge badge-warning">
                  Partial
                </span>
              @elseif ($purchase->payment_status == 'paid')
                <span class="badge badge-success">
                  Paid
                </span>
              @else
                {{ $purchase->payment_status }}
              @endif
            </td>
            <td>
              {{ $purchase->getPendingAmount() }}
            </td>
            <td>
              {{ $purchase->getTotalAmount() }}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
