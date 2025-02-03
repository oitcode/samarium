<div>

  <x-create-box-component title="Receive payment">
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
        <input type="text" class="form-control" wire:model="deposited_by">
        @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label>Amount ({{ config('app.transaction_currency') }}) *</label>
        <input type="text" class="form-control" wire:model="pay_amount">
        @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
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

      <div class="py-3 m-0">
        @include ('partials.button-store')
        @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCustomerPaymentCreateMode'])
        @include ('partials.dashboard.spinner-button')
      </div>
    </div>
  </x-create-box-component>

</div>
