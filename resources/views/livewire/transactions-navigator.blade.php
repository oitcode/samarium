<div>
  <div class="bg-white border p-3">
    <div class="d-flex justify-content-between">
      <div class="mb-3">
        @if (false)
        <h2 class="h5 font-weight-bold mb-3">

          {{ \Carbon\Carbon::create($daybookDate)->format('l') }}
        </h2>
        @endif
        @if (false)
        <i class="fas fa-calendar mr-2"></i>
        @endif
        <h2 class="h6 font-weight-bold mb-3">
          @if (\Carbon\Carbon::today() == \Carbon\Carbon::create($daybookDate))
            <span class="badge badge-success mr-2">
              TODAY
            </span>
          @elseif (\Carbon\Carbon::yesterday() == \Carbon\Carbon::create($daybookDate))
            <span class="badge badge-warning mr-2">
              YESTERDAY
            </span>
          @elseif (\Carbon\Carbon::tomorrow() == \Carbon\Carbon::create($daybookDate))
            <span class="badge badge-danger mr-2">
              TOMORROW
            </span>
          @endif
          <span class="">
            {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
            &nbsp;&nbsp;
            {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
          </span>
        </h2>

      </div>

      @if (true)
      <div class="mb-4 d-none d-md-block p-0">

        {{-- Date selector --}}
        <div class="float-left d-flex bg-warning-rm">
          <button class="btn btn-light mr-4 p-0 bg-white-rm badge-pill-rm" wire:click="setPreviousDay">
            <i class="far fa-arrow-alt-circle-left fa-2x text-secondary"></i>
          </button>

          <button class="btn btn-light m-0 p-0 bg-white-rm badge-pill-rm" wire:click="setNextDay">
            <i class="far fa-arrow-alt-circle-right fa-2x text-secondary"></i>
          </button>

          <div class="d-none d-md-block my-3-rm text-secondary-rm ml-5" style="font-size: 1rem;">

            <input type="date" wire:model.defer="daybookDate" class="ml-5">
            <button class="btn btn-light" wire:click="setTransactionsDate">
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
    </div>


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
