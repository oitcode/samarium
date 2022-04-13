<x-box-create title="Create settlement payment">

  <div class="my-3 font-weight-bold">
    <div class="text-secondary">
      Payment date
    </div>
    <span class="badge badge-pill badge-secondary" style="font-size: 1rem;">
      {{ date('Y-m-d') }}
    </span>
  </div>

  <div class="form-group">
    <label for="">Deposited by</label>
    <input type="text" class="form-control" wire:model.defer="deposited_by" style="font-size: 1.3rem;">
    @error('deposited_by') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Amount</label>
    <input type="text" class="form-control" wire:model.defer="pay_amount" style="font-size: 1.3rem;">
    @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
  </div>

  <div class="form-group">
    <label for="">Payment type</label>
    <select class="w-100 h-100 custom-control"
        wire:model.defer="purchase_payment_type_id" style="font-size: 1.3rem;">
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
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitSettlement')">Cancel</button>

</x-box-create>
