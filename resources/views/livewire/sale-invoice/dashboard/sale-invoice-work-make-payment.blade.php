<div class="bg-white">

  {{--
  |--------------------------------------------------------------------------
  | Sale Invoice Work Make Payment - Livewire Component View
  |--------------------------------------------------------------------------
  |
  | This blade template renders a payment interface that displays:
  | - Transaction summary with itemized breakdown (subtotal, discounts, VAT, total)
  | - Interactive payment form with tender amount input and payment type selection
  | - Support for both single and multiple payment methods
  | - Real-time calculation of change/return amount
  | - Payment confirmation and completion workflow
  | 
  --}}

  <div class="card">
    <div class="card-body p-0 pb-3">
      <div class="text-white-rm py-3 text-center o-package-color-rm">
        <div class="h4">
          CUSTOMER DISPLAY
        </div>
        <div class="h3 o-heading text-warning-rm mb-0">
          {{ config('app.transaction_currency_symbol') }}
          @php echo number_format( $this->grand_total ); @endphp
        </div>
      </div>
      <div class="bg-success text-white py-3 text-center">
        <div class="h5 o-heading text-white mb-0">
          TRANSACTION SUMMARY
        </div>
      </div>
      <div class="table-responsive mb-0 bg-white">
        <table class="table mb-0">
          <tbody>
            <tr class="p-0">
              <td class="w-50 p-0 h-100 o-heading border-0 py-2">
                <span class="ml-4">
                  Subtotal
                </span>
              </td>
              <td class="p-0 h-100 o-heading pl-3 border-0 py-2">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $this->total ); @endphp
              </td>
            </tr>
  
            {{-- Deal with non-taxes additions first --}}
            @foreach ($saleInvoiceAdditions as $key => $val)
              @if (strtolower($key) == 'vat')
                @continue
              @else
                <tr class="border-0" wire:key="{{ rand() }}">
                  <td class="w-50 pl-0 o-heading border-0">
                    {{-- Hard code for discount . Temp. Todo permanent design/fix --}} 
                    @if (strtolower($key) == 'discount')
                      <div class="ml-4">
                        {{ $key }}
                        @if (! $modes['paid'])
                        <select
                            class="border border-secondary badge-pill"
                            wire:model.live="discount_percentage"
                            wire:change="calculateDiscount">
                          <option value="--">--</option>
                          <option value="5">5 %</option>
                          <option value="10">10 %</option>
                          <option value="15">15 %</option>
                          <option value="20">20 %</option>
                          <option value="25">25 %</option>
                          <option value="50">50 %</option>
                          <option value="manual">Manual</option>
                        </select>
                        @else
                          {{ $discount_percentage }} %
                        @endif
                      </div>
                    @elseif (strtolower($key) == 'vat')
                      <div class="ml-4">
                        {{ $key }} (13 %)
                      </div>
                    @else
                      <span class="ml-4">
                        {{ $key }}
                      </span>
                    @endif
                  </td>
                  <td class="p-0 h-100 o-heading border-0">
                    @if (strtolower($key) == 'vat')
                      {{ $val }}
                    @else
                      @if (strtolower($key) == 'discount')
                        @if ($modes['manualDiscount'])
                          @if (! $modes['paid'])
                            <span class="pl-3">
                              {{ config('app.transaction_currency_symbol') }}
                            </span>
                            <input class="h-100 o-heading pt-2 mt-1 border-0"
                                type="text" wire:model="saleInvoiceAdditions.{{ $key }}"
                                wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
                          @else
                            <div class="w-100 h-100 o-heading pl-3 border-0">
                              {{ config('app.transaction_currency_symbol') }}
                              {{ $saleInvoiceAdditions[$key] }}
                            <div>
                          @endif
                        @else
                          <div class="w-100 h-100 o-heading pl-3 pt-2" wire:click="enterModeSilent('manualDiscount')">
                            {{ config('app.transaction_currency_symbol') }}
                            {{ $saleInvoiceAdditions['Discount'] }}
                          </div>
                        @endif
                      @else
                        @if (! $modes['paid'])
                          <input class="w-100 h-100 o-heading pl-3 border-0"
                              type="text" wire:model.live.debounce.500ms="saleInvoiceAdditions.{{ $key }}"
                              wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
                        @else
                          <div class="w-100 h-100 o-heading pl-3 border-0">
                            {{ config('app.transaction_currency_symbol') }}
                            {{ $saleInvoiceAdditions[$key] }}
                          </div>
                        @endif
                      @endif
                    @endif
                  </td>
                </tr>
              @endif
            @endforeach
  
            {{-- Todo: Only vat? Any other taxes? --}}
            @if ($has_vat)
            <tr class="border-bottom-m">
              <td class="w-50 p-0 h-100 o-heading border-0 pt-2">
                <span class="ml-4">
                  Taxable amount
                </span>
              </td>
              <td class="p-0 h-100 o-heading pl-3 pt-2 border-0">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $this->taxable_amount ); @endphp
              </td>
            </tr>
            @endif
  
            {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
            @foreach ($saleInvoiceAdditions as $key => $val)
              {{-- Todo: Wont there be any other taxes other than vat? --}}
              @if (strtolower($key) != 'vat')
                @continue
              @else
              <tr style="height: 50px;">
                <td class="w-50 p-0 h-100 o-heading border-0 pt-2">
                  @if (strtolower($key) == 'vat')
                    <div class="ml-4">
                      {{ $key }} (13 %)
                    </div>
                  @else
                    <span class="ml-4">
                      {{ $key }}
                    </span>
                  @endif
                </td>
                <td class="pl-3 h-100 o-heading border-0">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $val ); @endphp
                </td>
              </tr>
              @endif
            @endforeach
  
            <tr>
              <td class="w-50 p-0 o-heading border-0">
                <span class="ml-4 d-inline-block">
                  Total
                </span>
              </td>
              <td class="p-0 h-100 o-heading pl-3 border-0">
                {{ config('app.transaction_currency_symbol') }}
                @php echo number_format( $this->grand_total ); @endphp
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div>
    <h2 class="h4 text-dark o-heading pl-4 py-4">
      Payment
    </h2>
    @if (false)
    <div class="d-flex justify-content-between bg-primary text-white">
      <div class="d-flex flex-column justify-content-center">
        <h2 class="h4 bg-primary text-white o-heading pl-2">
          Payment
        </h2>
      </div>
      <div>
      @include ('partials.dashboard.spinner-button')
      </div>
      <div class="px-3 mb-2">
        @if ($modes['multiplePayments'])
          <button class="btn btn-sm mr-3 border-secondary" wire:click="exitMultiplePaymentsMode">
            Single payment
          </button>
        @else
          <button class="btn btn-sm mr-3
              {{ config('app.oc_ascent_text_color', 'text-white') }}"
              wire:click="enterMultiplePaymentsMode">
            <i class="fas fa-ellipsis-h"></i>
          </button>
        @endif
      </div>
    </div>
    @endif
  </div>
  @if (! $modes['multiplePayments'])
    <div class="table-responsive mb-0 bg-warning" wire:key=" boomboom ">
      <table class="table table-bordered mb-0 mt-0">
        <tbody>
          <tr style="height: 50px;" class="bg-light">
            <td class="w-50 p-0 p-0 o-heading border-0">
              <span class="ml-4 d-inline-block mt-2 mb-3">
                Tender Amount
              </span>
              <span class="pl-2">
                (
                {{ config('app.transaction_currency_symbol') }}
                )
              </span>
              @error('tender_amount')
              <div class="pl-3">
                <span class="text-danger">{{ $message }}</span>
              </div>
              @enderror
            </td>
            <td class="p-0 h-100 o-heading border-0">
              @if (! $modes['paid'])
              <input class="w-100 h-100 o-heading pl-2"
                  type="text"
                  wire:model="tender_amount" />
              @else
                <div class="w-100 h-100 o-heading border-0 pl-3">
                  {{ $tender_amount }}
                </div>
              @endif
            </td>
          </tr>
          <tr style="height: 50px;" class="bg-light">
            <td class="w-50 p-0 pt-2 o-heading border-0">
              <span class="ml-4">
                Payment type
              </span>
            </td>
            <td class="p-0 h-100 w-50 o-heading border-0">
              @if (! $modes['paid'])
              <select class="w-100 h-100 custom-control border-0 bg-light"
                  style="outline: none;"
                  wire:model="sale_invoice_payment_type_id">
                <option>---</option>
    
                @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
                  <option value="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}"
                      wire:key="{{ $saleInvoicePaymentType->sale_invoice_payment_type_id }}">
                    {{ $saleInvoicePaymentType->name }}
                  </option>
                @endforeach
              </select>
              @else
                {{ \App\Models\SaleInvoice\SaleInvoicePaymentType::getNameFromId($sale_invoice_payment_type_id) }}
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  @else
    <div class="table-responsive mb-0" wire:key=" FOOBARAA ">
      <table class="table table-bordered mb-0">
        <tbody>
          @foreach ($multiPayments as $key => $val)
            <tr style="height: 50px;" wire:key="{{ $key }}">
              <td class="w-50 p-0 o-heading bg-white">
                <span class="ml-4">
                  {{ $key }}
                </span>
              </td>
              <td class="p-0 h-100 w-50 bg-warning o-heading">
                <input type="text"
                    class="w-100 h-100 o-heading" 
                    wire:model.live="multiPayments.{{ $key }}"
                    wire:keydown.enter="calculateTenderAmount"
                    wire:change="calculateTenderAmount"
                >
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="table-responsive mb-0" wire:key=" FCBAYERN ">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr class="border-0" style="height: 50px;" wire:key="{{ $key }}">
            <td class="w-50 p-0 o-heading border-0 bg-white">
              <span class="ml-4">
                Tender amount
              </span>
            </td>
            <td class="border-0 bg-white p-0 o-heading pl-1">
              {{ $tender_amount }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  @endif

  @if ($modes['paid'])
    <div class="table-responsive mb-0" wire:key=" BIZCUP ">
      <table class="table table-bordered mb-0">
        <tbody>
          <tr class="border-0" style="height: 50px;" wire:key="abcdedfg">
            <td class="w-50 p-0 pt-2 o-heading border-0">
              <span class="ml-4">
                Return
              </span>
            </td>
            <td class="text-danger border-0">
              @if ($modes['paid'])
                {{ $returnAmount }}
              @else
                &nbsp;
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  @endif

  <div class="p-0 my-2">
    @if (! $modes['paid'])
      <button
          onclick="this.disabled=true;"
          class="btn btn-success w-100 py-3 o-heading text-white"
          wire:click="store">
        <i class="fas fa-check-circle mr-3"></i>
        CONFIRM
      </button>
    @else
      <button
          onclick="this.disabled=true;"
          class="btn btn-block btn-lg btn-success py-4 m-0"
          wire:click="finishPayment">
        FINISH
      </button>
      <button
          onclick="this.disabled=true;"
          class="btn btn-block btn-lg btn-primary py-4 m-0"
          wire:click="finishPayment">
        PRINT
      </button>
    @endif
  </div>

</div>
