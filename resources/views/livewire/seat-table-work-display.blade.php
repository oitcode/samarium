<div>

  @if ($seatTable->isBooked())
    @if (true || $modes['addItem'])
      @livewire ('seat-table-work-display-add-item', ['seat_table_booking_id' => $seatTable->getCurrentBooking()->seat_table_booking_id,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-6">
      <div class="card mb-3 shadow">
        <div class="card-header bg-success-rm text-white-rm">
          <h1 class="badge badge-success" style="font-size: 2rem;">
            {{ $seatTable->name }}
          </h2>
        </div>
      
        <div class="card-body p-0">
  
          <div class="row">
            <div class="col-md-8">
              <div class="p-2">
                <div class="float-left">
                  @if ($seatTable->isBooked())
                    <button class="btn btn-warning-rm mr-3" style="height: 100px; width: 225px; font-size: 1.5rem; background-color: orange;" wire:click="enterMode('makePayment')">
                      <i class="fas fa-shopping-cart mr-3"></i>
                      Payment
                    </button>

                  @else
                    <button onclick="this.disabled=true;" class="btn btn-success mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="bookSeatTable">
                      <i class="fas fa-check mr-3"></i>
                      Book table
                    </button>
                  @endif
                </div>
                <div class="float-left">
                  @if ($seatTable->isBooked())
                    @if (true)
                    <button class="btn btn-warning-rm mr-3 p-3 text-danger" style="font-size: 2.5rem;">
                      <span class="mr-2">
                      Rs
                      </span>
                      @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
                    </button>
                    @else
                      FOO
                    @endif
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
                  @if ($seatTable->isBooked())
                  <tr>
                    <td colspan="2">
                      <button class="btn btn-danger mr-3" wire:click="closeTable">
                        Close
                      </button>
                      <button class="btn btn-success mr-3"
                          onclick="
                              console.log('Bayern ');

                              var mywindow = window.open('', 'PRINT', 'height=400,width=600');
    
                              mywindow.document.write('<html><head><title>' + document.title  + '</title>');
                              mywindow.document.write('</head><body >');
                              mywindow.document.write(document.getElementById('printDiv').innerHTML);
                              mywindow.document.write('</body></html>');
    
                              mywindow.document.close();
                              mywindow.focus();
    
                              mywindow.print();
                              mywindow.close();



                              console.log('Munich')">
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
                      @if ($seatTable->isBooked())
                        {{ $seatTable->getCurrentBookingTotalItems() }}
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
                      @if ($seatTable->isBooked())
                        @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
                      @else
                        NA
                      @endif
                    </td>
                  </tr>
                </table>
              </div>
            </div>

            <div class="col-md-4">
              @if ($seatTable->isBooked())
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
        @livewire ('seat-table-work-display-make-payment', ['seatTable' => $seatTable,])
      @endif
  
    </div>
  
    <div class="col-md-6">
      @if ($seatTable->isBooked())
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
            @if ($seatTable->getCurrentBooking()->hasSaleInvoice())
              @if ($seatTable->isBooked() && count($seatTable->getCurrentBookingItems()) > 0)
                @foreach ($seatTable->getCurrentBookingItems() as $item)
                <tr style="font-size: 1.3rem; {{--background-image: linear-gradient(to right, #AFDBF5, #AFDBF5);--}}" class="font-weight-bold text-white-rm">
                  <td>
                    <a href="" wire:click.prevent="confirmRemoveItemFromCurrentBooking({{ $item->sale_invoice_item_id }})" class="">
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
              @if ($seatTable->isBooked())
                @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
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

    @if ($modes['confirmRemoveSaleInvoiceItem'])
      @livewire ('seat-table-work-display-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
    @endif


    {{-- Bill total PRINT div --}}
    <div class="d-none" id="printDiv">
      <div class="text-center">
        <div class="text-center">
          MISTER KIMCHI RAMEN
        </div>
        <br />
        <div class="text-center">
          BALUWATAR, KTM, NEPAL
        </div>
        <div class="h4" class="text-center">
          PAN Num: 611718420
        </div>
        <div class="text-center">
          ABBREVIATED TAX INVOICE
        </div>
      </div>

      <br />
      <br />

      <div>
        <div>
          Bill # : 90{{ $seatTable->getCurrentBooking()->saleInvoice->sale_invoice_id }}
          -078/79
        </div>
        <div>
          Invoice Date : {{ $seatTable->getCurrentBooking()->saleInvoice->sale_invoice_date }}
        </div>
      </div>

      <br />
      <br />

      <div>
        <div>
          <table class="">
            <tbody>
              <tr>
                <td style="margin-right: 50px";>SN</td>
                <td style="margin-right: 50px";>Particular</td>
                <td style="margin-right: 50px";>Qty</td>
                <td>
                  &nbsp;&nbsp;
                </td>
                <td style="margin-right: 50px";>Rate</td>
                <td style="margin-right: 50px";>Amount</td>
              </tr>
              @foreach ($seatTable->getCurrentBookingItems() as $item)
                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td>
                    {{ \Illuminate\Support\Str::limit($item->product->name, 25, $end=' ...') }}
                  </td>
                  <td>
                    @php echo number_format( $item->product->selling_price ); @endphp
                  </td>
                  <td>
                    &nbsp;&nbsp;
                  </td>
                  <td>
                    {{ $item->quantity }}
                  </td>
                  <td>
                    @php echo number_format( $item->getTotalAmount() ); @endphp
                  </td>
                </tr>
              @endforeach
              <tr>
                <td colspan="6">
                  &nbsp;
                </td>
              </tr>
              <tr style="">
                <td colspan="5" style="text-aign: right;">
                  TOTAL
                </td>
                <td>
                  @php echo number_format( $seatTable->getCurrentBooking()->saleInvoice->getTotalAmountRaw() ); @endphp
                </td>
              </tr>
              @foreach ($seatTable->getCurrentBooking()->saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="text-secondary" style="font-size: 1.3rem;">
                  <td colspan="4" style="text-aign: right;">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                  </td>
                  <td style="">
                    @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                  </td>
                </tr>
              @endforeach
              <tr>
                <td colspan="5" style="text-aign: right;">
                  GRAND TOTAL
                </td>
                <td>
                  @php echo number_format( $seatTable->getCurrentBookingTotalAmount() ); @endphp
                </td>
              </tr>
            </tbody>
          </table>

          <div>
            -----------------------------------------------<br />
            THANK YOU &nbsp;&nbsp; VISIT AGAIN<br />
            -----------------------------------------------<br />
            kimchiramen.com.np
          </div>
        </div>
      </div>

    </div>


  </div>

</div>
