<div class="p-2 bg-danger text-white border">
<h2 class="h5 o-heading py-3 px-1 text-white">Purchase</h2>
<div class="my-3 px-2 py-3 bg-danger border">
  <div class="d-flex">
    <div class="mr-3 font-weight-bold">
      Total:
      Rs
      @php echo number_format( $totalPurchaseAmount ); @endphp
    </div>
    <div class="font-weight-bold">
      Bills: {{ $todayPurchaseCount }}
    </div>
  </div>
</div>

<div class="row-rm">


  <div class="col-md-12-rm">
    @if (true)

      {{-- Show in bigger screens --}}
      <div class="table-responsive d-none d-md-block mb-3">
        <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
          <thead>
            <tr class="bg-danger text-white">
              <th style="width: 100px;">ID</th>
              <th class="d-none d-md-table-cell" style="width: 200px;">Time</th>
              <th class="d-none d-md-table-cell" style="width: 500px;">Vendor</th>
              <th class="border-rm" style="width: 200px;">
                <span class="d-none d-md-inline">
                  Payment
                </span>
                Status
              </th>
              <th class="border-rm d-none d-md-table-cell" style="width: 200px;">Pending Amount</th>
              <th style="width: 200px;">Total</th>
            </tr>
          </thead>

          <tbody class="bg-danger">
            @if (count($purchases) > 0)
              @foreach ($purchases as $purchase)
                <tr class="bg-danger text-white" role="button" wire:click="displayPurchase({{ $purchase }})">
                  <td class="text-secondary-rm" wire:click="" role="button">
                    <span class="text-primary-rm">
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
                      <i class="fas fa-user-circle text-muted-rm mr-2"></i>
                      {{ $purchase->vendor->name }}
                    @else
                      <i class="fas fa-exclamation-circle text-warning-rm mr-1"></i>
                      <span class="text-secondary-rm">
                        Unknown
                      </span>
                    @endif
                  </td>
                  <td class="border-rm">
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
                  <td class="border-rm d-none d-md-table-cell">
                    @php echo number_format( $purchase->getPendingAmount() ); @endphp
                  </td>
                  <td class="font-weight-bold">
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
                <td class="text-secondary-rm" wire:click="" role="button">
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
                  {{ $purchase->getPendingAmount() }}
                </td>
                <td class="font-weight-bold">
                  Rs
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
      <h2 class="h6 o-heading bg-danger text-white p-3 mb-0 border">
        Payment by types
      </h2>
      <div class="row border-rm m-0 p-3 bg-danger text-dark d-flex">

        @foreach ($purchasePaymentByType as $key => $val)
          <div class="mb-4 mr-5 text-white">
                <h2 class="h6 mb-3 o-heading text-white">
                  {{ $key }}
                </h2>
                <h2 class="h6">
                  Rs
                  @php echo number_format( $val ); @endphp
                </h2>
          </div>
        @endforeach

        {{-- Pending Amount --}}
        <div class="">
          <h2 class="h6 text-muted-rm mb-3 o-heading text-white">
            Pending
          </h2>
          <h2 class="h6 text-white">
            Rs
            @php echo number_format( $netPurchasePendingAmount ); @endphp
          </h2>
        </div>

      </div>
    </div>

  </div>

  {{-- Daybook item count div --}}
  <div class="col-md-12-rm border">
    <h2 class="h6 o-heading bg-danger text-white border p-3 mb-0">
      Product purchase count
    </h2>
    @if (count($todayPurchaseItems) > 0)
      <div class="table-responsive">
        <table class="table table-hover border mb-0">
          <thead>
            <tr class="bg-danger text-white">
              <th class="o-heading text-white" colspan="2">
                Item
              </th>
              <th class="o-heading text-white">
                Quantity
              </th>
            </tr>
          </thead>

          <tbody class="bg-white">
            @foreach ($todayPurchaseItems as $item)
              <tr class="bg-danger text-white">
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
      <div class="text-white p-3">
        <i class="fas fa-exclamation-circle mr-3"></i>
        No purchases
      </div>
    @endif
  </div>
</div>
</div>
