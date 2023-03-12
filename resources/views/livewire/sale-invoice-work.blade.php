<div>
  @if ($saleInvoice->takeaway && $saleInvoice->takeaway->status == 'closed')
    @livewire ('core-sale-invoice-display', ['saleInvoice' => $saleInvoice,])
  @else
<div>

  {{-- Show in bigger screens --}}
  <div class="row">

    <div class="col-md-8">

      @if ($saleInvoice)
        {{-- Todo: Why true? Why only takeaway? --}} 
        @if (true || $saleInvoice->takeaway->status == 'open' && $modes['addItem'])
          @livewire ('sale-invoice-work-add-item', ['saleInvoice' => $saleInvoice,])
        @endif
      @endif

      @if ($saleInvoice)

      {{-- Component loading indicator line --}}
      <div class="w-100" wire:loading.class="bg-info w-100" style="font-size: 0.2rem;">
        <div>
          &nbsp;
        </div>
      </div>

      <div class="card mb-0 shadow-sm">
        <div class="card-body p-0 bg-primary-rm text-danger">


          <div class="row p-0 mt-2 {{ env('OC_ASCENT_BG_COLOR') }} text-white py-5" style="margin: auto;">

            <div class="col-md-3 mb-3-rm bg-light-rm text-dark-rm py-2 border-left border-right">
              <div class="text-muted-rm mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                Customer
              </div>
              <div class="d-flex">
                @if ($modes['customerSelected'])
                  {{ $saleInvoice->customer->name }}
                @else
                  @if (
                        (
                          $saleInvoice->takeaway &&
                          $saleInvoice->takeaway->status == 'open'
                        )
                        ||
                        (
                          $saleInvoice->seatTableBooking &&
                          $saleInvoice->seatTableBooking->status == 'open'
                        )
                  )
                    <select class="custom-control w-75" wire:model.defer="customer_id">
                      <option>---</option>

                      @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}">
                          {{ $customer->name }}
                        </option>
                      @endforeach
                    </select>
                    <button class="btn btn-sm btn-light ml-2" wire:click="linkCustomerToSaleInvoice">
                      Yes
                    </button>
                  @else
                    None
                  @endif
                @endif
              </div>
            </div>

            <div class="col-md-2 mb-3 d-flex">
              <div>
                <div class="mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                  Invoice ID
                </div>
                <div class="h6">
                  {{ $saleInvoice->sale_invoice_id }}
                </div>
              </div>
            </div>

            <div class="col-md-3 mb-3">
              <div class="mb-1 h6" style="font-size: calc(0.6rem + 0.2vw);">
                Invoice Date
              </div>
              @if ($modes['backDate'])
                <div class="">
                  <div class="d-flex-rm">
                    <input type="date" wire:model.defer="sale_invoice_date">
                    <div class="mt-2">
                      <button class="btn btn-light" wire:click="changeSaleInvoiceDate">
                        <i class="fas fa-check-circle text-success"></i>
                      </button>
                      <button class="btn btn-light" wire:click="exitMode('backDate')">
                        <i class="fas fa-times-circle text-danger"></i>
                      </button>
                    </div>
                  </div>
                </div>
              @else
                <div class="h6" role="button" wire:click="enterModeSilent('backDate')">
                  {{ $saleInvoice->sale_invoice_date }}
                </div>
              @endif
            </div>

            <div class="col-md-2" style="font-size: calc(0.6rem + 0.2vw);">
              <div class="" style="font-size: calc(0.6rem + 0.2vw);">
                Payment Status
              </div>
              <div>
                @if ( $saleInvoice->payment_status == 'paid')
                <span class="badge badge-pill badge-success">
                Paid
                </span>
                @elseif ( $saleInvoice->payment_status == 'partially_paid')
                <span class="badge badge-pill badge-warning">
                Partial
                </span>
                @elseif ( $saleInvoice->payment_status == 'pending')
                <span class="badge badge-pill badge-danger">
                Pending
                </span>
                @else
                <span class="badge badge-pill badge-secondary">
                  {{ $saleInvoice->payment_status }}
                </span>
                @endif
              </div>
            </div>
            <div class="col-md-2 bg-warning-rm">
              <div class="d-flex justify-content-end h-100">
                <button class="btn btn-light h-100" style="color: green;">
                  <i class="fas fa-dice-d6"></i>
                  <br/>
                  <span style="font-size: 1.1rem;"> @if ($saleInvoice->takeaway)
                      Sales
                    @elseif ($saleInvoice->seatTableBooking)
                      {{ $saleInvoice->seatTableBooking->seatTable->name }}
                    @else
                      Sales
                    @endif
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

          @if ($saleInvoice)

            @if (count($saleInvoice->saleInvoiceItems) > 0)
            {{-- Show in bigger screens --}}
            <div class="table-responsive d-none d-md-block">
              <table class="table table-hover border-dark mb-0">
                <thead>
                  <tr class="{{ env('OC_ASCENT_BG_COLOR') }} {{ env('OC_ASCENT_TEXT_COLOR') }}" style="font-size: calc(0.6rem + 0.2vw);">
                    <th>--</th>

                    {{-- Todo: Good way to deal with takeaway and seat table booking? --}} 
                    @if ($saleInvoice->takeaway)
                      @if ($saleInvoice->takeaway->status != 'closed')
                        <th>#</th>
                      @endif
                    @endif
                    @if ($saleInvoice->seatTableBooking)
                      @if ($saleInvoice->seatTableBooking->status != 'closed')
                        <th>#</th>
                      @endif
                    @endif
                    <th>Item</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Amount</th>
                  </tr>
                </thead>
  
                <tbody style="font-size: 1.3rem;">
                  @if ($saleInvoice)
                    @if (count($saleInvoice->saleInvoiceItems) > 0)
                      @foreach ($saleInvoice->saleInvoiceItems as $item)
                      <tr style="font-size: calc(0.6rem + 0.2vw);" class="font-weight-bold text-white-rm">
                        @if (
                              (
                                $saleInvoice->takeaway &&
                                $saleInvoice->takeaway->status != 'closed'
                              ) 
                              ||
                              (
                                $saleInvoice->seatTableBooking &&
                                $saleInvoice->seatTableBooking->status != 'closed'
                              ) 
                            )
                          <td>
                            <a href="" wire:click.prevent="confirmRemoveItemFromSaleInvoice({{ $item->sale_invoice_item_id }})" class="">
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
  
                <tfoot class="" style="font-size: 0.8rem;">
                  <tr class="bg-danger-rm py-0">
                    <td colspan="
                        @if (
                          (
                            $saleInvoice->takeaway &&
                            $saleInvoice->takeaway->status != 'closed'
                          ) 
                          ||
                          (
                            $saleInvoice->seatTableBooking &&
                            $saleInvoice->seatTableBooking->status != 'closed'
                          ) 
                        )
                          5
                        @else
                          4
                        @endif
                        " style="" class="font-weight-bold text-right pr-4 py-1">
                      <strong>
                      Subtotal
                      </strong>
                    </td>
                    <td style="" class="font-weight-bold py-1">
                      @php echo number_format( $saleInvoice->getTotalAmountRaw() ); @endphp
                    </td>
                  </tr>

                  @if (
                    (
                      $saleInvoice->takeaway &&
                      $saleInvoice->takeaway->status == 'closed'
                    ) 
                    ||
                    (
                      $saleInvoice->seatTableBooking &&
                      $saleInvoice->seatTableBooking->status == 'closed'
                    ) 
                  )
                  {{-- Non tax sale invoice additions --}}
                  @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)

                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) == 'vat')
                      @continue
                    @endif

                    <tr class="border-0 bg-info-rm p-0">
                      <td colspan="
                          @if (
                            (
                              $saleInvoice->takeaway &&
                              $saleInvoice->takeaway->status == 'closed'
                            ) 
                            ||
                            (
                              $saleInvoice->seatTableBooking &&
                              $saleInvoice->seatTableBooking->status == 'closed'
                            ) 
                          )
                            5
                          @else
                            4
                          @endif" style=""
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
                      <td colspan="
                          @if (
                            (
                              $saleInvoice->takeaway &&
                              $saleInvoice->takeaway->status == 'closed'
                            ) 
                            ||
                            (
                              $saleInvoice->seatTableBooking &&
                              $saleInvoice->seatTableBooking->status == 'closed'
                            ) 
                          )
                            5
                          @else
                            4
                          @endif"
                          style=""
                          class="
                            font-weight-bold text-right border-0 pr-4 py-1
                          ">
                        Taxable amount
                      </td>
                      <td style=""
                          class=" font-weight-bold border-0 pr-4 py-1">
                        @php echo number_format( $saleInvoice->getTaxableAmount() ); @endphp
                      </td>
                    </tr>
                  @endif

                  {{--Tax sale invoice additions --}}
                  @foreach ($saleInvoice->saleInvoiceAdditions as $saleInvoiceAddition)

                    @if (strtolower($saleInvoiceAddition->saleInvoiceAdditionHeading->name) != 'vat')
                      @continue
                    @endif

                    <tr class="border-0 bg-warning-rm p-0">
                      <td colspan="
                          @if (
                            (
                              $saleInvoice->takeaway &&
                              $saleInvoice->takeaway->status == 'closed'
                            ) 
                            ||
                            (
                              $saleInvoice->seatTableBooking &&
                              $saleInvoice->seatTableBooking->status == 'closed'
                            ) 
                          )
                            5
                          @else
                            4
                          @endif"
                          style=""
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
                    <td colspan="
                        @if (
                          (
                            $saleInvoice->takeaway &&
                            $saleInvoice->takeaway->status != 'closed'
                          ) 
                          ||
                          (
                            $saleInvoice->seatTableBooking &&
                            $saleInvoice->seatTableBooking->status != 'closed'
                          ) 
                        )
                          5
                        @else
                          4
                        @endif"
                        style="" class="font-weight-bold text-right border-0 pr-4 py-2">
                      <strong>
                      Total
                      </strong>
                    </td>
                    <td style="" class="font-weight-bold border-0 py-2">
                      @php echo number_format( $saleInvoice->getTotalAmount() ); @endphp
                    </td>
                  </tr>
                  @endif
                </tfoot>
  
              </table>
            </div>

            {{-- Show in smaller screens --}}
            <div class="table-responsive d-md-none">
              <table class="table">
                @if ($saleInvoice)
                  @if (count($saleInvoice->saleInvoiceItems) > 0)
                    @foreach ($saleInvoice->saleInvoiceItems as $item)
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
      @if ($saleInvoice->status != 'closed' && $saleInvoice->payment_status != 'paid' && $modes['makePayment'])
        @livewire ('sale-invoice-work-make-payment', ['saleInvoice' => $saleInvoice,])
      @endif
    </div>
  </div>

  @if ($modes['confirmRemoveSaleInvoiceItem'])
    @livewire ('sale-invoice-work-confirm-sale-invoice-item-delete', ['deletingSaleInvoiceItem' => $deletingSaleInvoiceItem,])
  @endif

</div>
  @endif
</div>
