<div class="border bg-white p-3">

  <h1 class="h4 text-primary mb-4">
    Income statement
  </h1>

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
          {{ $revenueItem['amount'] }}
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
          {{ $cogsItem['amount'] }}
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
        {{ $grossProfit }}
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
          {{ $expenseItem['amount'] }}
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
        {{ $netProfit }}
      </div>
    </div>
  </div>

</div>
