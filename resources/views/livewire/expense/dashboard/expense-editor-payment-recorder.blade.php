<div>

  {{--
  |--------------------------------------------------------------------------
  | Expense Editor Make Payment Livewire Component Blade File
  |--------------------------------------------------------------------------
  |
  | This blade template handles recording of payment information of expense.
  |
  --}}

  <div class="d-flex justify-content-between bg-white">
    <h2 class="h2 o-heading p-3">
      Payment
    </h1>
    <div>
      <div wire:loading>
        <span class="spinner-border text-white" role="status">
        </span>
      </div>
    </div>
    <div class="px-3 mb-2">
      @if ($modes['multiplePayments'])
        <button class="btn btn-sm mr-3 border-secondary" wire:click="exitMultiplePaymentsMode">
          Single payment
        </button>
      @else
        <button class="btn btn-sm mr-3 text-white" wire:click="enterMultiplePaymentsMode">
          <i class="fas fa-ellipsis-h"></i>
        </button>
      @endif
    </div>
  </div>

  <div class="table-responsive bg-white mb-0">
    <table class="table mb-0">
      <tbody>
        <tr>
          <td class="w-50 py-2 px-0 o-heading border-0">
            <span class="ml-4 d-inline-block">
              Total
            </span>
          </td>
          <td class="h-100 py-2 pl-3 o-heading border-0">
            @php echo number_format( $this->grand_total ); @endphp
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <div>
    @if (! $modes['multiplePayments'])
      <div class="table-responsive bg-white mb-0" wire:key="singlePayment">
        <table class="table table-bordered mb-0">
          <tbody>
            <tr style="height: 50px;" class="border-0 bg-white">
              <td class="w-50 p-0 pt-2 p-0 o-heading border-0">
                <span class="ml-4 d-inline-block mt-2 mb-3">
                  Paid Amount
                </span>
                <span class="pl-2">
                  (
                  {{ config('app.transaction_currency_symbol') }}
                  )
                </span>
                @error('tender_amount')
                <div>
                  <span class="text-danger">{{ $message }}</span>
                </div>
                @enderror
              </td>
              <td class="p-0 h-100 o-heading border-0">
                <input class="w-100 h-100 o-heading pl-3" type="text" wire:model="paid_amount" />
              </td>
            </tr>

            <tr style="height: 50px;">
              <td class="w-50 p-0 pt-2 o-heading border-0">
                <span class="ml-4">
                  Payment type
                </span>
              </td>
              <td class="p-0 h-100 w-50 o-heading border-0">
                <select class="w-100 h-100 custom-control border-0 bg-white"
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
      <div class="table-responsive mb-0" wire:key="multiPaymentPaidIndividual">
        <table class="table table-bordered mb-0">
          <tbody>
            @foreach ($multiPayments as $key => $val)
              <tr style="height: 50px;" wire:key="{{ $key }}">
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
      <div class="table-responsive mb-0" wire:key="multiPaymentPaidTotal">
        <table class="table table-bordered mb-0">
          <tbody>
            <tr class="border-0" style="height: 50px;" wire:key="{{ $key }}">
              <td class="w-50 p-0 p-0 o-heading border-0">
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

  <div class="p-0 m-0">
    @if (! $modes['paid'])
      <button onclick="this.disabled=true;" class="btn btn-block btn-success w-100 py-3" wire:click="store">
        <i class="fas fa-check-circle mr-3"></i>
        Confirm
      </button>
    @else
      <button onclick="this.disabled=true;" class="btn btn-block btn-lg btn-success" wire:click="finishPayment">
        FINISH
      </button>
      <button onclick="this.disabled=true;" class="btn btn-block btn-lg btn-primary" wire:click="finishPayment">
        PRINT
      </button>
    @endif
  </div>

</div>
