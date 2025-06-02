<div class="p-2 bg-white border">
<h2 class="h5 o-heading py-3 px-1">Purchase</h2>
<div class="my-3 px-2 py-3 border">
  <div class="d-flex">
    <div class="mr-3 font-weight-bold">
      Total:
      {{ config('app.transaction_currency_symbol') }}
      @php echo number_format( $totalPurchaseAmount ); @endphp
    </div>
    <div class="font-weight-bold">
      Bills: {{ $todayPurchaseCount }}
    </div>
  </div>
</div>

<div class="">
  <div class="">
    @if (true)
      {{-- Show in bigger screens --}}
      <div class="table-responsive d-none d-md-block mb-3">
        <table class="table table-hover shadow-sm border mb-0">
          <thead>
            <tr>
              <th style="width: 100px;">ID</th>
              <th class="d-none d-md-table-cell" style="width: 200px;">Time</th>
              <th class="d-none d-md-table-cell" style="width: 500px;">Vendor</th>
              <th style="width: 200px;">
                <span class="d-none d-md-inline">
                  Payment
                </span>
                Status
              </th>
              <th class="d-none d-md-table-cell" style="width: 200px;">Pending Amount</th>
              <th style="width: 200px;">Total</th>
            </tr>
          </thead>

          <tbody>
            @if (count($purchases) > 0)
              @foreach ($purchases as $purchase)
                <tr role="button" wire:click="displayPurchase({{ $purchase }})">
                  <td wire:click="" role="button">
                    <span>
                    {{ $purchase->purchase_id }}
                    </span>
                  </td>
                  <td class="d-none d-md-table-cell">
                    <div>
                      {{ $purchase->created_at->format('H:i A') }}
                    </div>
                  </td>
                  <td class="d-none d-md-table-cell">
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

                    @foreach ($purchase->purchasePayments as $purchasePayment)
                    <span class="badge badge-pill ml-3">
                      {{ $purchasePayment->purchasePaymentType->name }}
                    </span>
                    @endforeach
                  </td>
                  <td class="d-none d-md-table-cell">
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
              {{-- Todo --}} 
            @endif
          </tbody>
        </table>
      </div>

      {{-- Show in smaller screens --}}
      <div class="table-responsive d-md-none bg-white border mb-3">
        <table class="table">
          <tbody>
            @foreach ($purchases as $purchase)
              <tr class="" role="button" wire:click="displayPurchase({{ $purchase }})">
                <td wire:click="" role="button">
                  <span class="text-primary">
                  {{ $purchase->purchase_id }}
                  </span>
                  <div>
                    {{ $purchase->created_at->format('H:i A') }}
                  </div>
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

                  @foreach ($purchase->purchasePayments as $purchasePayment)
                  <span class="badge badge-pill ml-3">
                    {{ $purchasePayment->purchasePaymentType->name }}
                  </span>
                  @endforeach

                  <div>
                    @if ($purchase->vendor)
                      <i class="fas fa-circle text-success mr-3"></i>
                      {{ $purchase->vendor->name }}
                    @endif
                  </div>
                </td>
                <td class="border d-none d-md-table-cell">
                  {{ config('app.transaction_currency_symbol') }}
                  {{ $purchase->getPendingAmount() }}
                </td>
                <td class="font-weight-bold">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $purchase->getTotalAmount() ); @endphp
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Nav links for pagination -- TODO -- --}}
      <div>
        {{ $purchases->links() }}
      </div>

    @else
      <div class="text-secondary py-3 px-3">
        No purchases.
      </div>
    @endif
    
    {{-- Payment by types --}}
    <div class="border mb-3">
      <h2 class="h6 o-heading p-3 mb-0 border">
        Payment by types
      </h2>
      <div class="row m-0 p-3 text-dark d-flex">

        @foreach ($purchasePaymentByType as $key => $val)
          <div class="mb-4 mr-5">
                <h2 class="h6 mb-3 o-heading">
                  {{ $key }}
                </h2>
                <h2 class="h6">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $val ); @endphp
                </h2>
          </div>
        @endforeach

        {{-- Pending Amount --}}
        <div class="">
          <h2 class="h6 mb-3 o-heading">
            Pending
          </h2>
          <h2 class="h6">
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format( $netPurchasePendingAmount ); @endphp
          </h2>
        </div>

      </div>
    </div>

  </div>

  {{-- Daybook item count div --}}
  <div class="border">
    <h2 class="h6 o-heading border p-3 mb-0">
      Product purchase count
    </h2>
    @if (count($todayPurchaseItems) > 0)
      <div class="table-responsive">
        <table class="table table-hover border mb-0">
          <thead>
            <tr>
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
                  <img src="{{ asset('storage/' . $item['product']->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
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
      <div class="p-3">
        <i class="fas fa-exclamation-circle mr-3"></i>
        No purchases
      </div>
    @endif
  </div>
</div>
</div>
