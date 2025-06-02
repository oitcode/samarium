<div>

  @if ($seatTable->isBooked())
    @livewire ('sale.sale-invoice-work', ['saleInvoice' => $seatTable->getCurrentBooking()->saleInvoice,])
  @else
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h1 class="h5 card-title mt-2">
            {{ $seatTable->name }}
          </h1>
        </div>

        <div class="card-body">
          <div class="d-flex">
            <div class="py-2">
              <button onclick="this.disabled=true;" class="btn btn-success mr-3" style="height: 100px; width: 225px;" wire:click="bookSeatTable">
                <i class="fas fa-check mr-3"></i>
                Book table
              </button>
            </div>

            <div class="py-2">
              <button onclick="this.disabled=true;" class="btn btn-danger mr-3" style="height: 100px; width: 225px;"
                  wire:click="deleteSeatTable">
                <i class="fas fa-trash mr-3"></i>
                Delete table
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

</div>
