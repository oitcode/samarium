<div class="card bg-transparent border-0">

  <div class="card-header p-0 bg-white">
    <div class="d-flex justify-content-between my-2">
      <div class="d-flex flex-column justify-content-center">
        <h2 class="h4 pl-3 o-heading">
          Payment
        </h1>
      </div>
      <div>
        @include ('partials.dashboard.spinner-button')
      </div>
      @if (true)
      <div class="px-3 mb-2">
        @if (false && $modes['multiplePayments'])
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
      @endif
    </div>
  </div>

  <div class="card-body p-0 border-0">
    <div class="table-responsive mb-0">
      <table class="table mb-0">
        <tbody>
          <tr style="height: 50px;" class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 o-heading border-0 pt-2">
              <span class="ml-4">
                Subtotal
              </span>
            </td>
            <td class="p-0 h-100 o-heading pl-3 pt-2 border-0">
              {{ config('app.transaction_currency') }}
              @php echo number_format( $this->sub_total, 2 ); @endphp
            </td>
          </tr>

          {{-- Todo: Only vat? Any other taxes? --}}
          @if ($has_vat)
          <tr class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 o-heading border-0 pt-2">
              <span class="ml-4">
                Taxable amount
              </span>
            </td>
            <td class="p-0 h-100 o-heading pl-3 pt-2 border-0">
              @php echo number_format( $this->taxable_amount, 2 ); @endphp
            </td>
          </tr>
          @endif

          {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
          @foreach ($purchaseAdditions as $key => $val)

            {{-- Todo: Wont there be any other taxes other than vat? --}}
            @if (strtolower($key) != 'vat')
              @continue
            @else
            <tr style="height: 50px;" class="border-bottom p-0">
              <td class="w-50 h-100 p-0 o-heading border-0">
                <div class="h-100 d-flex flex-column justify-content-center">
                  @if (strtolower($key) == 'vat')
                    <div class="ml-4">
                      {{ $key }} (13 %)
                    </div>
                  @else
                    <span class="ml-4">
                      {{ $key }}
                    </span>
                  @endif
                </div>
              </td>
              <td class="p-0 w-50 h-100 bg-info o-heading border-0">
                <input class="w-100 h-100 o-heading border-0 pl-3"
                    type="text"
                    wire:keydown.enter="updateNumbers"
                    wire:model.live.debounce.500ms="purchaseAdditions.{{ $key }}" />
              </td>
            </tr>
            @endif
          @endforeach

          @if ($has_vat)
          <tr class="bg-light border-bottom">
            <td class="w-50 p-0 pt-2 o-heading border-0">
              <span class="ml-4 d-inline-block">
                Total
              </span>
            </td>
            <td class="p-0 h-100 text-primary o-heading pl-3 border-0">
              @php echo number_format( $this->grand_total, 2 ); @endphp
            </td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>

    <div>
      @if (! $modes['multiplePayments'])
        <div class="table-responsive mb-0" wire:key=" boomboom ">
          <table class="table table-bordered mb-0">
            <tbody>

              <tr style="height: 50px;" class="border-bottom">
                <td class="w-50 p-0 pt-2 bg-white p-0 o-heading border-0">
                  <span class="ml-4 d-inline-block mt-2 mb-3">
                    Paid Amount
                  </span>
                  (
                  {{ config('app.transaction_currency') }}
                  )
                  @error('tender_amount')
                  <div class="pl-3">
                    <span class="text-danger">{{ $message }}</span>
                  </div>
                  @enderror
                </td>
                <td class="p-0 h-100 o-heading border-0">
                  <input class="w-100 h-100 o-heading border-0 pl-3"
                      type="text"
                      style="background-color: #afa; outline: none;"
                      wire:model="paid_amount" />
                </td>
              </tr>

              <tr style="height: 50px;" class="bg-light border-bottom">
                <td class="w-50 p-0 pt-2 o-heading border-0">
                  <span class="ml-4">
                    Payment type
                  </span>
                </td>
                <td class="p-0 h-100 w-50 o-heading border-0">
                  <select class="w-100 h-100 custom-control border-0 bg-white"
                      style="outline: none;"
                      wire:model="purchase_payment_type_id">
                    <option>---</option>

                    @foreach ($purchasePaymentTypes as $purchasePaymentType)
                      <option value="{{ $purchasePaymentType->purchase_payment_type_id }}"
                          wire:key="{{ $purchasePaymentType->purchase_payment_type_id }}">
                        {{ $purchasePaymentType->name }}
                      </option>
                    @endforeach
                  </select>
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
                <tr wire:key="inzaghi">
                  <td class="w-50 p-0 p-0 o-heading">
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
              <tr class="border-0" wire:key="ronaldinho">
                <td class="w-50 p-0 p-0 o-heading border-0">
                  <span class="ml-4">
                    Paid amount
                  </span>
                </td>
                <td class="border-0">
                  {{ $paid_amount }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      @endif
    </div>

    <div class="p-0 m-0 mt-2">
      @if (! $modes['paid'])
      <button
          onclick="this.disabled=true;"
          class="btn btn-success w-100 py-3 o-heading text-white"
          wire:click="store"
          >
        <i class="fas fa-check-circle mr-3"></i>
        Confirm
      </button>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
      @else
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg btn-success mr-3"
            wire:click="finishPayment"
            style="width: 120px; height: 70px;">
          FINISH
        </button>
        <button
            onclick="this.disabled=true;"
            class="btn btn-lg mr-3"
            wire:click="finishPayment"
            style="width: 120px; height: 70px; background-color: orange">
          PRINT
        </button>
      @endif
    </div>
  </div>

</div>
