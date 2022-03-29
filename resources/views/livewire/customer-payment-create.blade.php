<div class="card">

  <div class="card-body p-0" style="font-size: 1.3rem;">

    <div class="bg-success text-white mb-3 p-3">
      <h2>
        Receive Payment
      </h2>
    </div>

    <div class="pl-3">
      <div class="my-3 font-weight-bold">
        <div class="text-secondary">
          Payment date
        </div>
        {{ $payment_date }}
        <span class="badge badge-pill badge-secondary" style="font-size: 1rem;">
          {{ Carbon\Carbon::parse($payment_date)->format('l') }}
        </span>
      </div>

      <div class="form-group">
        <label for="">Deposited by</label>
        <input type="text" class="form-control" wire:model.defer="deposited_by" style="font-size: 1.3rem;">
        @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="">Amount *</label>
        <input type="text" class="form-control" wire:model.defer="pay_amount" style="font-size: 1.3rem;">
        @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="">Payment type</label>
        <select class="w-100 h-100 custom-control"
            wire:model.defer="sale_invoice_payment_type_id">
          <option>---</option>

          @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
            <option value="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}">
              {{ $saleInvoicePaymentType->name }}
            </option>
          @endforeach
        </select>
        @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="p-3 m-0">
        <div class="row">

          <div class="col-md-8">
            <button class="btn btn-lg btn-success mr-3" wire:click="store" style="width: 110px; height: 70px; font-size: 1.3rem;">
              Submit
            </button>

            <button class="btn btn-lg btn-danger" wire:click="$emit('exitCreateMode')" style="width: 110px; height: 70px; font-size: 1.3rem;">
              Cancel
            </button>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
