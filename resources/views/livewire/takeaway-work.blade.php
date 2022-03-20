<div>
  @if ($takeaway)
    @if (true || $modes['addItem'])
      @livewire ('takeaway-work-add-item', ['takeaway' => $takeaway,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-6">
      <div class="card mb-3 shadow">
        <div class="card-header bg-success-rm text-white-rm">
          <h1 class="badge badge-success" style="font-size: 2rem;">
            Takeaway
            @if ($takeaway)
            {{ $takeaway->takeaway_id}}
            @endif
          </h1>
          <span class="badge badge-success">
            Sale Invoice Id
            @if ($takeaway)
            {{ $takeaway->saleInvoice->sale_invoice_id }}
            @endif
          </span>
        </div>
      
        <div class="card-body p-0">
  
          <div class="row">
            <div class="col-md-8">
              <div class="p-2">
                <div class="float-left">
                  @if (! $takeaway->isPaid())
                    <button class="btn btn-warning-rm mr-3" style="height: 100px; width: 225px; font-size: 1.5rem; background-color: orange;" wire:click="enterMode('makePayment')">
                      <i class="fas fa-shopping-cart mr-3"></i>
                      Payment
                    </button>

                  @else
                    <span class="mr-3 text-success" style="height: 100px; width: 225px; font-size: 1.5rem;">
                      <i class="fas fa-check mr-3"></i>
                      PAID
                    </span>
                  @endif
                </div>
                <div class="float-left">
                  @if ($takeaway)
                    <button class="btn btn-warning-rm mr-3 p-3 text-danger" style="font-size: 2.5rem;">
                      <span class="mr-2">
                      Rs
                      </span>
                      @php echo number_format( $takeaway->saleInvoice->getTotalAmount() ); @endphp
                    </button>
                  @endif
                </div>

                <div class="float-left">
                  <button wire:loading class="btn">
                    <span class="spinner-border text-info mr-3" role="status">
                    </span>
                  </button>
                </div>

                <div class="clearfix">
                </div>
  
  
              </div>

              <div class="table-responsive">
                <table class="table">
                  @if ($takeaway)
                  <tr>
                    <td colspan="2">
                      <button class="btn btn-danger mr-3" wire:click="">
                        Close
                      </button>
                      <button class="btn btn-success mr-3" wire:click="" onclick="printElem('printDiv')">
                        Print
                      </button>
                    </td>
                  </tr>
                  @endif
                  <tr class="text-success" style="font-size: 1.3rem;">
                    <td>
                      <i class="fas fa-shopping-cart mr-3"></i>
                      Total items
                    </td>
                    <td class="font-weight-bold">
                      @if ($takeaway)
                        TODO
                      @else
                        NA
                      @endif
                    </td>
                  </tr>
                  <tr style="font-size: 1.3rem;">
                    <td>
                      <i class="fas fa-rupee-sign mr-3"></i>
                      Total bill amount
                    </td>
                    <td class="font-weight-bold">
                      @if ($takeaway)
                        @php echo number_format( $takeaway->saleInvoice->getTotalAmount() ); @endphp
                      @else
                        NA
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-4">
              @if ($takeaway)
                <div class="d-flex justify-content-center h-100 bg-danger text-white">
                  <div class="d-flex justify-content-center align-self-center">
                    <h3 class="h5 font-weight-bold p-3">
                      BOOKED
                    </h3>
                  </div>
                </div>
              @else
                <div class="d-flex justify-content-center h-100 bg-success text-white">
                  <div class="d-flex justify-content-center align-self-center">
                    <h3 class="h5 font-weight-bold p-3">
                      OPEN
                    </h3>
                  </div>
                </div>
              @endif
            </div>
          </div>

        </div>
      </div>

      @if ($modes['makePayment'])
        @livewire ('takeaway-work-make-payment', ['takeaway' => $takeaway,])
      @endif
  
    </div>
  
    <div class="col-md-6">
      @if ($takeaway)
      <div class="table-responsive">
        <table class="table table-bordered table-hover border-dark">
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
  
          <tfoot class="bg-success text-white" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
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

      <div>
        <div class="float-right">
        </div>
      </div>
      
    </div>
  </div>

  @if ($modes['confirmRemoveSaleInvoiceItem'])
    @livewire ('takeaway-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
  @endif

</div>
