<div>

    @if ($seatTable->isBooked())
      @if (true || $modes['addItem'])
        @livewire ('seat-table-work-display-add-item', ['seat_table_booking_id' => $seatTable->getCurrentBooking()->seat_table_booking_id,])
      @endif
    @endif
  <div class="row">

    <div class="col-md-7">
      <div class="card mb-0">
        <div class="card-header bg-success-rm text-white-rm">
          <h1 class="d-inline" style="font-size: 2rem;">
            {{ $seatTable->name }}
          </h2>

          <div class="d-inline">
            <button wire:loading class="btn">
              <span class="spinner-border text-white mr-3" role="status" style="font-size: 1rem;">
              </span>
            </button>
          </div>
        </div>
      
        <div class="card-body p-0">
  
          <div class="row" style="margin:auto;">
            <div class="col-md-8">
              <div class="d-inline">
                @if ($seatTable->isBooked())
                  @if (false)
                  <button class="btn btn-danger mr-3 h-100" wire:click="closeTable">
                    Close
                  </button>
                  <button class="btn btn-success mr-3 h-100"
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
                  @endif
                  </button>

                @else
                  <button onclick="this.disabled=true;" class="btn btn-success mr-3" style="height: 100px; width: 225px; font-size: 1.5rem;" wire:click="bookSeatTable">
                    <i class="fas fa-check mr-3"></i>
                    Book table
                  </button>
                @endif
              </div>

            </div>

            <div class="col-md-4">
            </div>
          </div>

        </div>
      </div>

      @if ($seatTable->isBooked())

      {{-- Show in bigger screens --}}
      <div class="table-responsive mb-0 d-none d-md-block">
        <table class="table table-bordered table-hover border-dark shadow-sm mb-0">
          <thead>
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
              @can ('is-admin')
              <th>--</th>
              @endcan
              <th class="d-none d-md-table-cell">#</th>
              <th>Item</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody class="bg-white" style="font-size: 1.3rem;">
            @if ($seatTable->getCurrentBooking()->hasSaleInvoice())
              @if ($seatTable->isBooked() && count($seatTable->getCurrentBookingItems()) > 0)
                @foreach ($seatTable->getCurrentBookingItems() as $item)
                <tr style="font-size: 1.3rem; {{--background-image: linear-gradient(to right, #AFDBF5, #AFDBF5);--}}" class="font-weight-bold text-white-rm">
                  @can ('is-admin')
                  <td>
                    <a href="" wire:click.prevent="confirmRemoveItemFromCurrentBooking({{ $item->sale_invoice_item_id }})" class="">
                    <i class="fas fa-trash text-danger"></i>
                    </a>
                  </td>
                  @endcan

                  <td class="d-none d-md-table-cell text-secondary" style="font-size: 1rem;"> {{ $loop->iteration }} </td>
                  <td>
                    <img src="{{ asset('storage/' . $item->product->image_path) }}" class="mr-3" style="width: 40px; height: 40px;">
                    {{ $item->product->name }}
                  </td>
                  <td>
                    {{--
                    @php echo number_format( $item->product->selling_price ); @endphp
                    --}}
                    @php echo number_format( $item->price_per_unit ); @endphp
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
  
          @can ('is-admin')
          <tbody class="bg-white">
            <tr class="d-none d-md-table-row">
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
            </tr>

            <tr class="d-md-none">
              <td colspan="4" style="font-size: 1.5rem;" class="font-weight-bold text-right">
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
            </tr>
          </tbody>
          @endcan
  
        </table>
      </div>

      {{-- Show in smaller screens --}}
      <div class="table-responsive d-md-none border">
        <table class="table">
          @if ($seatTable->getCurrentBooking()->hasSaleInvoice())
            @if ($seatTable->isBooked() && count($seatTable->getCurrentBookingItems()) > 0)
              @foreach ($seatTable->getCurrentBookingItems() as $item)
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
                @can ('is-admin')
                <td>
                  <a href="" wire:click.prevent="confirmRemoveItemFromCurrentBooking({{ $item->sale_invoice_item_id }})" class="">
                  <i class="fas fa-trash text-danger"></i>
                  </a>
                </td>
                @endcan
              </tr>
              @endforeach
            @endif
          @endif
        </table>
      </div>

      @endif

    </div>
  
    <div class="col-md-5">
      @can ('is-admin')
        @if ($seatTable->isBooked() && (true || $modes['makePayment']))
          @livewire ('seat-table-work-display-make-payment', ['seatTable' => $seatTable,])
        @endif
      @endcan
    </div>

    <div>
    @if ($modes['confirmRemoveSaleInvoiceItem'])
      @livewire ('seat-table-work-display-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
    @endif
    </div>


    {{-- Bill total PRINT div --}}
    @if ($seatTable->getCurrentBooking() && $seatTable->getCurrentBooking()->saleInvoice)
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
          @if ($seatTable->getCurrentBooking()->saleInvoice)
          Bill # : 90{{ $seatTable->getCurrentBooking()->saleInvoice->sale_invoice_id }}
          -078/79
          @endif
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
                <td>
                  &nbsp;&nbsp;
                </td>
                <td style="margin-right: 50px";>Qty</td>
                <td>
                  &nbsp;&nbsp;
                </td>
                <td style="margin-right: 50px";>Rate</td>
                <td>
                  &nbsp;&nbsp;
                </td>
                <td style="margin-right: 50px";>Amount</td>
              </tr>
              @foreach ($seatTable->getCurrentBookingItems() as $item)
                <tr>
                  <td> {{ $loop->iteration }} </td>
                  <td>
                    {{ \Illuminate\Support\Str::limit($item->product->name, 25, $end=' ...') }}
                  </td>
                  <td>
                    &nbsp;&nbsp;
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
                    &nbsp;&nbsp;
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
                <td colspan="7" style="text-aign: right;">
                  TOTAL
                </td>
                <td>
                  @if ($seatTable->getCurrentBooking()->saleInvoice)
                    @php echo number_format( $seatTable->getCurrentBooking()->saleInvoice->getTotalAmountRaw() ); @endphp
                  @endif
                </td>
              </tr>
              @foreach ($seatTable->getCurrentBooking()->saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)
                <tr class="text-secondary" style="font-size: 1.3rem;">
                  <td colspan="7" style="text-aign: right;">
                    {{ $saleInvoiceAddition->saleInvoiceAdditionHeading->name }}
                  </td>
                  <td style="">
                    @php echo number_format( $saleInvoiceAddition->amount ); @endphp
                  </td>
                </tr>
              @endforeach
              <tr>
                <td colspan="7" style="text-aign: right;">
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
    @endif


  </div>

  <div >
    <div class="row">
      <div class="col-md-6">
      </div>
    </div>
  </div >

</div>
