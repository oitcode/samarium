<div class="mb-4">

  {{-- Top Menu --}}
  <div class="mb-4">
    <button class="btn btn-success-rm m-0 p-3 border shadow-sm bg-white"
        wire:click="goToPreviousWeek"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
    >
      <i class="fas fa-arrow-left mr-3"></i>
      Previous 
    </button>
    <button class="btn btn-danger-rm mx-0 p-3 pr-5 border shadow-sm bg-white"
        wire:click="goToNextWeek"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
    >
      <i class="fas fa-arrow-right mr-3"></i>
      Next
    </button>

    <button wire:loading class="btn btn-danger-rm" style="">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>

    <button class="btn btn-success-rm p-3 pr-5 float-right border shadow-sm bg-white" wire:click="" style="font-size:1.3rem;">
      <h2>
        <span class="mr-2">
          Rs
        </span>
        @php echo number_format($totalAmount); @endphp
      <h2>
    </button>
    <div class="clearfix">
    </div>
  </div>

  <div class="d-none d-md-block my-3 text-secondary" style="font-size: 1.3rem;">
    <div class="row">
      <div class="col-md-3">
        <i class="fas fa-calendar mr-2"></i>
        {{ Carbon\Carbon::parse($startDay)->format('Y F d') }}
        &nbsp;&nbsp;
        {{ Carbon\Carbon::parse($startDay)->format('l') }}
        <br />
        <i class="fas fa-calendar mr-2"></i>
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('Y F d') }}
        &nbsp;&nbsp;
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('l') }}
      </div>

      <div class="col-md-3">
        <input type="date" wire:model.defer="weekStartDate" class="ml-5">
        <button class="btn btn-success" wire:click="setStartOfWeek">
          Go
        </button>
      </div>
    </div>
  </div>

  @if (count($weekBook) > 0)
    <div class="table-responsive m-0 p-0">
      <table class="table table-bordered-rm table-hover shadow-sm border" style="font-size: 1.1rem;">
        <thead>
          <tr class="bg-success-rm text-white-rm">
            <th>
              Date
            </th>
            <th>
              Day
            </th>
            <th>
              Bills
            </th>
            <th>
              Total
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
            @foreach ($weekBook as $day)
              <tr> 
                <td>
                  @if (\Carbon\Carbon::today() == $day['day'])
                    <span class="badge badge-success">
                      TODAY
                    </span>

                  @else
                    <span class="text-secondary" style="font-size: 1rem;">
                      {{ $day['day']->format('Y F d') }}
                    </span>
                  @endif
                </td>
                <td>
                  {{ $day['day']->format('l') }}
                </td>
                <td>
                  {{ $day['totalBills'] }}
                </td>
                <td>
                @php echo number_format( $day['totalAmount'] ); @endphp
                </td>
              <tr>
            @endforeach
        </tbody>

        <tfoot class="bg-white">
          <tr>
            <td colspan="3" class="text-right mr-3 font-weight-bold" style="font-size: 2rem;">
              Total
            </td>
            <td class="font-weight-bold" style="font-size: 2rem;">
              @php echo number_format($totalAmount); @endphp
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @endif
</div>
