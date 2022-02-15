<x-box-create title="Receive invoice payment">

  <div class="row mb-3">
    <div class="col-md-3 py-2 bg-light border">

      <div>
        <span class="font-weight-bold" style="width: 500px;">
          Invoice ID: 
        </span>
        {{ $saleInvoice->sale_invoice_id }}
      </div>

      <div>
        <span class="font-weight-bold" style="width: 500px !important; ">
          Invoice Date: 
        </span>
        {{ $saleInvoice->sale_invoice_date }}
      </div>

      <div>
        <span class="font-weight-bold" style="width: 500px;">
          Total:
        </span>
        {{ $saleInvoice->total_amount }}
      </div>

      <div>
        <span class="font-weight-bold" style="width: 500px;">
          Pending:
        </span>
        {{ $saleInvoice->getPendingAmount() }}
      </div>

    </div>

    <div class="col-md-9 py-2 bg-light border">
      <div>
        <span class="font-weight-bold" style="width: 500px;">
          Customer:
        </span>
        {{ $saleInvoice->customer->name }}
      </div>

      <div>
        <span class="font-weight-bold" style="width: 500px !important; ">
          VAT num:
        </span>
        {{ $saleInvoice->customer->pan_num }}
      </div>

      <div>
        <span class="font-weight-bold" style="width: 500px;">
          Phone:
        </span>
        {{ $saleInvoice->customer->phone }}
      </div>

      <div>
        <span class="font-weight-bold" style="width: 500px;">
          Address:
        </span>
        {{ $saleInvoice->customer->address }}
      </div>
    </div>

  </div>

  <div class="bg-light border">
    <div class="my-3 font-weight-bold">
      Payment date:
      &nbsp;
      &nbsp;
      {{ $payment_date }}
      &nbsp;
      &nbsp;
      |
      &nbsp;
      &nbsp;
      {{ Carbon\Carbon::parse($payment_date)->format('l') }}
    </div>

    <div class="form-group">
      <label for="">Amount *</label>
      <input type="text" class="form-control" wire:model.defer="pay_amount">
      @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
      <label for="">Deposited by</label>
      <input type="text" class="form-control" wire:model.defer="deposited_by">
      @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  </div>

  <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>

</x-box-create>
