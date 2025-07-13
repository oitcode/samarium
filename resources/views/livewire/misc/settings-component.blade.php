<div>

  <div class="h4 o-heading py-3 pt-4">
    Settings
  </div>

  <div class="mb-3 py-3 px-3 bg-white border o-linear-gradient o-border-radius">
    <h1 class="h5 o-heading o-linear-gradient-text-color pt-2">
      <i class="fas fa-exclamation-circle mr-1"></i>
      Caution
    </h1>
    <div class="">
      Please be careful while making settings changes.
    </div>
  </div>

  <div>
    <div class="row" style="margin: auto;">
      <div class="col-md-12 p-0">
        {{-- Sales settings --}}
        @if (has_module('shop'))
        <div class="bg-white p-2 mb-3 shadow-sm border rounded-lg">
          <h2 class="h5 o-heading mt-2">Sale invoice</h2>
          <hr />
          {{-- Sale invoice payment types --}}
          <div class="mb-4">
            <h3 class="h6 o-heading">Sale invoice payment types</h3>
            <div>
              @foreach ($saleInvoicePaymentTypes as $saleInvoicePaymentType)
                <span class="badge badge-light badge-pill border p-2 mr-2">
                  {{ $saleInvoicePaymentType->name }}
                </span>
              @endforeach
              <button class="btn btn-light" wire:click="enterMultiMode('createSaleInvoicePaymentType')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            {{-- Cretae saleInvoicePaymentType --}}
            @if ($multiModes['createSaleInvoicePaymentType'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model="new_sale_invoice_payment_type_name">
                  @error('new_sale_invoice_payment_type_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mt-4">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeSaleInvoicePaymentType">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createSaleInvoicePaymentType')">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>

          {{-- Sale invoice additions --}}
          <div class="mb-4">
            <h3 class="h6 o-heading">Sale invoice additions</h3>
            <div>
              @foreach ($saleInvoiceAdditionHeadings as $saleInvoiceAdditionHeading)
                <span class="badge badge-light badge-pill border p-2 mr-2">
                  @if (strtolower($saleInvoiceAdditionHeading->effect) == 'plus')
                    <i class="fas fa-plus mr-2"></i>
                  @elseif (strtolower($saleInvoiceAdditionHeading->effect) == 'minus')
                    <i class="fas fa-minus mr-2"></i>
                  @endif
                  {{ $saleInvoiceAdditionHeading->name }}
                </span>
              @endforeach
              <button class="btn btn-light" wire:click="enterMultiMode('createSaleInvoiceAdditionHeading')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            @if ($multiModes['createSaleInvoiceAdditionHeading'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model="new_sale_invoice_addition_heading_name">
                  @error('new_sale_invoice_addition_heading_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Effect</label>
                  <select class="custom-select" wire:model="new_sale_invoice_addition_heading_effect">
                    <option>---</option>
                      <option value="plus">Plus</option>
                      <option value="minus">Minus</option>
                  </select>
                  @error ('new_sale_invoice_addition_heading_effect')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="mt-4">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeSaleInvoiceAdditionHeading">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createSaleInvoiceAdditionHeading')">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>

        {{-- Purchase payment types --}}
        <div class="bg-white p-2 mb-3 border shadow-sm rounded-lg">
          <div class="mb-4">
            <h2 class="h5 o-heading">Purchase</h2>
            <hr />
            <h3 class="h6 o-heading">Purchase payment types</h3>
            <div>
              @foreach ($purchasePaymentTypes as $purchasePaymentType)
                <span class="badge badge-light badge-pill border p-2 mr-2">
                  {{ $purchasePaymentType->name }}
                </span>
              @endforeach
              <button class="btn btn-light" wire:click="enterMultiMode('createPurchasePaymentType')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            {{-- Cretae purchaseInvoicePaymentType --}}
            @if ($multiModes['createPurchasePaymentType'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model="new_purchase_payment_type_name">
                  @error ('new_purchase_payment_type_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mt-4">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storePurchasePaymentType">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger" wire:click="exitMultiMode('createPurchasePaymentType')">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>

          {{-- Purchase additions --}}
          <div class="mb-4">
            <h3 class="h6 o-heading">Purchase additions</h3>
            <div>
              @foreach ($purchaseAdditionHeadings as $purchaseAdditionHeading)
                <span class="badge badge-light badge-pill border p-2 mr-2">
                  @if (strtolower($purchaseAdditionHeading->effect) == 'plus')
                    <i class="fas fa-plus mr-2"></i>
                  @elseif (strtolower($purchaseAdditionHeading->effect) == 'minus')
                    <i class="fas fa-minus mr-2"></i>
                  @endif
                  {{ $purchaseAdditionHeading->name }}
                </span>
              @endforeach
              <button class="btn btn-light" wire:click="enterMultiMode('createPurchaseAdditionHeading')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            @if ($multiModes['createPurchaseAdditionHeading'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model="new_purchase_addition_heading_name">
                  @error('new_purchase_addition_heading_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Effect</label>
                  <select class="custom-select" wire:model="new_purchase_addition_heading_effect">
                    <option>---</option>
                      <option value="plus">Plus</option>
                      <option value="minus">Minus</option>
                  </select>
                  @error ('new_purchase_addition_heading_effect')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mt-4">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storePurchaseAdditionHeading">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createPurchaseAdditionHeading')">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>

        {{-- Expense payment types --}}
        <div class="bg-white p-2 mb-3 border shadow-sm rounded-lg">
          <div class="mb-4">
            <h2 class="h5 o-heading">Expense</h2>
            <hr />
            <h3 class="h6 o-heading">Expense payment types</h3>
            <div>
              @foreach ($expensePaymentTypes as $expensePaymentType)
                <span class="badge badge-light badge-pill border p-2 mr-2">
                  {{ $expensePaymentType->name }}
                </span>
              @endforeach
              <button class="btn btn-light" wire:click="enterMultiMode('createExpensePaymentType')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            {{-- Cretae expensePaymentType --}}
            @if ($multiModes['createExpensePaymentType'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model="new_expense_payment_type_name">
                  @error('new_expense_payment_type_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mt-4">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeExpensePaymentType">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createExpensePaymentType')">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>

          {{-- Expense additions --}}
          <div class="mb-4">
            <h3 class="h6 o-heading">Expense additions</h3>
            <div>
              @foreach ($expenseAdditionHeadings as $expenseAdditionHeading)
                <span class="badge badge-light badge-pill border p-2 mr-2">
                  @if (strtolower($expenseAdditionHeading->effect) == 'plus')
                    <i class="fas fa-plus mr-2"></i>
                  @elseif (strtolower($expenseAdditionHeading->effect) == 'minus')
                    <i class="fas fa-minus mr-2"></i>
                  @endif
                  {{ $expenseAdditionHeading->name }}
                </span>
              @endforeach
              <button class="btn btn-light" wire:click="enterMultiMode('createExpenseAdditionHeading')">
                <i class="fas fa-plus-circle mr-2"></i>
                New
              </button>
            </div>

            @if ($multiModes['createExpenseAdditionHeading'])
              <div class="my-2 p-3 border shadow-sm" style="max-width: 500px;">
                <div class="form-group">
                  <label>Name</label>
                  <input type="text"
                      class="form-control"
                      wire:model="new_expense_addition_heading_name">
                  @error('new_expense_addition_heading_name')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Effect</label>
                  <select class="custom-select" wire:model="new_expense_addition_heading_effect">
                    <option>---</option>
                      <option value="plus">Plus</option>
                      <option value="minus">Minus</option>
                  </select>
                  @error ('new_expense_addition_heading_effect')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="mt-4">
                  <button type="submit"
                      class="btn btn-success"
                      wire:click="storeExpenseAdditionHeading">
                    Submit
                  </button>
                  <button type="submit"
                      class="btn btn-danger"
                      wire:click="exitMultiMode('createExpenseAdditionHeading')">
                    Cancel
                  </button>
                </div>
              </div>
            @endif
          </div>
        </div>

        @if (false)
        {{-- Back date setting --}}
        <div class="bg-white p-2 mb-3 border shadow-sm rounded-lg">
          <h2 class="h5 o-heading">
            Back date entry
          </h2>
          <hr />
          <h2 class="h6">
            Allow back date entry?
          </h2>
          <select>
            <option value="yes">Yes</option>
            <option value="yes">No</option>
          </select>
        </div>
        @endif
        @endif
      </div>
      <div class="col-md-4">
      </div>
      <div class="col-md-2">
      </div>
    </div>
  </div>

  {{-- Site type --}}
  @if (false)
  <div class="bg-white p-2 mb-3 border shadow-sm rounded-lg">
    <h2 class="h5 o-heading">Site type</h2>
    <hr />
    <div class="my-3 px-2">
      <h2 class="h6">
        Site type
      </h2>
      <select>
        <option value="ecomm">E-commerce</option>
        <option value="cms">CMS</option>
      </select>
    </div>
  </div>
  @endif

</div>
