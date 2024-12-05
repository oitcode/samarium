<div class="card" style="background-color: #efe;">
  <div class="card-header bg-success text-white" style="">
    <div class="d-flex justify-content-between py-1-rm">
      <div class="d-flex flex-column justify-content-center">
        <h2>
          Amount
        </h1>
      </div>
      <div>
        <div wire:loading class="">
          <span class="spinner-border text-white" role="status">
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body p-0">

    <div class="table-responsive mb-0">
      <table class="table table-bordered-rm mb-0 bg-danger-rm">
        <tbody>


          <tr style="height: 60px;" class="bg-light border-bottom">
            <td class="w-50 p-0 h-100 bg-info-rm font-weight-bold border-0">
              <div class="h-100 d-flex flex-column justify-content-center">
                <span class="ml-4 font-weight-bold">
                  @if ($has_vat)
                    Subtotal
                  @else
                    Total
                  @endif
                </span>
              </div>
            </td>
            <td class="p-0 h-100 bg-warning-rm font-weight-bold pl-3 pt-0 border-0">
              <input class="w-100 h-100 font-weight-bold border-0 pl-3"
                  type="text"
                  style="background-color: #afa; outline: none;"
                  wire:model.live="sub_total"
                  wire:change="updateNumbers" />
            </td>
          </tr>

          {{-- Deal with non-taxes additions first --}}
          @foreach ($expenseAdditions as $key => $val)

          @if (strtolower($key) == 'vat')
            @continue
          @else
          <tr style="height: 50px;" class="bg-light border-0">
            <td class="w-50 p-0 bg-info-rm p-0 pt-2 font-weight-bold border-bottom">
              {{-- Hard code for discount . Temp. Todo permanent design/fix --}} 
              @if (strtolower($key) == 'discount')
                <div class="ml-4">
                  {{ $key }}
                  <select
                      class="bg-white border border-secondary badge-pill"
                      wire:model.live="discount_percentage"
                      wire:change="calculateDiscount">
                    <option value="--">--</option>
                    <option value="5">5 %</option>
                    <option value="10">10 %</option>
                    <option value="15">15 %</option>
                    <option value="20">20 %</option>
                    <option value="25">25 %</option>
                    <option value="50">50 %</option>
                  </select>
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
            <td class="p-0 h-100 font-weight-bold border-bottom">
              @if (strtolower($key) == 'vat')
                {{ $val }}
              @else
                <input class="w-100 h-100 font-weight-bold pl-3 border-0"
                    type="text" wire:model.live.debounce.500ms="saleInvoiceAdditions.{{ $key }}" 
                    wire:keydown.enter="updateNumbers" wire:change="updateNumbers" />
              @endif
            </td>
          </tr>
          @endif
          @endforeach

          {{-- Todo: Only vat? Any other taxes? --}}
          @if ($has_vat)
          <tr class="bg-light border-bottom">
            <td class="w-50 p-0 bg-info-rm font-weight-bold border-0">
              <div class="h-100 d-flex flex-column justify-content-center">
                <span class="ml-4 d-inline-block">
                  Taxable amount
                </span>
              </div>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-4 pt-2 border-0">
              @php echo number_format( $this->taxable_amount ); @endphp
            </td>
          </tr>
          @endif


          {{-- Deal with taxes (VAT, etc) additions now/next/atLast --}}
          @foreach ($expenseAdditions as $key => $val)

            {{-- Todo: Wont there be any other taxes other than vat? --}}
            @if (strtolower($key) != 'vat')
              @continue
            @else
            <tr style="height: 50px;" class="bg-info-rm border-bottom p-0">
              <td class="w-50 h-100 p-0 font-weight-bold border-0 bg-success-rm">
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
              <td class="p-0 w-50 h-100 bg-info font-weight-bold border-0">
                <input class="w-100 h-100 font-weight-bold border-0 pl-4"
                    type="text"
                    style="background-color: #afa; outline: none;"
                    wire:keydown.enter="updateNumbers"
                    wire:model.live.debounce.500ms="expenseAdditions.{{ $key }}" />
              </td>
            </tr>
            @endif
          @endforeach

          @if ($has_vat)
          <tr class="bg-light border-bottom">
            <td class="w-50 p-0 pt-2 bg-info-rm font-weight-bold border-0">
              <span class="ml-4 d-inline-block">
                Total
              </span>
            </td>
            <td class="p-0 h-100 bg-warning-rm text-primary font-weight-bold pl-3 border-0">
              @php echo number_format( $this->grand_total ); @endphp
            </td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>

  </div>
</div>
