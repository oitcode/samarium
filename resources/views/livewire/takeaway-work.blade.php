<div>
@if ($takeaway && $takeaway->status == 'closed')
  @livewire ('core-sale-invoice-display', ['saleInvoice' => $takeaway->saleInvoice,])
@else
<div>
  {{-- Show in bigger screens --}}


  <div class="row">

    <div class="col-md-8">

      @if ($takeaway)
        @if ($takeaway->status == 'open' && $modes['addItem'])
          @livewire ('takeaway-work-add-item', ['takeaway' => $takeaway,])
        @endif
      @endif

      @if ($takeaway)
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0 bg-primary-rm text-white-rm" style="{{--background-color: #efe;--}}">


          <div class="row p-0 mt-2" style="margin: auto;">

            <div class="col-md-3 mb-3-rm">
              <div class="text-muted mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                Customer
              </div>
              <div class="h5">
                @if ($takeaway->saleInvoice->customer)
                  <i class="fas fa-user-circle text-muted mr-2"></i>
                  {{ $takeaway->saleInvoice->customer->name }}
                @else
                  @if (false)
                  <i class="fas fa-exclamation-circle text-muted mr-2"></i>
                  @endif
                  <span class="text-muted" style="font-size: calc(0.6rem + 0.2vw);">
                    None
                  </span>
                @endif
              </div>
            </div>

            <div class="col-md-2 mb-3 d-flex">
              <div>
                <div class="text-muted mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                  Invoice ID
                </div>
                <div class="h6">
                  {{ $takeaway->saleInvoice->sale_invoice_id }}
                </div>
              </div>
            </div>

            <div class="col-md-2 mb-3">
              <div class="text-muted mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                Invoice Date
              </div>
              <div class="h6">
                {{ $takeaway->saleInvoice->created_at->toDateString() }}
              </div>
            </div>

            <div class="col-md-3" style="font-size: calc(0.6rem + 0.2vw);">
              <div class="text-muted" style="font-size: calc(0.6rem + 0.2vw);">
                Payment Status
              </div>
              <div>
                @if ( $takeaway->saleInvoice->payment_status == 'paid')
                <span class="badge badge-pill badge-success">
                Paid
                </span>
                @elseif ( $takeaway->saleInvoice->payment_status == 'partially_paid')
                <span class="badge badge-pill badge-warning">
                Partial
                </span>
                @elseif ( $takeaway->saleInvoice->payment_status == 'pending')
                <span class="badge badge-pill badge-danger">
                Pending
                </span>
                @else
                <span class="badge badge-pill badge-secondary">
                  {{ $takeaway->saleInvoice->payment_status }}
                </span>
                @endif
               @if (false)
               <div>
                 <div class="text-primary" style="font-size: 0.6rem;" role="button" wire:click="enterMode('showPayments')">
                   Show payments
                 </div>
               </div>
               @endif
              </div>
            </div>
            <div class="col-md-2">
              <div class="d-flex justify-content-end h-100">
                <button class="btn btn-light h-100" style="color: green;">
                  <i class="fas fa-skating"></i>
                  <br/>
                  <span style="font-size: 1.1rem;">
                  Takeaway
                  </span>
                </button>
              </div>
            </div>


          </div>

        </div>
      </div>
      @endif




      <div class="card mb-3 shadow">
      
        <div class="card-body p-0">
  

          @if ($takeaway)

            @if (count($takeaway->saleInvoice->saleInvoiceItems) > 0)
            {{-- Show in bigger screens --}}
            <div class="table-responsive d-none d-md-block">
              <table class="table table-hover border-dark mb-0">
                <thead>
                  <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.6rem + 0.2vw);">
                    <th>--</th>
                    @if ($takeaway->status != 'closed')
                      <th>#</th>
                    @endif
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                  </tr>
                </thead>
  
                <tbody style="font-size: 1.3rem;">
                  @if ($takeaway)
                    @if (count($takeaway->saleInvoice->saleInvoiceItems) > 0)
                      @foreach ($takeaway->saleInvoice->saleInvoiceItems as $item)
                      <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-white-rm">
                        @if ($takeaway->status != 'closed')
                          <td>
                            <a href="" wire:click.prevent="confirmRemoveItemFromTakeaway({{ $item->sale_invoice_item_id }})" class="">
                            <i class="fas fa-trash text-danger"></i>
                            </a>
                          </td>
                        @endif
                        <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
                        <td>
                          <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 30px; height: 30px;">
                          {{ $item->product->name }}
                        </td>
                        <td>
                          @php echo number_format( $item->product->selling_price ); @endphp
                        </td>
                        <td>
                          <span class="badge badge-pill-rm badge-success">
                            {{ $item->quantity }}
                          </span>
                        </td>
                        <td>
                          @php echo number_format( $item->getTotalAmount() ); @endphp
                        </td>
                      </tr>
                      @endforeach
                    @endif
                  @endif
                </tbody>
  
                <tfoot class="" style="font-size: 0.8rem;">
                  <tr class="bg-danger-rm py-0">
                    <td colspan="@if ($takeaway->status != 'closed') 5 @else 4 @endif" style="" class="font-weight-bold text-right pr-4 py-1">
                      <strong>
                      Subtotal
                      </strong>
                    </td>
                    <td style="" class="font-weight-bold py-1">
                      @php echo number_format( $takeaway->saleInvoice->getTotalAmountRaw() ); @endphp
                    </td>
                  </tr>

                  @if ($takeaway->status == 'closed')
                  {{-- Non tax sale invoice additions --}}
                  @foreach ($takeaway->saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)

                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                      @continue
                    @endif

                    <tr class="border-0 bg-info-rm p-0">
                      <td colspan="@if ($takeaway->status != 'closed') 5 @else 4 @endif" style=""
                          class="
                            font-weight-bold text-right border-0 pr-4 py-1
                          ">
                        {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                      </td>
                      <td style=""
                          class="
                            @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                              text-danger
                            @endif
                            font-weight-bold border-0 pr-4 py-1">
                        @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                      </td>
                    </tr>
                  @endforeach

                  {{-- Taxable amount --}}
                  {{-- Todo: Only vat? --}}
                  @if ($has_vat)
                    <tr class="border-0 bg-info-rm p-0">
                      <td colspan="@if ($takeaway->status != 'closed') 5 @else 4 @endif" style=""
                          class="
                            font-weight-bold text-right border-0 pr-4 py-1
                          ">
                        Taxable amount
                      </td>
                      <td style=""
                          class=" font-weight-bold border-0 pr-4 py-1">
                        @php echo number_format( $takeaway->saleInvoice->getTaxableAmount() ); @endphp
                      </td>
                    </tr>
                  @endif

                  {{--Tax sale invoice additions --}}
                  @foreach ($takeaway->saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)

                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) != 'vat')
                      @continue
                    @endif

                    <tr class="border-0 bg-warning-rm p-0">
                      <td colspan="@if ($takeaway->status != 'closed') 5 @else 4 @endif" style=""
                          class="
                            font-weight-bold text-right border-0 pr-4 py-1
                          ">
                        {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                        (13 %)
                      </td>
                      <td style=""
                          class="
                            @if ($saleInvoiceAddition->saleInvoiceAdditionHeading->effect == 'minus')
                              text-danger
                            @endif
                            font-weight-bold border-0 py-1">
                        @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                      </td>
                    </tr>
                  @endforeach

                  <tr class="border-0 bg-success text-white p-0" style="font-size: 1rem;">
                    <td colspan="@if ($takeaway->status != 'closed') 5 @else 4 @endif" style="" class="font-weight-bold text-right border-0 pr-4 py-2">
                      <strong>
                      Total
                      </strong>
                    </td>
                    <td style="" class="font-weight-bold border-0 py-2">
                      @php echo number_format( $takeaway->saleInvoice->getTotalAmount() ); @endphp
                    </td>
                  </tr>
                  @endif
                </tfoot>
  
              </table>
            </div>

            {{-- Show in smaller screens --}}
            <div class="table-responsive d-md-none">
              <table class="table">
                @if ($takeaway)
                  @if (count($takeaway->saleInvoice->saleInvoiceItems) > 0)
                    @foreach ($takeaway->saleInvoice->saleInvoiceItems as $item)
                    <tr style="font-size: 1.1rem;" class="font-weight-bold text-white-rm">
                      <td>
                        <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                      </td>
                      <td>
                        {{ $item->product->name }}
                        <br />
                        <span class="text-primary mr-3">
                          Rs @php echo number_format( $item->product->selling_price ); @endphp
                        </span>
                        <span class="text-secondary" style="font-size: 1rem;">
                          Qty: {{ $item->quantity }}
                        </span>
                      </td>
                      <td>
                        @php echo number_format( $item->getTotalAmount() ); @endphp
                      </td>
                      <td>
                        <a href="" wire:click.prevent="confirmRemoveItemFromTakeaway({{ $item->sale_invoice_item_id }})" class="">
                        <i class="fas fa-trash text-danger"></i>
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                @endif
              </table>
            </div>
            @else
              <div class="p-4 bg-white border text-muted">
                <p>
                  <i class="fas fa-exclamation-circle mr-3"></i>
                  No items
                <p>
              </div>
            @endif
          @endif

        </div>
      </div>

    </div>
  
    <div class="col-md-4">
      @if ($takeaway->status != 'closed' && $takeaway->saleInvoice->payment_status != 'paid' && $modes['makePayment'])
        @livewire ('takeaway-work-make-payment', ['takeaway' => $takeaway,])
      @endif
    </div>
  </div>

  @if ($modes['confirmRemoveSaleInvoiceItem'])
    @livewire ('takeaway-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
  @endif

</div>
@endif
</div>
