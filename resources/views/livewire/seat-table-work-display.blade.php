<div>
  @if ($seatTable->isBooked())
    @livewire ('sale-invoice-work',
        ['saleInvoice' => $seatTable->getCurrentBooking()->saleInvoice,])
  @else
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h1 class="h5 card-title mt-2">
            {{ $seatTable->name }}
          </h1>
        </div>
        <div class="card-body">
          <div class="py-4">
            <button onclick="this.disabled=true;" class="btn btn-success mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="bookSeatTable">
              <i class="fas fa-check mr-3"></i>
              Book table
            </button>
          </div>
        </div>
      </div>
    </div>
  @endif
</div>
