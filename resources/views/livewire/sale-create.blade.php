<x-box-create title="Create sale">

  <div class="row border mb-3 p-2 bg-light">

    <div class="col-md-2">
      <h3 class="d-inline h5">Bill no:</h3>
      @if ($lockState)
        {{ $createdSaleInvoice->sale_invoice_id }}
      @endif
    </div>

    <div class="col-md-2">
      <h3 class="d-inline h5">Date:</h3>
      2022-01-01
    </div>

    <div class="col-md-6">
      @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show col-md-4 mx-3 my-2" role="alert">
          {{ session('message') }}
          <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
    </div>

    <div class="col-md-2 float-right">
      <button class="btn mr-3 text-primary">
        <i class="fas fa-print"></i>
        <br>
        Print
      </button>
    </div>

  </div>

  <div class="row mb-3">

    {{-- Customer section --}} 
    <div class="col-md-3 p-3 bg-light border">
      <div class="">
        <label class="" style="width: 100px;">Name</label>
        <input type="text" class="" wire:model.defer="c_name">
        @error('c_name') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="">
        <label class="" style="width: 100px;">VAT num</label>
        <input type="text" class="" wire:model.defer="c_vat_num">
        @error('c_vat_num') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="">
        <label class="" style="width: 100px;">Phone</label>
        <input type="text" class="" wire:model.defer="c_phone" wire:keydown.enter="getCustomerInfo" />
        @error('c_phone') <span class="text-danger">{{ $message }}</span> @enderror
      </div>

      <div class="">
        <label class="" style="width: 100px;">Address</label>
        <input type="text" class="" wire:model.defer="c_address" />
        @error('c_address') <span class="text-danger">{{ $message }}</span> @enderror
      </div>
    </div>


    {{-- Product add section --}} 
    <div class="col-md-9 p-3 bg-light border">
      <label class="">Product code</label>
      <input type="text" class="" style="width: 100%; bg-color: #abc;" wire:model.defer="" />
    </div>
  </div>



  <div class="row bg-light border py-2 mb-3">
    <div class="col-md-9 bg-warning-rm">
      <!-- Sale items -->
      <h4>Items</h4>

      <!-- Toolbar -->
      <div class="bg-alert" style="background-color: #eee; margin-bottom: 10px; padding: 5px; font-size: 10px; width: 25%;">
        <button class="btn btn-sm" wire:click="addRow">
          <i class="fas fa-plus"></i>
          Item
        </button>
        <button class="btn btn-sm" wire:click="clearSheet">
          <i class="fas fa-eraser"></i>
          Clear
        </button>
      </div>


      <div class="table-responsive" style="overflow: auto;">
        <table class="table" style="">
          <thead>
            <tr class="border p-1">
              <th class="border p-2">SN</th>
              <th class="border p-2">Item</th>
              <th class="border p-2">Price</th>
              <th class="border p-2">Qty</th>
              <th class="border p-2">Amount</th>
        
              <th class="border p-2">---</th>
            </tr>
          </thead>

          <tbody>
	          <!-- Our way: Use 2D Array -->
            @for ($i=0; $i < $totalNumOfRows; $i++)
              <tr class="m-0 p-0" style="">
                <td class="m-0 p-1 border">
                  {{ $i + 1 }}
                </td>
                <td class="m-0 p-1 border">
                  <div class="form-group m-0 p-0">
                    <select class="form-control" wire:model.defer="saleItems.{{ $i }}.product_id" wire:change="updateItemPrice({{ $i }})">

                      <option>---</option>

                      @foreach ($products as $product)
                        <option value="{{ $product->product_id }}">{{ $product->name }}</option>
                      @endforeach

                    </select>
                  </div>
                </td>
                <td class="m-0 p-0 border">
                  <input readonly type="text" class="border-0" wire:model.defer="saleItems.{{ $i }}.price" />
                </td>
                <td class="m-0 p-0 border">
                  <input type="text" class="border-0" wire:model.defer="saleItems.{{ $i }}.qty" wire:keydown.tab.prevent="setItemTotal({{ $i }})"/>
                </td>
                <td class="m-0 p-0 border">
                  <input readonly type="text" class="border-0" wire:model.defer="saleItems.{{ $i }}.amount" />
                </td>
                <td class="m-0 p-0 px-2 border">
                    <i class="fas fa-trash text-danger" wire:click="removeRow({{ $i }})"></i>
                </td>
              </tr>
            @endfor
            <tr>
              <th colspan="4" class="border py-2">
                Total
              </th>
              <td colspan="2" class="border py-2 font-weight-bold">
                {{  $total }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-3">

    </div>
  </div>

  <div class="row py-2 border">
    <div class="col-md-3">
      <h3>Payment</h3>

      <div class="table-responsive" style="overflow: auto;">
        <table class="table" style="">
          <tbody>
            <tr class="m-0 p-0" style="">
              <th class="m-0 p-1 border">
                Cash
              </th>
              <td class="m-0 p-1 border">
                <input type="text" class="border-0" wire:model.defer="cashGiven" style="width: 100% !important;" />
              </td>
            </tr>
            <tr class="m-0 p-0" style="">
              <th class="m-0 p-1 border">
                Return
              </th>
              <td class="m-0 p-1 border">
                <input type="text" class="border-0" wire:model.defer="cashReturn" style="width: 100% !important;" />
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>




  <div class="mt-3 p-2">
    @if ( ! $lockState)
      <button type="submit" class="btn btn-primary" wire:click="store">Submit</button>
      <button type="submit" class="btn btn-danger" wire:click="$emit('exitCreateMode')">Cancel</button>
    @else
      <button type="submit" class="btn btn-primary" wire:click="clearModes">Finish</button>
    @endif
  </div>

</x-box-create>
