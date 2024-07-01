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
            <td class="border-0" style="font-size: 1.3rem;">
              Rs
              @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
            </td>
          </tr>
          <tr class="border-0">
            <td class="border-0">Pending</td>
            <td class="border-0 text-danger" style="font-size: 1.3rem;">
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
      <span class="badge badge-pill badge-secondary" style="font-size: 1rem;">
        {{ Carbon\Carbon::parse($payment_date)->format('l') }}
      <span>
    </div>
  </div>

  <div class="bg-light border p-2">

    <div class="form-group">
      <label>Amount *</label>
      <input type="text" class="form-control" wire:model.defer="pay_amount" style="font-size: 1.3rem;">
      @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Deposited by</label>
      <input type="text" class="form-control" wire:model.defer="deposited_by" style="font-size: 1.3rem;">
      @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Payment type</label>
      <select class="w-100 h-100 custom-control"
          wire:model.defer="sale_invoice_payment_type_id" style="font-size: 1.3rem;">
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
    <button type="submit" class="btn btn-success" wire:click="store" style="font-size: 1.3rem;">Submit</button>
    <button type="submit" class="btn btn-danger" wire:click="$emit('exitSaleInvoicePaymentCreateMode')" style="font-size: 1.3rem;">Cancel</button>
  </div>


</x-box-create>
