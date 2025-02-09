<div class="card">
  <div class="card-header">
    <div class="d-flex justify-content-between py-1-rm">
      <div class="d-flex flex-column justify-content-center">
        <h2 class="h4 o-heading">
          Payment
        </h1>
      </div>
      <div>
      @include ('partials.dashboard.spinner-button')
      </div>
    </div>
  </div>

  <div class="card-body p-0">
    <div>
      @if (! $modes['multiplePayments'])
        <div class="table-responsive mb-0" wire:key=" boomboom ">
          <table class="table table-bordered mb-0">
            <tbody>
              <tr style="height: 50px;" class="bg-light-rm border-bottom bg-danger-rm">
                <td class="w-50 p-0 pt-2 bg-success-rm text-white-rm p-0 o-heading border-0">
                  <span class="ml-4 d-inline-block mt-2 mb-3">
                    Subtotal
                  </span>
                </td>
                <td class="p-0 h-100 bg-warning-rm o-heading pl-3 pt-2 border-0">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $sub_total, 2 ); @endphp
                </td>
              </tr>
              {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
              @foreach ($expenseAdditions as $key => $val)
                {{-- Todo: Wont there be any other taxes other than vat? --}}
                @if (strtolower($key) != 'vat')
                  @continue
                @else
                <tr style="height: 50px;" class="bg-info-rm border-bottom p-0">
                  <td class="w-50 h-100 p-0 o-heading border-0 bg-success-rm">
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
                        style="outline: none;"
                        wire:keydown.enter="updateNumbers"
                        wire:model.live.debounce.500ms="expenseAdditions.{{ $key }}" />
                  </td>
                </tr>
                @endif
              @endforeach
              <tr class="bg-light border-bottom">
                <td class="w-50 p-0 pt-2 bg-info-rm o-heading border-0">
                  <span class="ml-4 d-inline-block">
                    Total
                  </span>
                </td>
                <td class="p-0 h-100 bg-warning-rm text-primary o-heading pl-3 border-0">
                  {{ config('app.transaction_currency_symbol') }}
                  @php echo number_format( $grand_total, 2 ); @endphp
                </td>
              </tr>
              <tr style="height: 50px;" class="bg-light-rm border-bottom">
                <td class="w-50 p-0 pt-2 bg-success-rm text-white-rm p-0 o-heading border-0">
                  <span class="ml-4 d-inline-block mt-2 mb-3">
                    Paid Amount
                  </span>
                  (
                  {{ config('app.transaction_currency_symbol') }}
                  )
                  @error('tender_amount')
                  <div>
                    <span class="text-danger">{{ $message }}</span>
                  </div>
                  @enderror
                </td>
                <td class="p-0 h-100 o-heading border-0">
                  <input class="w-100 h-100 o-heading border-0 pl-3"
                      type="text"
                      style="background-color: #afa; outline: none;"
                      wire:model="tender_amount" />
                </td>
              </tr>

              <tr style="height: 50px;" class="bg-light border-bottom">
                <td class="w-50 p-0 pt-2 bg-info-rm o-heading border-0">
                  <span class="ml-4">
                    Payment type
                  </span>
                </td>
                <td class="p-0 h-100 w-50 o-heading border-0">
                  <select class="w-100 h-100 custom-control border-0"
                      style="outline: none;"
                      wire:model="expense_payment_type_id">
                    <option>---</option>
                    @foreach ($expensePaymentTypes as $expensePaymentType)
                      <option value="{{ $expensePaymentType->expense_payment_type_id }}"
                          wire:key="{{ $expensePaymentType->expense_payment_type_id }}">
                        {{ $expensePaymentType->name }}
                      </option>
                    @endforeach
                  </select>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      @else
        <div class="table-responsive mb-0" wire:key="{{ rand() }}">
          <table class="table table-bordered mb-0">
            <tbody>
              @foreach ($multiPayments as $key => $val)
                <tr style="height: 50px;" wire:key="{{ $key }}">
                  <td class="w-50 p-0 bg-info-rm p-0 o-heading">
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
                <td class="w-50 p-0 bg-info-rm p-0 o-heading border-0">
                  <span class="ml-4">
                    Tender amount
                  </span>
                </td>
                <td class="border-0">
                  {{ $tender_amount }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </div>
</div>
