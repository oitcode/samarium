<div>
  <div class="p-0" style="">
    <div class="bg-info-rm mb-4">
      <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        Previous
      </button>

      <button class="btn btn-danger m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        Next
      </button>

      <button class="btn btn-danger m-0 float-right" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="">
        <i class="fas fa-calendar mr-3"></i>
        {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
      </button>

      <button class="btn btn-success mr-2 float-right" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="">
        <i class="fas fa-calendar mr-3"></i>
        {{ $daybookDate }}
      </button>

    </div>

  <div class="row">
    <div class="col-md-6">
      @if ($seatTableBookings != null && count($seatTableBookings) > 0)
        <div class="table-responsive">
          <table class="table table-sm-rm table-bordered table-hover shadow-sm">
            <thead>
              <tr class="bg-success text-white" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
                <th style="width: 100px;">Bill no</th>
                <th style="width: 200px;">Date</th>
                <th>Table</th>
                <th style="width: 200px;">Total</th>
                @if (false)
                <th>Cash</th>
                <th>Credit</th>
                <th>Action</th>
                @endif
              </tr>
            </thead>
            <tbody class="bg-white" style="font-size: 1.3rem;">
              @foreach ($seatTableBookings as $seatTableBooking)
                <tr class="" {{--style="background-color: #AFDBF5;"--}}>
                  <td class="text-secondary-rm" style="font-size: 1rem;">
                    90{{ $seatTableBooking->seat_table_booking_id }}
                  </td>
                  <td style="font-size: 1rem;">
                    {{ $seatTableBooking->booking_date }}
                  </td>
                  <td class="text-secondary">
                    <span class="badge badge-success" wire:click="displayBooking({{ $seatTableBooking }})">
                      {{ $seatTableBooking->seatTable->name }}
                    </span>
                  </td>
                  <td class="font-weight-bold">
                    @php echo number_format( $seatTableBooking->getTotalAmount() ); @endphp
                  </td>
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="bg-success-rm text-white-rm" style="font-size: 1.5rem; {{--background-image: linear-gradient(to right, white, #abc);--}}">
                <td class="font-weight-bold text-right" colspan="3">
                  Total
                </td>
                <td class="font-weight-bold">
                  @php echo number_format( $totalBookingAmount ); @endphp
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
      @else
        <div class="text-secondary py-3 px-3" style="font-size: 1.5rem;">
          No sales.
        </div>
      @endif
    </div>
    <div class="col-md-6">
      @if (! $modes['displayBooking'])
      <div class="shadow-sm">
        <div class="card float-right-rm">
          <div class="card-body p-0 bg-success text-white">
            <div class="p-4">
              <h2>
                Total
              </h2>
              <div class="" style="font-size: 2rem;">
              <i class="fas fa-rupee-sign mr-3"></i>
              @php echo number_format( $totalBookingAmount ); @endphp
              </div>
            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
      </div>

      @else
        @livewire ('daybook-booking-display', ['seatTableBooking' => $displayingBooking,])
      @endif
    </div>
  </div>
</div>
