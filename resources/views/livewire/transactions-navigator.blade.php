<div>
  <div class="bg-white border p-3">
    <div class="mb-3">
      <h2 class="h5 font-weight-bold mb-4">
        Today
      </h2>
    </div>
    @if (false)
    <div class="mb-4 d-none d-md-block p-0">

      {{-- Date selector --}}
      <div class="float-left d-flex bg-warning-rm">
        <button class="btn btn-success-rm mr-4 p-0 bg-white badge-pill-rm" wire:click="setPreviousDay">
          <i class="fas fa-arrow-alt-circle-left fa-2x mr-3-rm
              {{ env('OC_ASCENT_TEXT_LB_COLOR', 'text-success') }}"></i>
        </button>

        <button class="btn btn-danger-rm m-0 p-0 bg-white badge-pill-rm" wire:click="setNextDay">
          <i class="fas fa-arrow-alt-circle-right fa-2x mr-3-rm
              {{ env('OC_ASCENT_TEXT_LB_COLOR', 'text-success') }}"></i>
        </button>

        <div class="d-none d-md-block my-3-rm text-secondary-rm ml-5" style="font-size: 1rem;">
          <i class="fas fa-calendar mr-2"></i>
          {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
          &nbsp;&nbsp;
          {{ Carbon\Carbon::parse($daybookDate)->format('l') }}

          <input type="date" wire:model.defer="daybookDate" class="ml-5">
          <button class="btn {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}" wire:click="setTransactionsDate">
            Go
          </button>
        </div>
      </div>

      <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>

      <div class="clearfix">
      </div>

    </div>
    @endif

    <div class="row">
      <div class="col-md-4">
        @livewire ('flash-card-total-sales-today')
      </div>
      <div class="col-md-4">
        @livewire ('flash-card-total-purchase-today')
      </div>
      <div class="col-md-4">
        @livewire ('flash-card-total-expense-today')
      </div>
    </div>
  </div>
</div>
