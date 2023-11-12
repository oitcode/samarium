<div>
  <h2 class="font-weight-bold pt-1" style="font-size: 1.5rem;">
    <span class="mr-2">
      Rs
    </span>
    @php echo number_format( $totalPurchaseAmount ); @endphp
  </h2>
</div>

<div class="row">


  <div class="col-md-12">
    @if (true)

      {{-- Show in bigger screens --}}
      <div class="table-responsive d-none d-md-block mb-5">
        <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border mb-0">
          <thead>
            <tr class="bg-white" style="font-size: 1rem;">
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

          <tbody class="bg-white" style="font-size: calc(0.7rem + 0.3vw);">
            @if (count($purchases) > 0)
              @foreach ($purchases as $purchase)
                <tr class="" role="button" wire:click="displayPurchase({{ $purchase }})">
                  <td class="text-secondary-rm"
                      style="font-size: 1rem;"
                      wire:click=""
                      role="button">
                    <span class="text-primary">
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
                      <i class="fas fa-user-circle text-muted mr-2"></i>
                      {{ $purchase->vendor->name }}
                    @else
                      <i class="fas fa-exclamation-circle text-warning mr-3"></i>
                      <span class="text-secondary" style="font-size: 1rem;">
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
      <div class="table-responsive d-md-none bg-white border">
        <table class="table">
          <tbody>
            @foreach ($purchases as $purchase)
              <tr class="" role="button" wire:click="displayPurchase({{ $purchase }})">
                <td class="text-secondary-rm"
                    style="font-size: 1rem;"
                    wire:click=""
                    role="button">
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
                <td class="font-weight-bold" style="font-size: 1rem;">
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
      <div class="text-secondary py-3 px-3" style="font-size: 1.5rem;">
        No purchases.
      </div>
    @endif
    
    {{-- Payment by types --}}
    <div class="mt-4 border">
      <h2 class="h5 font-weight-bold bg-white p-3 mb-0 border">
        Payment by types
      </h2>
      <div class="row border-rm m-0 p-3 bg-white text-dark d-flex">

        @foreach ($purchasePaymentByType as $key => $val)
          <div class="mb-4 mr-5">
                <h2 class="text-muted-rm mb-3 font-weight-bold h6">
                  {{ $key }}
                </h2>
                <h3 class="text-dark-rm font-weight-bold h5">
                  Rs
                  @php echo number_format( $val ); @endphp
                </h3>
          </div>
        @endforeach

        {{-- Pending Amount --}}
        <div class="">
          <h2 class="text-muted mb-3 font-weight-bold h6">
            Pending
          </h2>
          <h3 class="text-danger font-weight-bold h5">
            Rs
            @php echo number_format( $netPurchasePendingAmount ); @endphp
          </h3>
        </div>

      </div>
    </div>

  </div>

  {{-- Daybook item count div --}}
  <div class="col-md-6 mt-5">
    <h2 class="h5 font-weight-bold text-muted-rm mb-3">
      Product purchase count
    </h2>
    @if (count($todayPurchaseItems) > 0)
      <div class="table-responsive">
        <table class="table table-bordered-rm table-hover" style="font-size: 1rem;">
          <thead>
            <tr class="bg-white">
              <th colspan="2">
                Item
              </th>
              <th>
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
      <div class="text-muted">
        <i class="fas fa-exclamation-circle mr-3"></i>
        No purchases
      </div>
    @endif
  </div>
</div>
