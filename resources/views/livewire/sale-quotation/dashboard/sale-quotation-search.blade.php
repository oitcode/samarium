<div>


  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h5 font-weight-bold">
        Sale quotation search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          style="font-size: 1.5rem;"
          wire:model="customer_search_name"
          wire:keydown.enter="search"
          autofocus>
    </div>
    <div>
      @include ('partials.button-general', ['clickMethod' => "search", 'btnText' => 'Search',])
    </div>
  </div>


  {{-- Show search results --}}
  <div class="my-3 mt-5">
    <h2 class="h5 font-weight-bold">
      Search results
    </h2>
  </div>

  <div class="table-responsive">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
            p-4" style="font-size: 1rem;">
          <th>
            ID
          </th>
          <th class="d-none d-md-table-cell">
            Customer
          </th>
          <th class="d-none d-md-table-cell">
            Date
          </th>
          <th class="d-none d-md-table-cell">
            Time
          </th>
          <th>
            Amount
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @if ($saleQuotations != null && count($saleQuotations) > 0)
          @foreach ($saleQuotations as $saleQuotation)
            <tr wire:click="$dispatch('displaySaleQuotation', { saleQuotationId: {{ $saleQuotation->sale_quotation_id }} })" role="button">
              <td>
                {{ $saleQuotation->sale_quotation_id }}
              </td>
              <td class="d-none d-md-table-cell" style="font-size: 1rem;">
                @if ($saleQuotation->customer)
                  {{ $saleQuotation->customer->name }}
                @else
                  <span class="text-secondary">
                    --
                  </span>
                @endif
              </td>
              <td class="d-none d-md-table-cell" style="font-size: 1rem;">
                {{ $saleQuotation->sale_quotation_date }}
              </td>
              <td class="d-none d-md-table-cell">
                {{ $saleQuotation->created_at->format('H:i A') }}
              </td>
              <td class="font-weight-bold">
                @if ($saleQuotation->creation_status == 'progress')
                  @if (\App\SaleInvoiceAdditionHeading::where('name', 'vat')->first())
                    @php echo number_format( $saleQuotation->getTotalAmount() * 1.13); @endphp
                  @else
                    @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                  @endif
                @else
                  @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
                @endif
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>

  </div>


</div>
