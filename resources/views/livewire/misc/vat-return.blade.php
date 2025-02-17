<div class="card shadow-sm">

  <div class="card-body p-0 border-0">
    <div class="m-3">
      <h2 class="h5 text-dark">
        VAT Return
      </h2>
    </div>
    <div class="my-3 text-secondary p-3">
      <div class="d-flex justify-content-between">
        <div>
          <div class="text-muted mb-2">
            Please select date range
          </div>
          <div class="d-flex">
            <div>
              <input type="date" wire:model="startDate" class="mr-3" />
            </div>
            <div>
              <input type="date" wire:model="endDate" class="mr-3" />
            </div>
            <div>
              <button class="btn btn-success" wire:click="render">
                Go
              </button>
            </div>
            @include ('partials.dashboard.spinner-button')
          </div>
        </div>
        <div class="p-3 shadow-sm col-md-3" style="background-color: #ffa;">
          <div>
            <i class="fas fa-exclamation-circle mr-2 text-danger"></i>
            Please check your local tax regulations. 
          </div>
        </div>
      </div>
    </div>
    <div>
      <div class="table-responsive border">
        <table class="table mb-0">
          <thead>
            <tr class="
                {{ config('app.oc_ascent_bg_color', 'bg-success') }}
                {{ config('app.oc_ascent_text_color', 'text-white') }}
                "
            >
              <th class="w-75">Category</th>
              <th>Bills</th>
              <th>Total</th>
              <th>Vat</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                Sales
              </td>
              <td>
                {{ count($saleInvoices) }}
              </td>
              <td>
                @php echo number_format( $saleInvoiceTotal ); @endphp
              </td>
              <td>
                @php echo number_format( $salesVat ); @endphp
              </td>
            </tr>
            <tr>
              <td>
                Purchase
              </td>
              <td>
                {{ count($purchases) }}
              </td>
              <td>
                @php echo number_format( $purchaseTotal ); @endphp
              </td>
              <td>
                @php echo number_format( $purchaseVat ); @endphp
              </td>
            </tr>
            <tr>
              <td>
                Expense
              </td>
              <td>
                {{ count($expenses) }}
              </td>
              <td>
                @php echo number_format( $expenseTotal ); @endphp
              </td>
              <td>
                @php echo number_format( $expenseVat ); @endphp
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="p-3 mt-3">
        <h2 class="h5">
          Payable
        </h2>
        <div class="mb-3 font-weight-bold">
          {{ $startDate }}
          to
          {{ $endDate }}
        </div>
        <h2 class="h4 text-dark">
          Rs
          @php echo number_format( $salesVat - $purchaseVat - $expenseVat ); @endphp
        </h2>
      </div>
    </div>
  </div>

</div>
