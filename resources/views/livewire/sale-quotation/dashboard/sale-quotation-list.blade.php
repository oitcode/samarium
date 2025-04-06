<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="d-flex">
        <div class="mr-4 font-weight-bold">
          Today : {{ $todaySaleQuotationCount }}
        </div>
        <div class="mr-4 font-weight-bold">
          Total : {{ $totalSaleQuotationCount }}
        </div>
      </div>
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell">
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
      <th class="d-none d-md-table-cell">
        Amount
      </th>
      <th class="d-none d-md-table-cell text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($saleQuotations as $saleQuotation)
        {{-- Show in bigger screens --}}
        <x-table-row-component bsClass="d-none d-md-table-row">
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
            {{ config('app.transaction_currency_symbol') }}
            @if ($saleQuotation->creation_status == 'progress')
              @if ($hasVat)
                @php echo number_format( $saleQuotation->getTotalAmount() * 1.13); @endphp
              @else
                @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
              @endif
            @else
              @php echo number_format( $saleQuotation->getTotalAmount() ); @endphp
            @endif
          </td>
          <td class="text-right">
            <x-list-edit-button-component clickMethod="$dispatch('displaySaleQuotation', { saleQuotationId: {{ $saleQuotation->sale_quotation_id }} })">
            </x-list-edit-button-component>
            <x-list-view-button-component clickMethod="$dispatch('displaySaleQuotation', { saleQuotationId: {{ $saleQuotation->sale_quotation_id }} })">
            </x-list-view-button-component>
            <x-list-delete-button-component clickMethod="">
            </x-list-delete-button-component>
          </td>
        </x-table-row-component>

        {{-- Show in smaller screens --}} 
        <x-table-row-component bsClass="d-md-none">
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
              {{ config('app.transaction_currency_symbol') }}
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
        </x-table-row-component>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $saleQuotations->links() }}
    </x-slot>
  </x-list-component>

  @if ($modes['confirmDelete'])
    @livewire ('sale-quotation-list-confirm-delete', ['saleQuotation' => $deletingSaleQuotation,])
  @endif

</div>
