<div>

  <div class="row py-3">
    <div class="col-md-3">
      <div class="d-flex justify-content-center h-100">
        <div class="justify-content-center align-self-center text-center">
          <h2>
            Total Bills
          </h2>
          <div>
            {{ $customer->getTotalSaleInvoices() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="d-flex justify-content-center h-100">
        <div class="justify-content-center align-self-center text-center">
          <h2>
            Total Sales
          </h2>
          <div>
            <i class="fas fa-rupee-sign"></i>
            {{ $customer->getTotalSaleAmount() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="d-flex justify-content-center h-100">
        <div class="justify-content-center align-self-center text-center">
          <h2>
            Pending Bills 
          </h2>
          <div>
            {{ $customer->getTotalPendingSaleInvoices() }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="d-flex justify-content-center h-100">
        <div class="justify-content-center align-self-center text-center">
          <h2>
            Pending Amount
          </h2>
          <div class="text-danger">
            <i class="fas fa-rupee-sign"></i>
            {{ $customer->getBalance() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mb-3 border">
    <div class="table-responsive">
      <table class="table table-sm table-bordered">
        <thead>
          <tr class="text-secondary">
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
                {{ $saleInvoice->getTotalAmount() }}
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

</div>
