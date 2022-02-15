<x-box-generic title="Customer detail">
  <x-menu-bar-horizontal>
    @if (true)
    <x-menu-item fa-class="fas fa-arrow-right" title="Sales hitory" click-method="enterMode('salesHistory')" />
    <x-menu-item fa-class="fas fa-hand-holding-usd" title="Payment" click-method="enterMode('customerPaymentCreate')" />
    <x-menu-item fa-class="fas fa-list" title="Ledger" click-method="enterMode('ledger')" />
    @endif

  </x-menu-bar-horizontal>

  @if (! $modes['ledger'])
  <div class="">

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Customer name
      </div>
      <div class="col-md-9">
        {{ $customer->name }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Phone
      </div>
      <div class="col-md-9">
        {{ $customer->phone }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Email
      </div>
      <div class="col-md-9">
        @if ($customer->email)
          {{ $customer->email }}
        @else
          <div class="text-secondary">
            <i class="fas fa-exclamation-circle text-warning"></i>
            Not found
          </div>
        @endif
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Address
      </div>
      <div class="col-md-9">
        @if ($customer->address)
          {{ $customer->address }}
        @else
          <div class="text-secondary">
            <i class="fas fa-exclamation-circle text-warning"></i>
            Not found
          </div>
        @endif
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        PAN num
      </div>
      <div class="col-md-9">
        @if ($customer->pan_num)
          {{ $customer->pan_num }}
        @else
          <div class="text-secondary">
            <i class="fas fa-exclamation-circle text-warning"></i>
            Not found
          </div>
        @endif
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Balance
      </div>
      <div class="col-md-9 text-danger font-weight-bold">
        {{ $customer->getBalance() }}
      </div>
    </div>

  </div>
  @endif

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

</x-box-generic>
