<div class="my-3 bg-white-rm border" style="font-size: 1.3rem;">
  <div class="bg-success text-white p-3">
    <h2 class="">
      Receive sale invoice payment
    </h2>
  </div>

  <div class="row mb-3-rm" style="margin:auto;">
    <div class="col-md-3 p-0 bg-light border">

      <div class="table-responsive mb-0">
        <table class="table table-bordered mb-0">
          <tbody>
            <tr>
              <th class="text-secondary">
                Invoice ID
              </th>
              <td>
                {{ $saleInvoice->sale_invoice_id }}
              </td>
            </tr>

            <tr>
              <th class="text-secondary">
                Invoice date
              </th>
              <td>
                {{ $saleInvoice->sale_invoice_date }}
              </td>
            </tr>

            <tr>
              <th class="text-secondary">
                Total
              </th>
              <td>
                {{ $saleInvoice->getTotalAmount() }}
              </td>
            </tr>

            <tr class="mb-0">
              <th class="text-secondary">
                Pending
              </th>
              <td class="text-danger">
                {{ $saleInvoice->getPendingAmount() }}
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6 p-0 bg-light border">
    </div>

    <div class="col-md-3 p-0 bg-light border">
      <div class="table-responsive">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <th class="text-secondary">
                Customer
              </th>
              <td>
                {{ $saleInvoice->customer->name }}
              </td>
            </tr>

            <tr>
              <th class="text-secondary">
                VAT num
              </th>
              <td>
                {{ $saleInvoice->customer->pan_num }}
              </td>
            </tr>

            <tr>
              <th class="text-secondary">
                Phone
              </th>
              <td>
                {{ $saleInvoice->customer->phone }}
              </td>
            </tr>

            <tr>
              <th class="text-secondary">
                Address
              </th>
              <td>
                {{ $saleInvoice->customer->address }}
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="bg-light border p-2">
    <div class="mt-2 font-weight-bold">
      Payment date
    </div>
    <div class="mb-3">
      {{ $payment_date }}
      <span class="badge badge-pill badge-secondary" style="font-size: 1rem;">
        {{ Carbon\Carbon::parse($payment_date)->format('l') }}
      <span>
    </div>
  </div>

  <div class="bg-light border p-2">

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
  </div>

  <div class="p-3">
    <button type="submit" class="btn btn-success" wire:click="store" style="font-size: 1.3rem;">Submit</button>
    <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')" style="font-size: 1.3rem;">Cancel</button>
  </div>

</div>
