<div>
  @if ($seatTable->isBooked())
    @livewire ('sale-invoice-work',
        ['saleInvoice' => $seatTable->getCurrentBooking()->saleInvoice,])
  @else
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1 class="h5 card-title mt-2">
            {{ $seatTable->name }}
          </h1>
          @if (false)
          <i class="fas fa-refresh fa-3x" wire:click="$refresh"></i>
          @endif
        </div>

        <div class="card-body">
          <div class="d-flex">

            <div class="py-2">
              <button onclick="this.disabled=true;" class="btn btn-success mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="bookSeatTable">
                <i class="fas fa-check mr-3"></i>
                Book table
              </button>
            </div>

            <div class="py-2">
              <button onclick="this.disabled=true;" class="btn btn-danger mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;"
                  wire:click="deleteSeatTable">
                <i class="fas fa-trash mr-3"></i>
                Delete table
              </button>
            </div>

            @if (false)
            <div class="py-2">
              <button onclick="this.disabled=true;" class="btn btn-dark mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="bookSeatTable">
                <i class="fas fa-eye-slash mr-3"></i>
                Make inactive
              </button>
            </div>
            @endif

          </div>
        </div>
      </div>
    </div>
  @endif
</div>
