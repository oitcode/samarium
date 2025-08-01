<div class="mb-4">

  {{-- Top toolbar --}}
  <x-toolbar-classic toolbarTitle="Weekbook">
    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  {{-- Top Menu --}}
  <div class="mb-3 bg-white px-3 py-4 border o-border-radius">
    <div class="d-flex flex-column flex-md-row">
      <div class="d-flex justify-content-center justify-content-md-start mb-3 mb-md-0">
        <div class="mr-3" wire:click="goToPreviousWeek" role="button">
          <i class="fas fa-arrow-alt-circle-left fa-2x text-primary"></i>
        </div>
        <div class="mr-3 o-heading pt-1">
          <i class="fas fa-calendar mr-2"></i>
          {{ Carbon\Carbon::parse($startDay)->format('j F') }}
          -
          {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('j F') }}
        </div>
        <div class="mr-3" wire:click="goToNextWeek" role="button">
          <i class="fas fa-arrow-alt-circle-right fa-2x text-primary"></i>
        </div>
      </div>
      <div class="d-flex justify-content-center justify-content-md-start">
        <input type="date" wire:model="weekStartDate" class="px-3 badge-pill mr-3 border o-border-darker-gray">
        <button class="btn btn-primary px-4 badge-pill o-heading text-white py-1" wire:click="setStartOfWeek">
          Go
        </button>
      </div>
      <div class="d-flex justify-content-center justify-content-md-start mx-0 mx-md-3">
        @include ('partials.dashboard.spinner-button')
      </div>
    </div>
  </div>

  <div class="p0 py-4-rm mb-3 bg-white border o-border-radius">
    <div class="row" style="margin: auto;">
      <div class="col-md-4 p-3">
        <div class="border o-border-radius p-3">
          <div class="mb-2">
            TOTAL SALES
          </div>
          <div class="h4 o-heading">
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format($totalAmount); @endphp
          </div>
        </div>
      </div>
      <div class="col-md-4 p-3">
        <div class="border o-border-radius p-3">
          <div class="mb-2">
            TOTAL PURCHASE
          </div>
          <div class="h4 o-heading">
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format($totalAmountPurchase); @endphp
          </div>
        </div>
      </div>
      <div class="col-md-4 p-3">
        <div class="border o-border-radius p-3">
          <div class="mb-2">
            TOTAL EXPENSE
          </div>
          <div class="h4 o-heading">
            {{ config('app.transaction_currency_symbol') }}
            @php echo number_format($totalAmountExpense); @endphp
          </div>
        </div>
      </div>
    </div>
  </div>

  @if (count($weekBook) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive m-0 p-0 shadow-sm o-border-radius">
      <table class="table table-hover shadow-sm border mb-0 text-nowrap">
        <thead>
          <tr class="bg-white">
            <th class="o-heading">
              DATE
            </th>
            <th class="o-heading">
              DAY
            </th>
            <th class="o-heading">
              SALES
            </th>
            <th class="o-heading">
              PURCHASE
            </th>
            <th class="o-heading">
              EXPENSE
            </th>
          </tr>
        </thead>
        <tbody class="bg-white">
            @for ($i=0; $i<7; $i++)
              <tr @if (\Carbon\Carbon::today() == $weekBook[$i]['day']) class="table-primary" style="linear-gradient(135deg, #fff9c4 0%, #fff1a4 100%)" @endif> 
                <td>
                  @if (\Carbon\Carbon::today() == $weekBook[$i]['day'])
                    <span class="badge-pill badge-success h6 o-heading text-white py-1">
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
                  <span class="badge-pill mr-3 text-primary px-3 py-1" style="background-color: #e3f2fd;">
                  {{ $weekBook[$i]['totalBills'] }}
                  bills
                  </span>
                  <span class="o-heading">
                    Total:
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $weekBook[$i]['totalAmount'] ); @endphp
                  </span>
                </td>
                <td>
                  <span class="badge-pill mr-3 text-primary px-3 py-1" style="background-color: #e3f2fd;">
                    {{ $weekBookPurchase[$i]['totalBills'] }}
                    bills
                  </span>
                  <span class="o-heading">
                    Total:
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $weekBookPurchase[$i]['totalAmount'] ); @endphp
                  </span>
                </td>
                <td>
                  <span class="badge-pill mr-3 text-primary px-3 py-1" style="background-color: #e3f2fd;">
                    {{ $weekBookExpense[$i]['totalBills'] }}
                    bills
                  </span>
                  <span class="o-heading">
                    Total:
                    {{ config('app.transaction_currency_symbol') }}
                    @php echo number_format( $weekBookExpense[$i]['totalAmount'] ); @endphp
                  </span>
                </td>
              <tr>
            @endfor
        </tbody>
        <tfoot class="bg-white">
          <tr>
            <td colspan="2" class="mr-3 o-heading">
              Total
            </td>
            <td class="o-heading">
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format($totalAmount); @endphp
            </td>
            <td class="o-heading">
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format($totalAmountPurchase); @endphp
            </td>
            <td class="o-heading">
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format($totalAmountExpense); @endphp
            </td>
          </tr>
        </tfoot>
      </table>
    </div>
  @endif

</div>
