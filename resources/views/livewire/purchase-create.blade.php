<div>

  <div class="d-flex mb-0 p-2 justify-content-end bg-light-rm border" style="background-color: #eee;">
    <button class="btn btn-danger border rounded-circle" wire:click="$emit('exitPurchaseCreate')">
      <i class="fas fa-times fa-2x-rm"></i>
    </button>
  </div>

  @if (true)
    @if (true || $modes['addItem'])
      @livewire ('purchase-add-item', ['purchase' => $purchase,])
    @endif
  @endif

  <div class="row">

    <div class="col-md-7">
      <div class="card mb-0">
        <div class="card-header bg-success-rm text-white-rm">
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
            <tr class="bg-success-rm text-white-rm" style="font-size: 1.3rem;{{-- background-color: orange;--}}">
              <th>--</th>
              <th>#</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Price per unit</th>
              <th>Amount</th>
            </tr>
          </thead>
  
          <tbody class="bg-white" style="font-size: 1.3rem;">
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
          @livewire ('purchase-make-payment', ['purchase' => $purchase,])
        @endif
      </div>
    </div>

  </div>

</div>
