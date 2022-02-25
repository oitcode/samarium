<div>
  <div class="p-0" style="">
    <div class="bg-info">
      <button class="btn btn-success m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left mr-3"></i>
        Previous
      </button>

      <button class="btn btn-danger m-0" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="setNextDay">
        <i class="fas fa-arrow-right mr-3"></i>
        Next
      </button>

      <span class="badge badge-pill mt-2" style="font-size: 1.5rem;">
        {{ $daybookDate }}
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
      </span>
    </div>

    @if (false)
    <x-menu-bar-horizontal>
      <x-menu-item title="Previous" fa-class="fas fa-arrow-left" click-method="setPreviousDay" />
      <x-menu-item title="Next" fa-class="fas fa-arrow-right" click-method="setNextDay" />
      <span class="badge badge-pill mt-2">
        {{ $daybookDate }}
        &nbsp;
        &nbsp;
        |
        &nbsp;
        &nbsp;
        {{ Carbon\Carbon::parse($daybookDate)->format('l') }}
      </span>
    </x-menu-bar-horizontal>
  </div>
  @endif

  @if (false)
  @if ($saleInvoices != null && count($saleInvoices) > 0)
    <div class="table-responsive">
      <table class="table table-sm table-hover">
        <thead>
          <tr class="text-secondary">
            <th>ID</th>
            <th>Date</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Cash</th>
            <th>Credit</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($saleInvoices as $saleInvoice)
            <tr>
              <td>
                {{ $saleInvoice->sale_invoice_id }}
              </td>
              <td>
                {{ $saleInvoice->sale_invoice_date }}
              </td>
              <td>
                <a href="" wire:click.prevent="$emit('displaySaleInvoice', {{ $saleInvoice->sale_invoice_id }})">
                {{ $saleInvoice->customer->name }}
                </a>
              </td>
              <td>
                {{ $saleInvoice->getTotalAmount() }}
              </td>
              <td>
                {{ $saleInvoice->getPaidAmount() }}
              </td>
              <td>
                {{ $saleInvoice->getPendingAmount() }}
              </td>
              <td>
                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-pencil-alt text-info"></i>
                </span>

                <span class="btn btn-tool btn-sm" wire:click="">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td class="font-weight-bold" colspan="3">
              Total
            </td>
            <td class="font-weight-bold">
              {{ $totalAmount }}
            </td>
            <td class="font-weight-bold">
              {{ $totalCashAmount }}
            </td>
            <td class="font-weight-bold">
              {{ $totalCreditAmount }}
            </td>
            <td>
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @else
    <div class="text-secondary py-3 px-3">
      No sales.
    </div>
  @endif
  @endif

  <div class="row">
    <div class="col-md-6">
      @if ($seatTableBookings != null && count($seatTableBookings) > 0)
        <div class="table-responsive">
          <table class="table table-sm-rm table-bordered table-hover">
            <thead>
              <tr class="bg-light-rm" style="font-size: 1.3rem; background-color: orange;">
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
                    <span class="badge badge-primary" wire:click="displayBooking({{ $seatTableBooking }})">
                      {{ $seatTableBooking->seatTable->name }}
                    </span>
                  </td>
                  <td class="font-weight-bold">
                    {{ $seatTableBooking->getTotalAmount() }}
                  </td>
                  @if (false)
                  <td>
                  </td>
                  <td>
                  </td>
                  <td>
                    <span class="btn btn-tool btn-sm" wire:click="">
                      <i class="fas fa-pencil-alt text-info"></i>
                    </span>

                    <span class="btn btn-tool btn-sm" wire:click="">
                      <i class="fas fa-trash text-danger"></i>
                    </span>
                  </td>
                  @endif
                </tr>
              @endforeach
            </tbody>
            <tfoot>
              <tr class="bg-success text-white" style="font-size: 1.5rem; {{--background-image: linear-gradient(to right, white, #abc);--}}">
                <td class="font-weight-bold text-right" colspan="3">
                  Total
                </td>
                <td class="font-weight-bold">
                  {{ $totalBookingAmount }}
                </td>
                @if (false)
                <td class="font-weight-bold">
                  {{ $totalCashAmount }}
                </td>
                <td class="font-weight-bold">
                  {{ $totalCreditAmount }}
                </td>
                <td>
                </td>
                @endif
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
      <div class="d-flex justify-content-center h-100 bg-warning-rm" style="background-color: #abc;">
        <div class="justify-content-center align-self-center text-center">
          <h3 class="h5 font-weight-bold" style="font-size: 1.8rem;">
            TOTAL: {{ $totalBookingAmount }}
          </h3>
        </div>
      </div>
      @else
        @livewire ('daybook-booking-display', ['seatTableBooking' => $displayingBooking,])
      @endif
    </div>
  </div>
</div>
