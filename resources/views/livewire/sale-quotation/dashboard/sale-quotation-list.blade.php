<div>


  <div class="d-flex bg-white border p-3 mb-1">
    <div class="d-flex">
      <div class="mr-4 font-weight-bold">
        Today : {{ $todaySaleQuotationCount }}
      </div>
      <div class="mr-4 font-weight-bold">
        Total : {{ $totalSaleQuotationCount }}
      </div>
    </div>
    <div wire:loading class="">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>


  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none d-md-block">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="p-4 bg-white text-dark">
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
          <th>
            Action
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @foreach ($saleQuotations as $saleQuotation)
          <tr wire:click="$dispatch('displaySaleQuotation', { saleQuotationId: {{ $saleQuotation->sale_quotation_id }} })" role="button">
            <td>
              {{ $saleQuotation->sale_quotation_id }}
            </td>
            <td class="d-none d-md-table-cell">
              @if ($saleQuotation->customer)
                {{ $saleQuotation->customer->name }}
              @else
                <span class="text-secondary">
                  --
                </span>
              @endif
            </td>
            <td class="d-none d-md-table-cell">
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
            <td>
              @if (true)
                <button class="btn btn-primary px-2 py-1" wire:click="">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    {{-- Pagination links --}}
    {{ $saleQuotations->links() }}

  </div>


  {{-- Show in smaller screens --}}
  <div class="table-responsive d-md-none border bg-white">
    <table class="table">
      <tbody>
        @foreach ($saleQuotations as $saleQuotation)
        <tr>
          <td>
            {{ $saleQuotation->sale_quotation_id }}
          </td>

          <td>
            <p>
              @if (\Carbon\Carbon::today()->toDateString() == $saleQuotation->created_at->toDateString())
                <i class="fas fa-star mr-2 text-primary"></i>
                <span class="text-primary">
                  Today
                </span>

              @else
                <span>
                  {{ $saleQuotation->created_at->toDateString() }}
                </span>
              @endif
            </p>
            <p>
              {{ $saleQuotation->created_at->format('H:i A') }}
            </p>
          </td>

          <td>
            <p class="h5">
              Rs
              @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
            </p>
          </td>
          <td>
            <div class="dropdown">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-cog text-secondary"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button class="dropdown-item" wire:click="$dispatch('displaySaleQuotation', { saleQuotationId: {{ $saleQuotation->sale_quotation_id }} })">
                  <i class="fas fa-file text-primary mr-2"></i>
                  View
                </button>
                <button class="dropdown-item" wire:click="confirmDeleteSaleQuotation({{ $saleQuotation }})">
                  <i class="fas fa-trash text-danger mr-2"></i>
                  Delete
                </button>
              </div>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>


  @if ($modes['confirmDelete'])
    @livewire ('sale-quotation-list-confirm-delete', ['saleQuotation' => $deletingSaleQuotation,])
  @endif


</div>
