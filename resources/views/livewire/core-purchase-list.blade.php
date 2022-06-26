<div>
  @if (!is_null($purchases) && count($purchases) > 0)

    {{-- Show in bigger screens --}}
    <div class="table-responsive d-none d-md-block" style="font-size: 1.1rem;">
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
            <th>Action</th>
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
              <td>
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-money-check-alt text-primary mr-2"></i>
                      Receive payment
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-print text-primary mr-2"></i>
                      Print
                    </button>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    {{-- Show in smaller screens --}}
    <div class="table-responsive d-md-none border">
      <table class="table">
        <tbody>
          @foreach ($purchases as $purchase)
            <tr>
              <td>
                {{ $purchase->purchase_id }}
                <div>
                  {{ $purchase->created_at->toDateString() }}
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
                <div class="font-weight-bold">
                Rs
                @php echo number_format( $purchase->getTotalAmount() ); @endphp
                </div>
                <div>
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
                </div>
              </td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-money-check-alt text-primary mr-2"></i>
                      Receive payment
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-print text-primary mr-2"></i>
                      Print
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
    <div class="p-3 text-secondary">
      No purchases
    </div>
  @endif
</div>
