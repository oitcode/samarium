<div>

  <x-create-box-component title="Make purchase payment">
    <div class="row">
      <div class="col-md-3">
        <div class="table-responsive">
          <table class="table table-sm">
            <tr class="border-0">
              <td class="border-0">Purchase ID</td>
              <td class="border-0">{{ $purchase->purchase_id }}</td>
            </tr>
            <tr class="border-0">
              <td class="border-0">Date</td>
              <td class="border-0">{{ $purchase->purchase_date }}</td>
            </tr>
            <tr class="border-0">
              <td class="border-0">Total</td>
              <td class="border-0">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $purchase->getTotalAmount() ); @endphp
              </td>
            </tr>
            <tr class="border-0">
              <td class="border-0">Pending</td>
              <td class="border-0 text-danger">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $purchase->getPendingAmount() ); @endphp
              </td>
            </tr>
          </table>
        </div>
      </div>
  
      <div class="col-md-3">
        <div>
          <i class="fas fa-user text-secondary mr-3"></i>
          {{ $purchase->vendor->name}}
        </div>
  
        <div>
          @if ($purchase->vendor->phone)
            <i class="fas fa-phone text-secondary mr-3"></i>
            {{ $purchase->vendor->phone}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            Phone unknown
            </span>
          @endif
        </div>
  
        <div>
          @if ($purchase->vendor->email)
            {{ $purchase->vendor->email}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            Email unknown
            </span>
          @endif
        </div>
  
        <div>
          @if ($purchase->vendor->address)
            {{ $purchase->vendor->address}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            Address unknown
            </span>
          @endif
        </div>
  
        <div>
          @if ($purchase->vendor->pan_num)
            {{ $purchase->vendor->pan_num}}
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
        <label>
          Amount
          (
          {{ config('app.transaction_currency_symbol') }}
          )
          *
        </label>
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
            wire:model="purchase_payment_type_id">
          <option>---</option>
          @foreach ($purchasePaymentTypes as $purchasePaymentType)
            <option value="{{ $purchasePaymentType->purchase_payment_type_id }}">
              {{ $purchasePaymentType->name }}
            </option>
          @endforeach
        </select>
        @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>
  
    <div class="p-3">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitPurchasePaymentCreateMode',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
