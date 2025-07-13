<div>

  <x-list-component>
    <x-slot name="listInfo">
      Total: {{ $totalPurchaseCount }}
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell">ID</th>
      <th class="d-none d-md-table-cell">Date</th>
      <th class="d-none d-md-table-cell">Time</th>
      <th class="d-none d-md-table-cell">Vendor</th>
      <th class="d-none d-md-table-cell">Amount</th>
      <th class="d-none d-md-table-cell" style="width: 200px;">Payment Status</th>
      <th class="d-none d-md-table-cell text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($purchases as $purchase)
        <x-table-row-component wire:key="{{ rand() }}">
          <x-table-cell>
            {{ $purchase->purchase_id }}
          </x-table-cell>
          <x-table-cell>
            {{ $purchase->purchase_date }}
          </x-table-cell>
          <td>
            {{ $purchase->created_at->format('H:i A') }}
          </td>
          <td>
            @if ($purchase->vendor)
              {{ $purchase->vendor->name }}
            @else
              <i class="far fa-question-circle text-muted"></i>
            @endif
          </td>
          <td>
            {{ config('app.transaction_currency_symbol') }}
            @if (is_int($purchase->getTotalAmount()))
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
            @else
              @php echo number_format( $purchase->getTotalAmount(), 2 ); @endphp
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
          <td class="text-right">
            @if ($modes['confirmDelete'])
              @if ($deletingPurchase->purchase_id == $purchase->purchase_id)
                <button class="btn btn-danger mr-1" wire:click="deletePurchase">
                  Confirm delete
                </button>
                <button class="btn btn-light mr-1" wire:click="cancelDeletePurchase">
                  Cancel
                </button>
              @endif
            @endif
            @if ($modes['cannotDelete'])
              @if ($deletingPurchase->purchase_id == $purchase->purchase_id)
                <span class="text-danger mr-3">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Purchase cannot be deleted
                </span>
                <button class="btn btn-light mr-1" wire:click="cancelCannotDeletePurchase">
                  Cancel
                </button>
              @endif
            @endif
            <x-list-edit-button-component clickMethod="$dispatch('displayPurchase', { purchaseId: {{ $purchase->purchase_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displayPurchase', { purchaseId: {{ $purchase->purchase_id }} })">
            </x-list-view-button-component>
          </td>
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $purchases->links() }}
    </x-slot>
  </x-list-component>

</div>
