<div class="card border-0-rm shadow-sm">
  <div class="card-body p-0 bg-light-rm border-0">

    <div class="m-3">
      <h2 class="h5 text-dark">
        VAT Return
      </h2>
    </div>

    <div class="my-3 text-secondary p-3" style="font-size: calc(1rem + 0.2vw);">

      <div class="d-flex justify-content-between">
        <div>
          <div class="text-muted mb-2" style="font-size: 0.6rem;">
            Please select date range
          </div>
          <div class="d-flex" style="font-size: 1rem;">
            <div>
              <input type="date" wire:model.defer="startDate" class="mr-3" />
            </div>

            <div>
              <input type="date" wire:model.defer="endDate" class="mr-3" />
            </div>

            <div class="my-2-rm">
              <button class="btn btn-success" wire:click="render">
                Go
              </button>
            </div>

            <button wire:loading class="btn">
              <div class="spinner-border text-info mr-3" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </button>
          </div>
        </div>

        <div class="bg-warning-rm p-3 shadow-sm col-md-3" style="background-color: #ffa;">
          <div style="font-size: 1rem;">
            <i class="fas fa-exclamation-circle fa-2x-rm mr-2 text-danger"></i>
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
                {{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
                {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
                "
                style="font-size: 0.9rem;">
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
        <div class="mb-3 font-weight-bold" style="font-size: 0.6rem;">
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
