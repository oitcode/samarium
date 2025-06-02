<div>

  <div class="bg-white">
    <h2 class="mt-5 m-3">
      Payments
    </h2>
    <div class="ml-3 mb-1 p-1">
      Total: {{ count($saleInvoice->saleInvoicePayments) }}
    </div>
  </div>

  @foreach ($saleInvoice->saleInvoicePayments as $payment)
  <div class="table-responsive shadow">
    <table class="table bg-white">
      <tbody>
        <tr>
          <td>
            Paid By
          </td>
          <td>
            @if ($payment->deposited_by)
              {{ $payment->deposited_by }}
            @else
              SELF
            @endif
          </td>
        </tr>
        <tr>
          <td>
            Payment ID: 
          </td>
          <td class="text-secondary">
            {{ $payment->sale_invoice_payment_id }}
          </td>
        </tr>
        <tr>
          <td>
            Date
          </td>
          <td class="text-secondary">
            {{ $payment->created_at->toDateString() }}
          </td>
        </tr>
        <tr>
          <td>
            Payment type
          </td>
          <td>
            @if ($payment->saleInvoicePaymentType)
              {{ $payment->saleInvoicePaymentType->name }}
            @else
            @endif
          </td>
        </tr>
        <tr>
          <td>
            Amount
          </td>
          <td>
            <span class="mr-2">
            Rs
            </span>
            @php echo number_format( $payment->amount ); @endphp
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  @endforeach

</div>
