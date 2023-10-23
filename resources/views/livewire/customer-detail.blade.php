<div>


  <div class="bg-white border">
    <div class="table-responsive">
      <table class="table">
        <tbody>
          <tr>
            <th>Name</th>
            <td>{{ $customer->name }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>
              @if ($customer->email)
                {{ $customer->email}}
              @else
                <i class="fas fa-exclamation-circle text-warning mr-1"></i>
                <span class="text-secondary">
                Email unknown
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th>Phone</th>
            <td>
              @if ($customer->phone)
                <i class="fas fa-phone text-secondary mr-3"></i>
                {{ $customer->phone}}
              @else
                <i class="fas fa-exclamation-circle text-warning mr-1"></i>
                <span class="text-secondary">
                Phone unknown
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th>PAN Num</th>
            <td>
              @if ($customer->pan_num)
                {{ $customer->pan_num}}
              @else
                <i class="fas fa-exclamation-circle text-warning mr-1"></i>
                <span class="text-secondary">
                PAN number unknown
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th>Balance</th>
            <td>
              Rs
              @php echo number_format( $customer->getBalance() ); @endphp
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  {{-- Toolbar --}}
  <div class="my-4">
    <div class="mb-3">
      <button class="btn
          @if ($modes['salesHistory'])
            {{ env('OC_ASCENT_BTN_COLOR') }}
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          style="font-size: 1.3rem;" wire:click="enterMode('salesHistory')">
        <i class="fas fa-shopping-cart mr-3"></i>
        Sales
      </button>

      <button class="btn
          @if ($modes['customerPaymentCreate'])
            {{ env('OC_ASCENT_BTN_COLOR') }}
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


  {{--
     |
     | Use required component as per mode
     |
  --}}

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
