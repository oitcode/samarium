<div class="mb-4 p-3 p-md-0">

  <x-component-header>
    Weekbook
  </x-component-header>

  {{-- Top Menu --}}
  {{-- Show in bigger screens --}}
  <div class="mb-4 d-none d-md-block bg-white p-3">
    <div class="float-left mr-5">
    </div>

    @if (false)
    <button class="btn btn-success-rm p-3 pr-5 float-right border shadow-sm bg-white" wire:click="" style="font-size:1.3rem;">
      <h2>
        <span class="mr-2">
          Rs
        </span>
        @php echo number_format($totalAmount); @endphp
      </h2>
    </button>
    @endif

    <div class="d-flex float-left my-3 text-secondary-rm border-rm p-3 bg-success-rm text-white-rm shadow-sm-rm" style="font-size: 0.8rem;">
      <button class="btn btn-success-rm m-0 p-0 bg-white badge-pill mr-4" wire:click="goToPreviousWeek">
        <i class="fas fa-arrow-alt-circle-left fa-2x mr-3-rm"></i>
      </button>
      <button class="btn btn-danger-rm mx-0 p-0 badge-pill bg-white" wire:click="goToNextWeek">
        <i class="fas fa-arrow-alt-circle-right fa-2x mr-3-rm"></i>
      </button>
      <div class="mr-3 ml-5">
        <i class="fas fa-calendar mr-2"></i>
        {{ Carbon\Carbon::parse($startDay)->format('Y F d') }}
        <br />
        &nbsp; &nbsp; &nbsp;
        {{ Carbon\Carbon::parse($startDay)->format('l') }}
      </div>
      <div class="">
        <i class="fas fa-calendar mr-2"></i>
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('Y F d') }}
        <br />
        &nbsp; &nbsp; &nbsp;
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('l') }}
      </div>

      <div class="">
        <input type="date" wire:model.defer="weekStartDate" class="ml-5">
        <button class="btn
            {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            "
            wire:click="setStartOfWeek">
          Go
        </button>
      </div>
    </div>

    <div class="h-100 float-left d-flex flex-column justify-content-center">
      <button wire:loading class="btn btn-danger-rm" style="">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>
    </div>

    <div class="clearfix">
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="bg-info-rm mb-4 d-md-none">
    <button class="btn btn-success-rm m-0" style="font-size: 1.5rem;" wire:click="goToPreviousWeek">
      <i class="fas fa-arrow-left mr-3"></i>
    </button>

    <button class="btn btn-danger-rm m-0" style="font-size: 1.5rem;" wire:click="goToNextWeek">
      <i class="fas fa-arrow-right mr-3"></i>
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

  @if (count($weekBook) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive m-0 p-0 d-none d-md-block shadow-sm">
      <table class="table table-bordered-rm table-hover shadow-sm border mb-0" style="font-size: calc(0.8rem + 0.2vw);">
        <thead>
          <tr class="bg-white">
            <th>
              Date
            </th>
            <th>
              Day
            </th>
            <th>
              Sales
            </th>
            <th>
              Purchase
            </th>
            <th>
              Expense
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
            {{--
            @foreach ($weekBook as $day)
            --}}
            @for ($i=0; $i<7; $i++)
              <tr style="font-size: calc(0.6rem + 0.2vw);"> 
                <td>
                  @if (\Carbon\Carbon::today() == $weekBook[$i]['day'])
                    <span class="badge badge-success">
                      TODAY
                    </span>

                  @else
                    <span class="text-secondary">
                      {{ $weekBook[$i]['day']->format('Y F d') }}
                    </span>
                  @endif
                </td>
                <td>
                  {{ $weekBook[$i]['day']->format('l') }}
                </td>
                <td>
                  {{ $weekBook[$i]['totalBills'] }}
                  <span class="text-secondary mr-3">
                  bills
                  </span>
                  <span class="text-secondary">
                  Total:
                  </span>
                  Rs
                  @php echo number_format( $weekBook[$i]['totalAmount'] ); @endphp
                </td>
                <td>
                  {{ $weekBookPurchase[$i]['totalBills'] }}
                  <span class="text-secondary mr-3">
                  bills
                  </span>
                  <span class="text-secondary">
                  Total:
                  </span>
                  Rs
                  @php echo number_format( $weekBookPurchase[$i]['totalAmount'] ); @endphp
                </td>
                <td>
                  {{ $weekBookExpense[$i]['totalBills'] }}
                  <span class="text-secondary mr-3">
                  bills
                  </span>
                  <span class="text-secondary">
                  Total:
                  </span>
                  Rs
                  @php echo number_format( $weekBookExpense[$i]['totalAmount'] ); @endphp
                </td>
              <tr>
            @endfor
            {{--
            @endforeach
            --}}
        </tbody>

        <tfoot class="bg-white">
          <tr>
            <td colspan="2" class="text-right mr-3 font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
              Total
            </td>
            <td class="font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format($totalAmount); @endphp
            </td>
            <td class="font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format($totalAmountPurchase); @endphp
            </td>
            <td class="font-weight-bold" style="font-size: calc(1rem + 0.2vw);">
              @php echo number_format($totalAmountExpense); @endphp
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
            {{--
            @foreach ($weekBook as $day)
            --}}
            @for ($i=0; $i<7; $i++)
              <tr> 
                <td>
                  @if (\Carbon\Carbon::today() == $weekBook[$i]['day'])
                    <span class="badge badge-success">
                      TODAY
                    </span>

                  @else
                    <span class="text-secondary" style="font-size: 1rem;">
                      {{ $weekBook[$i]['day']->format('Y F d') }}
                    </span>
                  @endif
                  <div>
                    {{ $weekBook[$i]['day']->format('l') }}
                  </div>
                </td>
                <td>
                  {{ $weekBook[$i]['totalBills'] }}
                </td>
                <td class="font-weight-bold" style="font-size: 1rem;">
                Rs
                @php echo number_format( $weekBook[$i]['totalAmount'] ); @endphp
                </td>
              <tr>
            @endfor
            {{--
            @endforeach
            --}}
        </tbody>

      </table>
    </div>


  @endif


</div>
