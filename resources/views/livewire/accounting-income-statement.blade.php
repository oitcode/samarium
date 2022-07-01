<div class="border bg-white p-3">

  <div class="mt-3 mb-4 border-bottom">
    <h1 class="h4 text-primary">
      Income statement
    </h1>
    <h2 class="h5">
      {{ $company->name }}
    </h2>
    <h2 class="h6">
      {{ \Carbon\Carbon::now()->format('d F Y') }}
    </h2>
  </div>

  {{-- Revenue --}}
  <div class="mb-3">
    <h2 class="h5 text-primary">
      Revenue
    </h2>
    @foreach ($revenueItems as $revenueItem)
      <div class="row">
        <div class="col-6">
          {{ $revenueItem['name'] }}
        </div>
        <div class="col-6">
          Rs
          @php echo number_format( $revenueItem['amount'] ); @endphp
        </div>
      </div>
    @endforeach
  </div>

  {{-- Cogs --}}
  <div class="mb-3">
    <h2 class="h5 text-primary">
      Cost of goods sold
    </h2>
    @foreach ($cogsItems as $cogsItem)
      <div class="row">
        <div class="col-6">
          {{ $cogsItem['name'] }}
        </div>
        <div class="col-6">
          Rs
          @php echo number_format( $cogsItem['amount'] ); @endphp
        </div>
      </div>
    @endforeach
  </div>

  {{-- Gross profit --}}
  <div class="border-top border-bottom py-2 mb-3">
    <div class="row">
      <div class="col-6 h5 text-primary">
        Gross profit
      </div>
      <div class="col-6">
        Rs
        @php echo number_format( $grossProfit ); @endphp
      </div>
    </div>
  </div>

  {{-- Operating expense --}}
  <div class="mb-3">
    <h2 class="h5 text-primary">
      Operating expense
    </h2>
    @foreach ($expenseItems as $expenseItem)
      <div class="row">
        <div class="col-6">
          {{ $expenseItem['name'] }}
        </div>
        <div class="col-6">
          Rs
          @php echo number_format( $expenseItem['amount'] ); @endphp
        </div>
      </div>
    @endforeach
  </div>

  {{-- Net profit --}}
  <div class="border-top py-2 mb-3">
    <div class="row">
      <div class="col-6 h5 text-primary">
        Net profit
      </div>
      <div class="col-6">
        Rs
        @php echo number_format( $netProfit ); @endphp
      </div>
    </div>
  </div>

</div>
