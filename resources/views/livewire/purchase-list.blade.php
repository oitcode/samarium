<div>


  @if (true)
  <div class="mt-2 mb-3 text-secondary py-3-rm d-flex bg-warning-rm" style="font-size: 1rem;">

    <div class="mt-0 text-secondary py-3-rm mr-3" style="font-size: 1.3rem;">
      <button class="btn btn-success" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left"></i>
      </button>
      <button class="btn btn-success" wire:click="setNextDay">
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
    <div>
      <input type="date" wire:model.defer="startDate" class="mr-3" />
      <input type="date" wire:model.defer="endDate" class="mr-3" />

      <button class="btn btn-success mr-3" wire:click="getPurchasesForDateRange">
        Go
      </button>
    </div>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
    <div class="d-flex justify-content-end flex-grow-1">
      <div class="pl-2 font-weight-bold pr-3 border py-2 bg-white" style="font-size: 1rem;">
        <span class="text-dark" style="font-size: 1.5rem;">
        Rs
        @php echo number_format( $total ); @endphp
        </span>
      </div>
    </div>
  </div>



  @endif

  @if (true)
  @if (!is_null($purchases) && count($purchases) > 0)

  {{-- Show in bigger screens --}}
  <div class="table-responsive bg-white d-none d-md-block">
    <table class="table table-bordered-rm border mb-0" style="font-size: 1rem;">
      <thead>
        <tr class="
            {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
        ">
          <th>
            ID
          </th>
          <th style="width: 100px;">
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
          <th style="width: 200px;">
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
          <tr wire:key="{{ rand() }}" style="font-size: 0.8rem;">
            <td>
              {{ $purchase->purchase_id }}
            </td>
            <td class="" style="font-size: 0.8rem;">
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
                  ,
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

  {{-- Show in smaller screens --}}
  <div class="table-responsive bg-white d-md-none">
    <table class="table table-bordered-rm border mb-0">
      @if (false)
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
      @endif

      <tbody>
        @foreach ($purchases as $purchase)
          <tr wire:key="{{ rand() }}">
            <td>
              {{ $purchase->purchase_id }}
              <div>
                {{ $purchase->created_at->toDateString() }}
              </div>
              <div>
                @if ($purchase->vendor)
                  {{ $purchase->vendor->name }}
                @else
                @endif
              </div>
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
              <span class="font-weight-bold" style="font-size: 1rem;">
              Rs
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
              </span>
              <div>
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
              </div>
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

    </table>
  </div>
  @else
    <div class="pl-3 text-muted">
      No purchases
    </div>
  @endif
  @endif
  @if ($modes['confirmDeletePurchase'])
    @livewire ('purchase-list-purchase-delete-confirm', ['purchase' => $deletingPurchase,])
  @endif

</div>
