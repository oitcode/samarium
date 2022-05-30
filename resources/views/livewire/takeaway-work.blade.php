<div>
  @if ($takeaway)
    @if (! $takeaway->saleInvoice->isPaid() && $modes['addItem'])
      @livewire ('takeaway-work-add-item', ['takeaway' => $takeaway,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-7">
      <div class="card mb-3 shadow">
        <div class="card-header bg-success-rm text-white-rm">
          <h1 class="" style="font-size: 2rem;">
            Takeaway
            @if ($takeaway)
            {{ $takeaway->takeaway_id}}
            @endif
          </h1>
        </div>
      
        <div class="card-body p-0">
  
          @if ($takeaway)
          <div class="table-responsive">
            <table class="table table-bordered table-hover border-dark mb-0">
              <thead>
                <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
                  <th>--</th>
                  <th>#</th>
                  <th>Item</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Amount</th>
                </tr>
              </thead>
  
              <tbody style="font-size: 1.3rem;">
                @if ($takeaway)
                  @if (count($takeaway->saleInvoice->saleInvoiceItems) > 0)
                    @foreach ($takeaway->saleInvoice->saleInvoiceItems as $item)
                    <tr style="font-size: 1.3rem; {{--background-image: linear-gradient(to right, #AFDBF5, #AFDBF5);--}}" class="font-weight-bold text-white-rm">
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
                <td colspan="5" style="font-size: 1.5rem;" class="font-weight-bold text-right">
                  <strong>
                  TOTAL
                  </strong>
                </td>
                <td style="font-size: 1.5rem;" class="font-weight-bold">
                  @if ($takeaway)
                    @php echo number_format( $takeaway->saleInvoice->getTotalAmount() ); @endphp
                  @else
                    0
                  @endif
                </td>
              </tfoot>
  
            </table>
          </div>
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
