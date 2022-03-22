<div class="my-4">

  {{-- Top Menu --}}
  <div class="mb-4">
    <button class="btn btn-success mr-3" wire:click="goToPreviousWeek">
      Previous 
    </button>
    <button class="btn btn-success mr-3" wire:click="goToNextWeek">
      Next
    </button>
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
