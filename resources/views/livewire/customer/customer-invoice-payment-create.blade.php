<x-box-create title="Receive sale invoice payment">

  <div class="row">
    <div class="col-md-3">
      <div class="table-responsive">
        <table class="table table-sm">
          <tr class="border-0">
            <td class="border-0">Sale invoice ID</td>
            <td class="border-0">{{ $saleInvoice->sale_invoice_id }}</td>
          </tr>
          <tr class="border-0">
            <td class="border-0">Date</td>
            <td class="border-0">{{ $saleInvoice->sale_invoice_date }}</td>
          </tr>
          <tr class="border-0">
            <td class="border-0">Total</td>
            <td class="border-0">
              Rs
              @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
            </td>
          </tr>
          <tr class="border-0">
            <td class="border-0">Pending</td>
            <td class="border-0 text-danger">
              Rs
              @php echo number_format( $saleInvoice->getPendingAmount() ); @endphp
            </td>
          </tr>
        </table>
      </div>
    </div>

    <div class="col-md-3">
      <div>
        <i class="fas fa-user text-secondary mr-3"></i>
        {{ $saleInvoice->customer->name}}
      </div>

      <div>
        @if ($saleInvoice->customer->phone)
          <i class="fas fa-phone text-secondary mr-3"></i>
          {{ $saleInvoice->customer->phone}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          Phone unknown
          </span>
        @endif
      </div>

      <div>
        @if ($saleInvoice->customer->email)
          {{ $saleInvoice->customer->email}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          Email unknown
          </span>
        @endif
      </div>

      <div>
        @if ($saleInvoice->customer->address)
          {{ $saleInvoice->customer->address}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          Address unknown
          </span>
        @endif
      </div>

      <div>
        @if ($saleInvoice->customer->pan_num)
          {{ $saleInvoice->customer->pan_num}}
        @else
          <i class="fas fa-exclamation-circle text-danger mr-3"></i>
          <span class="text-secondary">
          PAN number unknown
          </span>
        @endif
      </div>
    </div>
  </div>

  <div class="bg-light p-2">
    <div class="mt-2 font-weight-bold">
      Payment date
    </div>
    <div class="mb-3">
      {{ $payment_date }}
      <br />
      <span class="badge badge-pill badge-secondary">
        {{ Carbon\Carbon::parse($payment_date)->format('l') }}
      <span>
    </div>
  </div>

  <div class="bg-light border p-2">
    <div class="form-group">
      <label>Amount *</label>
      <input type="text" class="form-control" wire:model="pay_amount">
      @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Deposited by</label>
      <input type="text" class="form-control" wire:model="deposited_by">
      @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Payment type</label>
      <select class="w-100 h-100 custom-control"
          wire:model="sale_invoice_payment_type_id">
        <option>---</option>
        @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
          <option value="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}">
            {{ $saleInvoicePaymentType->name }}
          </option>
        @endforeach
      </select>
      @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <div class="p-3">
    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'exitSaleInvoicePaymentCreateMode',])
    @include ('partials.dashboard.spinner-button')
  </div>

</x-box-create>
