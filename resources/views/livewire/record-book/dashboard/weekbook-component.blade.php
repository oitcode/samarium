<div class="mb-4 p-3 p-md-0">

  {{-- Top toolbar --}}
  <x-toolbar-classic toolbarTitle="Weekbook">
    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  {{-- Top Menu --}}
  {{-- Show in bigger screens --}}
  <div class="mb-3 d-none d-md-block bg-white p-3 py-4 border o-border-radius">
    <div class="d-flex">
      <button class="btn m-0 p-0 bg-white badge-pill mr-3" wire:click="goToPreviousWeek">
        <i class="fas fa-arrow-alt-circle-left fa-2x"></i>
      </button>
      <div class="badge-pill border p-3 mr-3">
        {{ Carbon\Carbon::parse($startDay)->format('j F') }}
        -
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('j F') }}
      </div>
      <button class="btn mx-0 p-0 badge-pill bg-white mr-3" wire:click="goToNextWeek">
        <i class="fas fa-arrow-alt-circle-right fa-2x"></i>
      </button>
      @if (false)
      <div class="mr-3 mx-5">
        <i class="fas fa-calendar mr-2"></i>
        {{ Carbon\Carbon::parse($startDay)->format('Y F d') }}
        <br />
        &nbsp; &nbsp; &nbsp;
        {{ Carbon\Carbon::parse($startDay)->format('l') }}
      </div>
      <div>
        <i class="fas fa-calendar mr-2"></i>
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('Y F d') }}
        <br />
        &nbsp; &nbsp; &nbsp;
        {{ Carbon\Carbon::parse($startDay)->addDays(6)->format('l') }}
      </div>
      @endif
      <div class="d-flex flex-column justify-content-center">
        <div>
          <input type="date" wire:model="weekStartDate" class="p-3 badge-pill mr-3 border">
          <button class="btn btn-primary p-3 o-border-radius-sm-rm px-4 badge-pill" wire:click="setStartOfWeek">
            Go
          </button>
        </div>
      </div>
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="mb-4 d-md-none">
    <button class="btn m-0" wire:click="goToPreviousWeek">
      <i class="fas fa-arrow-left mr-3"></i>
    </button>
    <button class="btn m-0" wire:click="goToNextWeek">
      <i class="fas fa-arrow-right mr-3"></i>
    </button>
    <input type="date" wire:model="weekStartDate" class="ml-3">
    <button class="btn mx-3
        {{ config('app.oc_ascent_bg_color', 'bg-success') }}
        "
        wire:click="setStartOfWeek">
      Go
    </button>
    @include ('partials.dashboard.spinner-button')

    <div class="py-2 px-2">
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
    <div class="my-4">
      <div class="table-responsive bg-white">
        <table class="table">
          <tbody>
            <tr>
              <th>Sale</th>
              <td>
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $totalAmount ); @endphp
              </td>
            </tr>
            <tr>
              <th>Purchase</th>
              <td>
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $totalAmountPurchase ); @endphp
              </td>
            </tr>
            <tr>
              <th>Expense</th>
              <td>
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $totalAmountExpense ); @endphp
              </td>
            </tr>
          </tbody>
        </table>
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

  {{-- Show in bigger screens --}}
  @if (count($weekBook) > 0)
    {{-- Show in bigger screens --}}
    <div class="table-responsive m-0 p-0 d-none d-md-block shadow-sm o-border-radius">
      <table class="table table-hover shadow-sm border mb-0">
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

    {{-- Show in smaller screens --}}
    <div class="table-responsive m-0 p-0 d-md-none border">
      <table class="table table-hover shadow-sm mb-0">
        <thead>
          <tr class="bg-success text-white">
            <th>
              Day
            </th>
            <th>
              Total
            </th>
          </tr>
        </thead>
        <tbody class="bg-white">
          @for ($i=0; $i<7; $i++)
            <tr> 
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
                <div>
                  {{ $weekBook[$i]['day']->format('l') }}
                </div>
              </td>
              <td class="font-weight-bold">
              <span class="text-secondary">
              Sale:
              </span>
              <br/>
              {{ $weekBook[$i]['totalBills'] }} bills
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $weekBook[$i]['totalAmount'] ); @endphp
              <br/>
              <span class="text-secondary">
              Purchase:
              </span>
              <br/>
              {{ $weekBookPurchase[$i]['totalBills'] }} bills
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $weekBookPurchase[$i]['totalAmount'] ); @endphp
              <br/>
              <span class="text-secondary">
              Expense:
              </span>
              <br/>
              {{ $weekBookExpense[$i]['totalBills'] }} bills
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $weekBookExpense[$i]['totalAmount'] ); @endphp
              </td>
            <tr>
          @endfor
        </tbody>
      </table>
    </div>
  @endif

</div>
