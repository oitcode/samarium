<x-box-create title="Receive payment">

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

  <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
  <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>

</x-box-create>
