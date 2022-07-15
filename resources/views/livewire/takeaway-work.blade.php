<div>
  @if ($takeaway)
    @if ($takeaway->status == 'open' && $modes['addItem'])
      @livewire ('takeaway-work-add-item', ['takeaway' => $takeaway,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-7">
      <div class="card mb-3 shadow">
        <div class="card-header bg-success text-white">
          <h1 class="h4">
            Takeaway
            @if ($takeaway)
            {{ $takeaway->takeaway_id}}
            @endif
          </h1>
        </div>
      
        <div class="card-body p-0">
  
          @if ($takeaway)
            @if ($takeaway->status != 'open')
      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0">


          <div class="row p-4" style="margin: auto;">

            <div class="col-md-3 mb-3">
              <div class="text-muted-rm mb-1">
                Customer
              </div>
              <div class="h5">
                @if ($takeaway->saleInvoice->customer)
                  <i class="fas fa-user-circle text-muted mr-2"></i>
                  {{ $takeaway->saleInvoice->customer->name }}
                @else
                  <i class="fas fa-exclamation-circle text-muted mr-2"></i>
                  <span class="text-muted">
                    None
                  </span>
                @endif
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div class="text-muted-rm mb-1">
                Invoice ID
              </div>
              <div class="h5">
                {{ $takeaway->saleInvoice->sale_invoice_id }}
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div class="text-muted-rm mb-1">
                Invoice Date
              </div>
              <div class="h5">
                {{ $takeaway->saleInvoice->created_at->toDateString() }}
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div>
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
               <div>
                 <div class="text-primary" style="font-size: 0.8rem;" role="button" wire:click="enterMode('showPayments')">
                   Show payments
                 </div>
               </div>
               @if (false && $modes['showPayments'])
                 <div>
                   <div>
                     Payments
                   </div>
                   <div>
                     @foreach ($takeaway->saleInvoice->saleInvoicePayments as $saleInvoicePayment)
                       <div>
                       Rs
                       @php echo number_format( $saleInvoicePayment->amount ); @endphp
                       <span class="badge badge-pill ml-3">
                       {{ $saleInvoicePayment->saleInvoicePaymentType->name }}
                       </span>
                       <span class="badge badge-pill ml-3">
                       {{ $saleInvoicePayment->payment_date }}
                       </span>
                       </div>
                     @endforeach
                   </div>
                 </div>
               @endif
              </div>
            </div>

          </div>

        </div>
      </div>
            @endif
          @endif

          @if ($takeaway)

            @if (count($takeaway->saleInvoice->saleInvoiceItems) > 0)
            {{-- Show in bigger screens --}}
            <div class="table-responsive d-none d-md-block">
              <table class="table table-bordered-rm table-hover border-dark mb-0">
                <thead>
                  <tr class="bg-success-rm text-white-rm" style="font-size: calc(0.8rem + 0.2vw);">
                    <th>--</th>
                    <th>#</th>
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
                      <tr style="font-size: calc(0.8rem + 0.2vw);" class="font-weight-bold text-white-rm">
                        <td>
                          <a href="" wire:click.prevent="confirmRemoveItemFromTakeaway({{ $item->sale_invoice_item_id }})" class="">
                          <i class="fas fa-trash text-danger"></i>
                          </a>
                        </td>
                        <td class="text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
                        <td>
                          <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
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
  
                <tfoot class="">
                  <td colspan="5" style="font-size: calc(1.3rem + 0.2vw);" class="font-weight-bold text-right">
                    <strong>
                    Total
                    </strong>
                  </td>
                  <td style="font-size: calc(1.3rem + 0.2vw);" class="font-weight-bold">
                    @if ($takeaway)
                      @php echo number_format( $takeaway->saleInvoice->getTotalAmount() ); @endphp
                    @else
                      0
                    @endif
                  </td>
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
  
    <div class="col-md-5">
      @if ($takeaway->status != 'closed' && $takeaway->saleInvoice->payment_status != 'paid' && $modes['makePayment'])
        @livewire ('takeaway-work-make-payment', ['takeaway' => $takeaway,])
      @endif
    </div>
  </div>

  @if ($modes['confirmRemoveSaleInvoiceItem'])
    @livewire ('takeaway-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
  @endif

</div>
