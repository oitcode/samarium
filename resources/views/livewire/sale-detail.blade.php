<x-box-generic title="Sale detail">
  <x-menu-bar-horizontal>
    <x-menu-item fa-class="fas fa-print" title="Print" click-method="" />
  </x-menu-bar-horizontal>

  <div class="">

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Sale ID
      </div>
      <div class="col-md-9">
        <span class="badge badge-pill">
          {{ $sale->sale_id }}
        <span>
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Date
      </div>
      <div class="col-md-9">
        {{ $sale->sale_date }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Customer
      </div>
      <div class="col-md-9">
        {{ $sale->customer->name }}
        <span class="badge badge-pill">
          {{ $sale->customer->phone }}
        <span>
      </div>
    </div>

  </div>

  <div>
    <h3 class="m-3">Items</h3>
    <div class="table-responsive">
      <table class="table table-sm">
        <thead>
          <tr>
            <th>SN</th>
            <th>Item</th>
            <th>Amount</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($sale->saleItems as $saleItem)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $saleItem->title }}</td>
              <td>{{ $saleItem->amount }}</td>
            </tr>
          @endforeach
        </tbody>

        <tfoot>
          <tr>
            <td colspan="2" class="font-weight-bold">Total</td>
            <td class="font-weight-bold">{{ $sale->getTotalAmount() }}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</x-box-generic>
