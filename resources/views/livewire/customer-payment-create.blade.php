<div class="card">

  <div class="card-body p-0" style="font-size: 1.3rem;">

    <div class="bg-success text-white mb-3 p-3">
      <h2>
        Receive Payment
      </h2>
    </div>

    <div class="p-3">
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
        <input type="text" class="form-control" wire:model.defer="pay_amount" style="font-size: 1.3rem;">
        @error('pay_amount') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="form-group">
        <label for="">Deposited by</label>
        <input type="text" class="form-control" wire:model.defer="deposited_by" style="font-size: 1.3rem;">
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
