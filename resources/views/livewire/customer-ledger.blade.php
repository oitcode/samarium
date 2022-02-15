<x-box-generic title="Customer ledger">
  <div class="row p-3 mb-3">
    <div class="col-md-4 bg-light border">

      <div class="table-responsive">
        <table class="table table-sm">
          <tbody>

            <tr>
              <th>Customer</th>
              <td>{{ $customer->name }}</td>
            </tr>

            <tr>
              <th>Phone</th>
              <td>{{ $customer->phone }}</td>
            </tr>

            <tr>
              <th>Email</th>
              <td>{{ $customer->email }}</td>
            </tr>

            <tr>
              <th>Address</th>
              <td>{{ $customer->address }}</td>
            </tr>

            <tr>
              <th>PAN num</th>
              <td>{{ $customer->pan_num }}</td>
            </tr>

          </tbody>
        </table>
      </div>

    </div>

    <div class="col-md-4 bg-light border">
      <div class="table-responsive">
        <table class="table table-sm">
          <tbody>

            <tr>
              <th>Total bills</th>
              <td>{{ $customer->getTotalSaleInvoices() }}</td>
            </tr>

            <tr>
              <th>Total sales</th>
              <td>{{ $customer->getTotalSaleAmount() }}</td>
            </tr>

            <tr>
              <th>Pending bills</th>
              <td>
              {{ $customer->getTotalPendingSaleInvoices() }}
              </td>
            </tr>

            <tr>
              <th>Pending amount</th>
              <td>{{ $customer->getBalance() }}</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>

  </div>

  <div class="p-3 mb-3 border">
    <div class="table-responsive">
      <table class="table table-sm table-bordered">
        <thead>
          <tr>
            <th>Bill ID</th>
            <th>Bill date</th>
            <th>Customer</th>
            <th>Amount</th>
            <th>Paid</th>
            <th>Pending</th>
          </tr>
        </thead>

        <tbody>
          @foreach ($customer->saleInvoices as $saleInvoice)
          <tr>
            <td>
              {{ $saleInvoice->sale_invoice_id }}
            </td>
            <td>
              {{ $saleInvoice->sale_invoice_date }}
            </td>
            <td>
              {{ $saleInvoice->customer->name }}
            </td>
            <td>
              {{ $saleInvoice->total_amount }}
            </td>
            <td>
              {{ $saleInvoice->getPaidAmount() }}
            </td>
            <td>
              {{ $saleInvoice->getPendingAmount() }}
            </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="3" class="font-weight-bold text-right pr-3">
              Total
            </td>
            <td class="font-weight-bold">
              {{ $customer->getTotalSaleAmount() }}
            </td>
            <td class="font-weight-bold">
              {{ $customer->getTotalPaidAmount() }}
            </td>
            <td class="font-weight-bold">
              {{ $customer->getBalance() }}
            </td>
          <tr>
        </tbody>


      </table>
    </div>
  </div>
</x-box-generic>
