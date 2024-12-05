<div>

  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-0 border-rm">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2">
      Customer

      <i class="fas fa-angle-right mx-2"></i>
      {{ $customer->name }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$dispatch('exitCustomerDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

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
            {{ config('app.oc_ascent_btn_color') }}
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          wire:click="enterMode('salesHistory')">
        <i class="fas fa-shopping-cart mr-3"></i>
        Sales
      </button>

      <button class="btn
          @if ($modes['customerPaymentCreate'])
            {{ config('app.oc_ascent_btn_color') }}
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          wire:click="enterMode('customerPaymentCreate')">
        <i class="fas fa-key mr-3"></i>
        Settle
      </button>

      <button wire:loading class="btn m-0"
          style="height: 100px; width: 225px;">
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
    @livewire ('customer.customer-sale-list', ['customer' => $customer,])
  @endif

  @if ($modes['customerPaymentCreate'])
    @livewire ('customer.customer-payment-create', ['customer' => $customer,])
  @endif

  @if ($modes['saleInvoicePaymentCreate'])
    @livewire ('customer.customer-invoice-payment-create', ['saleInvoice' => $paymentReceivingSaleInvoice,])
  @endif

  @if ($modes['saleInvoiceDisplay'])
    @livewire ('core-sale-invoice-display', ['saleInvoice' => $displayingSaleInvoice,])
  @endif


</div>
