<div class="bg-white p-3 border shadow">

  <h2 class="my-4">
    {{ $customer->name }}
  </h2>

  <div class="row">
    <div class="col-md-3">

      <div>
        @if ($customer->phone)
          <i class="fas fa-phone text-secondary mr-3"></i>
          {{ $customer->phone}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          Phone unknown
          </span>
        @endif
      </div>

      <div>
        @if ($customer->email)
          {{ $customer->email}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          Email unknown
          </span>
        @endif
      </div>

      <div>
        @if ($customer->address)
          {{ $customer->address}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          Address unknown
          </span>
        @endif
      </div>

      <div>
        @if ($customer->pan_num)
          {{ $customer->pan_num}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          PAN number unknown
          </span>
        @endif
      </div>
    </div>

    <div class="col-md-3">
      <h2 class="h5 text-secondary">
        Balance
      </h2>
      <span class="text-danger" style="font-size: 1.5rem;">
      Rs
      @php echo number_format( $customer->getBalance() ); @endphp
      </span>
    </div>
  </div>

  {{-- Toolbar --}}
  <div class="my-4">
    <div class="mb-3">
      <button class="btn
          @if ($modes['salesHistory'])
            btn-success text-white
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          style="font-size: 1.3rem;" wire:click="enterMode('salesHistory')">
        <i class="fas fa-shopping-cart mr-3"></i>
        Sales
      </button>

      <button class="btn
          @if ($modes['customerPaymentCreate'])
            btn-success text-white
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          style="font-size: 1.3rem;" wire:click="enterMode('customerPaymentCreate')">
        <i class="fas fa-key mr-3"></i>
        Settle
      </button>

      <button wire:loading class="btn m-0"
          style="height: 100px; width: 225px; font-size: 1.5rem;">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>

      <div class="clearfix">
      </div>
    </div>
  </div>
  {{-- ./Toolbar --}}

  @if ($modes['salesHistory'])
    @livewire ('customer-sale-list', ['customer' => $customer,])
  @endif

  @if ($modes['customerPaymentCreate'])
    @livewire ('customer-payment-create', ['customer' => $customer,])
  @endif

  @if ($modes['saleInvoicePaymentCreate'])
    @livewire ('customer-invoice-payment-create', ['saleInvoice' => $paymentReceivingSaleInvoice,])
  @endif

  @if ($modes['saleInvoiceDisplay'])
    @livewire ('core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
  @endif

</div>
