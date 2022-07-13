<div class="mb-4 p-3 p-md-0">

  {{-- Top Menu --}}
  {{-- Show in bigger screens --}}
  <div class="mb-4 d-none d-md-block">
    <button class="btn btn-success-rm m-0 p-0 bg-white badge-pill mr-4" wire:click="goToPreviousWeek">
      <i class="fas fa-arrow-alt-circle-left fa-4x mr-3-rm text-success"></i>
    </button>
    <button class="btn btn-danger-rm mx-0 p-0 badge-pill bg-white" wire:click="goToNextWeek">
      <i class="fas fa-arrow-alt-circle-right fa-4x mr-3-rm text-success"></i>
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
      </h2>
    </button>
    <div class="clearfix">
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="bg-info-rm mb-4 d-md-none">
    <button class="btn btn-success-rm m-0" style="font-size: 1.5rem;" wire:click="goToPreviousWeek">
      <i class="fas fa-arrow-left mr-3"></i>
      @if (false)
      Previous
      @endif
    </button>

    <button class="btn btn-danger-rm m-0" style="font-size: 1.5rem;" wire:click="goToNextWeek">
      <i class="fas fa-arrow-right mr-3"></i>
      @if (false)
      Next
      @endif
    </button>

    <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
      <span class="ml-3 text-secondary" style="font-size: 1rem;">
        Loading...
      </span>
    </button>


    <div class="py-2 px-2" style="font-size: 1.1rem;">
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

    <div class="shadow-sm-rm" style="">
      <div class="card">
        <div class="card-body p-0 bg-success text-white">
          <div class="p-4">
            <h2 class="font-weight-bold" style="font-size: 2rem;">
              Rs
              @php echo number_format( $totalAmount ); @endphp
            </h2>
          </div>
        </div>
      </div>
    </div>

  </div>

  {{-- Show in bigger screens --}}
  <div class="d-none d-md-block my-3 text-secondary" style="font-size: 1rem;">
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

      <div class="col-md-4">
        <input type="date" wire:model.defer="weekStartDate" class="ml-5">
        <button class="btn btn-success" wire:click="setStartOfWeek">
          Go
        </button>
      </div>
    </div>
  </div>

  @if (count($weekBook) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive m-0 p-0 d-none d-md-block">
      <table class="table table-bordered-rm table-hover shadow-sm border" style="font-size: 1.1rem;">
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
                <td class="font-weight-bold">
                @php echo number_format( $day['totalAmount'] ); @endphp
                </td>
              <tr>
            @endforeach
        </tbody>

        <tfoot class="bg-white">
          <tr>
            <td colspan="3" class="text-right mr-3 font-weight-bold" style="font-size: 1.3rem;">
              Total
            </td>
            <td class="font-weight-bold" style="font-size: 1.3rem;">
              @php echo number_format($totalAmount); @endphp
            </td>
          </tr>
        </tfoot>
      </table>
    </div>

    {{-- Show in smaller screens --}}
    <div class="table-responsive m-0 p-0 d-md-none border">
      <table class="table table-bordered-rm table-hover shadow-sm mb-0">
        @if (true)
        <thead>
          <tr class="bg-success text-white">
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
        @endif

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
                  <div>
                    {{ $day['day']->format('l') }}
                  </div>
                </td>
                <td>
                  {{ $day['totalBills'] }}
                </td>
                <td class="font-weight-bold" style="font-size: 1rem;">
                Rs
                @php echo number_format( $day['totalAmount'] ); @endphp
                </td>
              <tr>
            @endforeach
        </tbody>

      </table>
    </div>


  @endif
</div>
