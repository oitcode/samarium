<div>

  <div class="bg-white border p-3">
    <div class="d-flex justify-content-between">
      <div class="mb-3">
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
          <span>
            {{ Carbon\Carbon::parse($daybookDate)->format('Y F d') }}
            &nbsp;&nbsp;
            {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
          </span>
        </h2>
      </div>

      <div class="mb-4 d-none d-md-block p-0">
        {{-- Date selector --}}
        <div class="d-flex">
          <button class="btn btn-light mr-4 p-0" wire:click="setPreviousDay">
            <i class="far fa-arrow-alt-circle-left fa-2x text-secondary"></i>
          </button>
          <button class="btn btn-light m-0 p-0" wire:click="setNextDay">
            <i class="far fa-arrow-alt-circle-right fa-2x text-secondary"></i>
          </button>
          <div class="d-none d-md-block ml-5">
            <input type="date" wire:model="daybookDate" class="ml-5">
            <button class="btn btn-light" wire:click="setTransactionsDate">
              Go
            </button>
          </div>
          @include ('partials.dashboard.spinner-button')
        </div>
      </div>
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
