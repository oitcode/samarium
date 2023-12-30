<div>


  <div class="bg-white border p-3 mb-4">
    <div class="mb-4">
      <h1 class="h5 font-weight-bold">
        Takeaway search
      </h1>
    </div>
    <div class="my-4">
      <input type="text"
          class="mr-5 h-100 form-control"
          style="font-size: 1.5rem;"
          wire:model.defer="customer_search_name"
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

  <div class="table-responsive d-none d-md-block">
    <table class="table table-hover shadow-sm border">
      <thead>
        <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
            {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
            p-4" style="font-size: 1rem;">
          <th>
            ID
          </th>
          <th class="d-none d-md-table-cell">
            Date
          </th>
          <th class="d-none d-md-table-cell">
            Time
          </th>
          <th>
            <span class="d-none d-md-inline">
              Payment
            </span>
            Status
          </th>
          <th class="d-none d-md-table-cell">
            Pending
          </th>
          <th>
            Amount
          </th>
        </tr>
      </thead>

      <tbody class="bg-white">
        @if ($takeaways != null && count($takeaways) > 0)
          @foreach ($takeaways as $takeaway)
            <tr wire:click="$emit('displayTakeaway', {{ $takeaway->takeaway_id }})" role="button">
              <td>
                {{ $takeaway->takeaway_id }}
              </td>
              <td class="d-none d-md-table-cell" style="font-size: 1rem;">
                {{--
                    Todo: Should show takeaway date
                    if needed then set appropriate date for
                    back dated takeaway entries
                --}}
                {{ $takeaway->saleInvoice->sale_invoice_date }}
              </td>
              <td class="d-none d-md-table-cell">
                {{ $takeaway->created_at->format('H:i A') }}
              </td>
              <td>
                @if ($takeaway->saleInvoice->payment_status == 'pending')
                  <span class="badge badge-pill badge-danger">
                    Pending
                  </span>
                @elseif ($takeaway->saleInvoice->payment_status == 'partially_paid')
                  <span class="badge badge-pill badge-warning">
                    Partial
                  </span>
                @elseif ($takeaway->saleInvoice->payment_status == 'paid')
                  <span class="badge badge-pill badge-success">
                    Paid
                  </span>
                @else
                  {{ $takeaway->saleInvoice->payment_status }}
                @endif
              </td>
              <td class="d-none d-md-table-cell">
                @if ($takeaway->saleInvoice->creation_status == 'progress')
                  @if (\App\SaleInvoiceAdditionHeading::where('name', 'vat')->first())
                    @php echo number_format( $takeaway->getPendingAmount() * 1.13); @endphp
                  @else
                    @php echo number_format( $takeaway->getPendingAmount() ); @endphp
                  @endif
                @else
                  @php echo number_format( $takeaway->getPendingAmount() ); @endphp
                @endif
              </td>
              <td class="font-weight-bold">
                @if ($takeaway->saleInvoice->creation_status == 'progress')
                  @if (\App\SaleInvoiceAdditionHeading::where('name', 'vat')->first())
                    @php echo number_format( $takeaway->getTotalAmount() * 1.13); @endphp
                  @else
                    @php echo number_format( $takeaway->getTotalAmount() ); @endphp
                  @endif
                @else
                  @php echo number_format( $takeaway->getTotalAmount() ); @endphp
                @endif
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>

  </div>


</div>
