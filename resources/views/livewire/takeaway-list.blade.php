<div>
  <div class="table-responsive">
    <table class="table table-bordered table-hover shadow-sm" style="font-size: 1.3rem;">
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

      <tbody class="bg-white">
        @foreach ($takeaways as $takeaway)
          <tr
              wire:click="$emit('displayTakeaway', {{ $takeaway->takeaway_id }})"
              role="button">
            <td>
              {{ $takeaway->takeaway_id }}
            </td>
            <td class="" style="font-size: 1rem;">
              {{ $takeaway->created_at->toDateString() }}
            </td>
            <td>
              {{ $takeaway->created_at->format('H:i A') }}
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
              @if ($takeaway->saleInvoice->payment_status == 'pending')
                <span class="badge badge-danger">
                  Pending
                </span>
              @elseif ($takeaway->saleInvoice->payment_status == 'partially_paid')
                <span class="badge badge-warning">
                  Partial
                </span>
              @elseif ($takeaway->saleInvoice->payment_status == 'paid')
                <span class="badge badge-success">
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
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
