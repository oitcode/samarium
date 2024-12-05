<x-box-create title="Create settlement payment">


  <div class="my-3 font-weight-bold">
    <div class="text-secondary">
      Payment date
    </div>
    <span class="badge badge-pill badge-secondary">
      {{ date('Y-m-d') }}
    </span>
  </div>

  <div class="form-group">
    <label>Deposited by</label>
    <input type="text" class="form-control" wire:model="deposited_by">
    @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label>Amount</label>
    <input type="text" class="form-control" wire:model="pay_amount">
    @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
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
    @error('purchase_payment_type_id') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <button type="submit" class="btn btn-success" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$dispatch('exitSettlement')">Cancel</button>


</x-box-create>
