<div class="bg-white border p-2 o-border-radius py-4 mb-3">
<div class="d-flex justify-content-between mt-2 mb-4 px-1">
  <h2 class="h5 o-heading px-1">Purchase</h2>
  <div class="px-2 py-3-rm border-rm">
    <div class="d-flex">
      <div class="mr-3 font-weight-bold">
        Total:
        {{ config('app.transaction_currency_symbol') }}
        @php echo number_format( $totalPurchaseAmount ); @endphp
      </div>
      <div>
        <span class="badge-pill mr-3 text-primary px-3 py-1" style="background-color: #e3f2fd;">
          Bills:
          {{ $todayPurchaseCount }}
        </span>
      </div>
    </div>
  </div>
</div>

<div>
  <div>
    <div class="table-responsive mb-3 border o-border-radius">
      <table class="table table-hover mb-0 text-nowrap">
        <thead>
          <tr class="table-primary">
            <th class="o-heading" style="width: 100px;">ID</th>
            <th class="o-heading" style="width: 200px;">Time</th>
            <th class="o-heading" style="width: 500px;">Vendor</th>
            <th class="o-heading" style="width: 200px;">Payment Status</th>
            <th class="o-heading" style="width: 200px;">Pending Amount</th>
            <th class="o-heading" style="width: 200px;">Total</th>
          </tr>
        </thead>

        <tbody>
          @if (count($purchases) > 0)
            @foreach ($purchases as $purchase)
              <tr class="table-danger" role="button" wire:click="displayPurchase({{ $purchase }})">
                <td wire:click="" role="button">
                  <span>
                  {{ $purchase->purchase_id }}
                  </span>
                </td>
                <td class="">
                  <div>
                    {{ $purchase->created_at->format('H:i A') }}
                  </div>
                </td>
                <td class="">
                  @if ($purchase->vendor)
                    <i class="fas fa-user-circle mr-2"></i>
                    {{ $purchase->vendor->name }}
                  @else
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    <span>
                      Unknown
                    </span>
                  @endif
                </td>
                <td>
                  @if ( $purchase->payment_status == 'paid')
                  <span class="badge badge-pill badge-success">
                  Paid
                  </span>
                  @elseif ( $purchase->payment_status == 'partially_paid')
                  <span class="badge badge-pill badge-warning">
                  Partial
                  </span>
                  @elseif ( $purchase->payment_status == 'pending')
                  <span class="badge badge-pill badge-danger">
                    Pending
                  </span>
                  @else
                  <span class="badge badge-pill badge-secondary">
                    {{ $purchase->payment_status }}
                  </span>
                  @endif
                </td>
                <td class="">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $purchase->getPendingAmount() ); @endphp
                </td>
                <td class="font-weight-bold">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $purchase->getTotalAmount() ); @endphp
                </td>
              </tr>
            @endforeach
          @else
            <tr class="table-danger">
              <td colspan="6" class="py-4">
                <i class="fas fa-exclamation-circle mr-1"></i>
                No purchase
              </td>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
    
    {{-- Payment by types --}}
    <div class="border mb-3 o-border-radius pt-4">
      <h2 class="h6 o-heading px-3 mb-4">
        Payment by types
      </h2>
      <div class="table-responsive o-border-bottom-radius">
        <table class="table text-nowrap mb-0">
          <thead>
            <tr class="table-primary">
              @foreach ($purchasePaymentByType as $key => $val)
                <th class="o-heading">
                  {{ $key }}
                </th>
              @endforeach
              <th class="o-heading">
                Pending
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="table-warning">
              @foreach ($purchasePaymentByType as $key => $val)
                <td>
                  {{ config('app.transaction_currency_symbol') }}
                  {{ $val }}
                </td>
              @endforeach
              <td>
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $netPurchasePendingAmount ); @endphp
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  {{-- Daybook item count div --}}
  <div class="border o-border-radius">
    <h2 class="h6 o-heading mb-0 px-3 py-4">
      Product purchase count
    </h2>
    @if (count($todayPurchaseItems) > 0)
      <div class="table-responsive o-border-bottom-radius">
        <table class="table table-hover mb-0">
          <thead>
            <tr class="table-primary">
              <th class="o-heading" colspan="2">
                Item
              </th>
              <th class="o-heading">
                Quantity
              </th>
            </tr>
          </thead>

          <tbody class="bg-white">
            @foreach ($todayPurchaseItems as $item)
              <tr>
                <td style="width: 50px;">
                  @if ($item['product']->image_path)
                    <img src="{{ asset('storage/' . $item['product']->image_path) }}" class="mr-3 o-border-radius" style="width: 40px; height: 40px;">
                  @else
                    <div style="width: 40px; height: 40px; background-color: #ddd;" class="o-border-radius">
                    </div>
                  @endif
                </td>
                <td>
                  {{ $item['product']->name }}
                </td>
                <td>
                  {{ $item['quantity'] }}
                </td>
              <tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      <div class="px-3 pb-3">
        <i class="fas fa-exclamation-circle mr-1"></i>
        No purchases
      </div>
    @endif
  </div>
</div>
</div>
