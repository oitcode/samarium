<div class="bg-white p-3 border shadow">

  @if (true)
  <div class=" mb-4">

    <div class="row">
      <div class="col-md-4">
        <div class="card border-0">
          <div class="card-header bg-white border-0">
            <i class="fas fa-user mr-2"></i>
            <span style="font-size: 1.5rem;">
            {{ $customer->name }}
            </span>
          </div>
          <div class="card-body p-0">

            <div class="table-responsive">
              <table class="table table-sm">
                <tbody style="font-size: 1.3rem;">
                  <tr class="border-0">
                    <th class="border-0">
                      <span class="badge mr-2">
                      <i class="fas fa-phone"></i>
                      </span>
                        {{ $customer->phone }}
                    </th>
                  </tr>
                  <tr class="border-0">
                    <th class="border-0">
                      <span class="badge mr-2">
                      <i class="fas fa-envelope"></i>
                      </span>
                        {{ $customer->email }}
                    </th>
                  </tr>
                  <tr class="border-0">
                    <th class="border-0">
                      <i class="fas fa-map-marker-alt"></i>
                      {{ $customer->address }}
                    </th>
                  </tr>
                  <tr class="border-0">
                    <th class="border-0">
                      PAN: 
                      {{ $customer->pan_number }}
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>

      <div class="col-md-4">
        <h2>
          BALANCE
        </h2>
        <div class="text-danger" style="font-size: 2rem;">
          Rs
          @php echo number_format( $customer->getBalance() ); @endphp
        </div>
      </div>

      <div class="col-md-4">
      </div>
    </div>

  </div>
  @endif

  <div class="bg-info-rm mb-4">
    <button class="btn btn-success-rm m-0"
      style="height: 100px; width: 225px;

        @if ($modes['salesHistory'])
          background-color: #008450;
        @endif

        font-size: 1.5rem;"
      wire:click="enterMode('salesHistory')">

      <i class="fas fa-list mr-3"></i>
      Sales history

    </button>

    <button class="btn btn-success-rm m-0"
      style="height: 100px; width: 225px;

        @if ($modes['customerPaymentCreate'])
          background-color: #008450;
        @endif

        font-size: 1.5rem;"
      wire:click="enterMode('customerPaymentCreate')">

      <i class="fas fa-rupee-sign mr-3"></i>
      Payment

    </button>

    <button class="btn btn-success-rm m-0"
      style="height: 100px; width: 225px;

        @if ($modes['ledger'])
          background-color: #008450;
        @endif

        font-size: 1.5rem;"
      wire:click="enterMode('ledger')">

      <i class="fas fa-book mr-3"></i>
      Ledger

    </button>

    <button wire:loading class="btn btn-danger-rm" style="height: 100px; width: 225px; font-size: 1.5rem;">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <span class="ml-3 text-secondary" style="font-size: 1rem;">
        Loading...
      </span>
    </button>

  </div>



  @if ($modes['salesHistory'])
    @livewire ('customer-sale-list', ['customer' => $customer,])
  @endif

  @if ($modes['customerPaymentCreate'])
    @livewire ('customer-payment-create', ['customer' => $customer,])
  @endif

  @if ($modes['saleInvoicePaymentCreate'])
    @livewire ('customer-invoice-payment-create', ['saleInvoice' => $paymentReceivingSaleInvoice,])
  @endif

  @if ($modes['ledger'])
    @livewire ('customer-ledger', ['customer' => $customer,])
  @endif

</div>
