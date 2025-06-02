<x-box-generic title="Sale detail">

  <x-menu-bar-horizontal>
    <x-menu-item fa-class="fas fa-print" title="Print" click-method="" />
  </x-menu-bar-horizontal>

  <div>
    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Sale invoice ID
      </div>
      <div class="col-md-9">
        <span class="badge badge-pill">
          {{ $saleInvoice->sale_invoice_id }}
        <span>
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Date
      </div>
      <div class="col-md-9">
        {{ $saleInvoice->sale_invoice_date }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Customer
      </div>
      <div class="col-md-9">
        {{ $saleInvoice->customer->name }}
        <span class="badge badge-pill">
          {{ $saleInvoice->customer->phone }}
        <span>
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Payment
      </div>
      <div class="col-md-9">
        {{ $saleInvoice->total_amount }}
        {{--
        <span class="badge badge-pill">
          {{ $saleInvoice->customer->phone }}
        <span>
        --}}
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
            <th>Rate</th>
            <th>Quantity</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($saleInvoice->saleInvoiceItems as $saleInvoiceItem)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $saleInvoiceItem->product->name }}</td>
              <td>{{ $saleInvoiceItem->product->selling_price }}</td>
              <td>{{ $saleInvoiceItem->quantity }}</td>
              <td>{{ $saleInvoiceItem->getTotalAmount() }}</td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4" class="font-weight-bold">Total</td>
            <td class="font-weight-bold">{{ $saleInvoice->getTotalAmount() }}</td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>

</x-box-generic>
