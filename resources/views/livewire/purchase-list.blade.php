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
  <div class="table-responsive bg-white">
    <table class="table table-bordered-rm border" style="font-size: 1.1rem;">
      <thead>
        <tr class="text-secondary">
          <th>
            ID
          </th>
          <th style="width: 200px;">
            Date
          </th>
          <th>
            Vendor
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
          <th style="width: 200px;">
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
              @if ($purchase->vendor)
                {{ $purchase->vendor->name }}
              @else
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
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="$emit('displayPurchase', {{ $purchase->purchase_id }})">
                    <i class="fas fa-file text-primary mr-2"></i>
                    View
                  </button>
                  <button class="dropdown-item" wire:click="enterConfirmDeletePurchaseMode({{ $purchase }})">
                    <i class="fas fa-trash text-danger mr-2"></i>
                    Delete
                  </button>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr style="font-size: 1.8rem;">
          <th colspan="6" class="text-right pl-3">
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
