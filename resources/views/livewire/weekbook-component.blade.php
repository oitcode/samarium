<div class="mb-4">

  {{-- Top Menu --}}
  <div class="mb-4">
    <button class="btn btn-success m-0 p-3"
        wire:click="goToPreviousWeek"
        style="height: 100px; width: 225px; font-size: 1.5rem;"
    >
      <i class="fas fa-arrow-left mr-3"></i>
      Previous 
    </button>
    <button class="btn btn-danger mx-0 p-3 pr-5"
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

    <button class="btn btn-success p-3 pr-5 float-right" wire:click="goToNextWeek" style="font-size:1.3rem;">
      <h2>
        <i class="fas fa-rupee-sign mr-3"></i>
        @php echo number_format($totalAmount); @endphp
      <h2>
    </button>
    <div class="clearfix">
    </div>
  </div>

  @if (count($weekBook) > 0)
    <div class="table-responsive">
      <table class="table table-bordered" style="font-size: 1.3rem;">
        <thead>
          <tr class="bg-success text-white">
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

        <tbody>
            @foreach ($weekBook as $day)
              <tr> 
                <td>
                  @if (\Carbon\Carbon::today() == $day['day'])
                    <span class="badge badge-success">
                      TODAY
                    </span>

                  @else
                    <span class="text-secondary" style="font-size: 1rem;">
                      {{ $day['day']->format('Y-m-d') }}
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

        <tfoot>
          <tr>
            <td colspan="3" class="text-right mr-3 font-weight-bold">
              TOTAL
            </td>
            <td class="font-weight-bold">
              @php echo number_format($totalAmount); @endphp
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @endif
</div>
