<div>
  @if (!is_null($purchases) && count($purchases) > 0)
    <div class="table-responsive" style="font-size: 1.1rem;">
      <table class="table">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Date</th>
            <th>Vendor</th>
            <th>Items</th>
            <th>Payment</th>
            <th>Pending</th>
            <th>Amount</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($purchases as $purchase)
            <tr>
              <td>
                {{ $purchase->purchase_id }}
              </td>
              <td>
                {{ $purchase->created_at->toDateString() }}
              </td>
              <td>
                @if ($purchase->vendor)
                  {{ $purchase->vendor->name }}
                @else
                  <i class="fas fa-exclamation-circle mr-3 text-warning"></i>
                  <span class="text-secondary">
                    Unknown
                  </span>
                @endif
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
              <td style="font-size: 1.1rem;">
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
  @else
    <div class="p-3 text-secondary">
      No purchases
    </div>
  @endif
</div>
