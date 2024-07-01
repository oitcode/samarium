<x-box-create title="Receive payment">


  <div class="p-0">
    <div class="my-3 font-weight-bold">
      <div class="text-secondary">
        Payment date
        <span>
          {{ date('Y-m-d') }}
        </span>
      </div>
    </div>

    <div class="form-group">
      <label>Deposited by</label>
      <input type="text" class="form-control" wire:model.defer="deposited_by" style="font-size: 1.3rem;">
      @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label>Amount *</label>
      <input type="text" class="form-control" wire:model.defer="pay_amount" style="font-size: 1.3rem;">
      @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
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

    <div class="py-3 m-0">
      <div class="row">

        <div class="col-md-8">
          @include ('partials.button-store')
          @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCustomerPaymentCreateMode'])
        </div>
      </div>

    </div>
  </div>


</x-box-create>
