<div>
  <h2>
    Payments
  </h2>

  <hr />

  <div class="mb-3 p-3">
    Total: {{ count($saleInvoice->saleInvoicePayments) }}
  </div>

  <hr />

  @foreach ($saleInvoice->saleInvoicePayments as $payment)
  <div class="table-responsive mb-4 shadow">
    <table class="table" style="font-size: 1.3rem;">
      <tbody>

        <tr class="bg-success text-white" style="{{--font-size: 2rem; background-color: #dff;--}}">
          <td>
            Paid By
          </td>
          <td style="font-size: 2rem;">
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
          <td class="text-secondary" style="font-size: 1rem;">
            {{ $payment->sale_invoice_payment_id }}
          </td>
        </tr>

        <tr>
          <td>
            Date
          </td>
          <td class="text-secondary" style="font-size: 1rem;">
            {{ $payment->created_at->toDateString() }}
          </td>
        </tr>

        <tr>
          <td>
            Amount
          </td>
          <td>
            <i class="fas fa-rupee-sign mr-3"></i>
            @php echo number_format( $payment->amount ); @endphp
          </td>
        </tr>

      </tbody>
    </table>
  </div>
  @endforeach
</div>
