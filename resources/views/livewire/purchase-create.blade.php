<div>

  @if (true)
    @if (true || $modes['addItem'])
      @livewire ('purchase-add-item', ['purchase' => $purchase,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-7">
      <div class="card mb-0">
        <div class="card-header bg-success text-white">
          <h1 class="d-inline" style="font-size: 2rem;">
            Purchase ID:
            {{ $purchase->purchase_id }}
          </h2>

          <div class="d-inline">
            <button wire:loading class="btn">
              <span class="spinner-border text-white mr-3" role="status" style="font-size: 1rem;">
              </span>
            </button>
          </div>
        </div>
      
        <div class="card-body p-0">
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-bordered table-hover border-dark">
          <thead>
            <tr class="bg-success text-white" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
              <th>--</th>
              <th>#</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Price per unit</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody style="font-size: 1.3rem;">
            @if (count($purchase->purchaseItems) > 0)
              @foreach ($purchase->purchaseItems as $item)
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
                  <span class="badge badge-pill-rm badge-success">
                    {{ $item->quantity }}
                  </span>
                </td>
                <td>
                  {{ $item->unit }}
                </td>
                <td>
                  @php echo number_format( $item->purchase_price_per_unit ); @endphp
                </td>
                <td>
                  @php echo number_format( $item->getTotalAmount() ); @endphp
                </td>
              </tr>
              @endforeach
            @endif
          </tbody>
  
          <tfoot class="bg-success-rm text-white-rm" {{-- style="background-image: linear-gradient(to right, white, #abc);" --}}>
            <td colspan="6" style="font-size: 1.5rem;" class="font-weight-bold text-right">
              <strong>
              TOTAL
              </strong>
            </td>
            <td style="font-size: 1.5rem;">
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
            </td>
          </tfoot>
  
        </table>
      </div>

    </div>
  
    <div class="col-md-5">
      <div>




@if (! $modes['paid'])
<div class="card shadow">
  <div class="card-header bg-success text-white">
    <h1 class="" style="font-size: 1.5rem;">
      Payment
    </h1>
  </div>
  <div class="card-body p-0">

    <div class="table-responsive mb-0">
      <table class="table table-bordered mb-0">
        <tbody>


          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                TOTAL
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold pl-3 pt-2">
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                GRAND TOTAL
              </span>
            </td>
            <td class="p-0 h-100 bg-warning font-weight-bold pl-3 pt-2">
              @php echo number_format( $purchase->getTotalAmount() ); @endphp
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
            <td class="w-50 p-0 bg-info-rm p-0 font-weight-bold">
              <span class="ml-4">
                Paid Amount
              </span>
              @error('paid_amount')
              <div>
                <span class="text-danger">{{ $message }}</span>
              </div>
              @enderror
            </td>
            <td class="p-0 h-100 font-weight-bold">
              <input class="w-100 h-100 font-weight-bold" type="text" wire:model.defer="paid_amount" />
            </td>
          </tr>

          <tr style="font-size: 1.3rem; height: 50px;" class="bg-light">
            <td class="w-50 p-0 bg-info-rm font-weight-bold">
              <span class="ml-4">
                Payment type
              </span>
            </td>
            <td class="p-0 h-100 w-50 bg-warning font-weight-bold">
              <select class="w-100 h-100 custom-control border-0"
                  wire:model.defer="purchase_payment_type_id">
                <option>---</option>

                @foreach ($purchasePaymentTypes as $purchasePaymentType)
                  <option value="{{ $purchasePaymentType->purchase_payment_type_id }}">
                    {{ $purchasePaymentType->name }}
                  </option>
                @endforeach
              </select>
            </td>
          </tr>



        </tbody>
      </table>
    </div>

    <div class="p-3 m-0" {{--style="background-image: linear-gradient(to right, white, #abc);"--}}>
      <button
          onclick="this.disabled=true;"
          class="btn btn-lg btn-success mr-3"
          wire:click="savePayment"
          style="width: 130px; height: 70px; font-size: 1.3rem;">
        CONFIRM
      </button>
    </div>
  </div>
</div>
@endif



      </div>
    </div>

  </div>

</div>
