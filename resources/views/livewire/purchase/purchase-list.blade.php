<div>


  <div class="mt-1 mb-1 py-2 text-secondary d-none d-md-block bg-white">

    <div class="d-flex">
      <div class="mt-0 text-secondary mr-3">
        <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setPreviousDay">
          <i class="fas fa-arrow-left"></i>
        </button>
        <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setNextDay">
          <i class="fas fa-arrow-right"></i>
        </button>
      </div>
      <div>
        <input type="date" wire:model="startDate" class="mr-3" />
        <input type="date" wire:model="endDate" class="mr-3" />

        <button class="btn {{ config('app.oc_ascent_btn_color') }} mr-3" wire:click="getPurchasesForDateRange">
          Go
        </button>
      </div>

      <button wire:loading class="btn">
        <div class="spinner-border text-info mr-3" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </button>
      <div class="d-flex justify-content-end flex-grow-1">
        <div class="pl-2 font-weight-bold pr-3 border-rm py-2 bg-white-rm">
          <span class="text-dark">
          Rs
          @if (is_numeric($total) && ctype_digit((string) $total))
            @php echo number_format( $total ); @endphp
          @else
            @php echo number_format( $total, 2 ); @endphp
          @endif
          </span>
        </div>
      </div>
    </div>
  </div>

  {{-- Show in smaller screens --}}
  <div class="mt-2 mb-3 text-secondary d-md-none">

    <div class="mt-0 text-secondary mr-3">
      <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setPreviousDay">
        <i class="fas fa-arrow-left"></i>
      </button>
      <button class="btn {{ config('app.oc_ascent_btn_color') }}" wire:click="setNextDay">
        <i class="fas fa-arrow-right"></i>
      </button>
    </div>
    <div>
      <input type="date" wire:model="startDate" class="mr-3" />
      <input type="date" wire:model="endDate" class="mr-3" />

      <button class="btn {{ config('app.oc_ascent_btn_color') }} mr-3" wire:click="getPurchasesForDateRange">
        Go
      </button>
    </div>

    <button wire:loading class="btn">
      <div class="spinner-border text-info mr-3" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </button>
    <div class="d-flex justify-content-start flex-grow-1">
      <div class="pl-2 font-weight-bold pr-3 border py-2 bg-white">
        <span class="text-dark">
        Rs
        @if (is_numeric($total) && ctype_digit((string) $total))
          @php echo number_format( $total ); @endphp
        @else
          @php echo number_format( $total, 2 ); @endphp
        @endif
        </span>
      </div>
    </div>
  </div>

  @if (!is_null($purchases) && count($purchases) > 0)

  {{-- Show in bigger screens --}}
  <div class="table-responsive bg-white d-none d-md-block">
    <table class="table border mb-0">
      <thead>
        <tr class="
            {{ config('app.oc_ascent_bg_color', 'bg-success') }}
            {{ config('app.oc_ascent_text_color', 'text-white') }}
        ">
          <th class="o-heading">ID</th>
          <th class="o-heading" style="width: 100px;">Date</th>
          <th class="o-heading">Vendor</th>
          <th class="o-heading">Items</th>
          <th class="o-heading" style="width: 200px;">Payment Status</th>
          <th class="o-heading"> Pending</th>
          <th class="o-heading">Amount</th>
          <th class="o-heading text-right">Action</th>
        </tr>
      </thead>

      <tbody>
        @foreach ($purchases as $purchase)
          <tr wire:key="{{ rand() }}" wire:click="$dispatch('displayPurchase', { purchaseId: {{ $purchase->purchase_id }} })" role="button">
            <td>
              {{ $purchase->purchase_id }}
            </td>
            <td>
              {{ $purchase->purchase_date }}
            </td>
            <td>
              @if ($purchase->vendor)
                {{ $purchase->vendor->name }}
              @else
              @endif
            </td>
            <td>
              @if ($purchase->purchaseItems)
                @foreach ($purchase->purchaseItems as $purchaseItem )
                  {{ $purchaseItem->product->name }}
                  ,
                @endforeach
              @else
                NONE
              @endif
            </td>
            <td>
              @if ($purchase)
                @if ($purchase->payment_status == 'pending')
                  <span class="badge badge-pill badge-danger">
                    Pending
                  </span>
                @elseif ($purchase->payment_status == 'partially_paid')
                  <span class="badge badge-pill badge-warning">
                    Partial
                  </span>
                @elseif ($purchase->payment_status == 'paid')
                  <span class="badge badge-pill badge-success">
                    Paid
                  </span>
                @else
                  {{ $purchase->payment_status }}
                @endif
              @endif
            </td>
            <td>
              @if (is_int($purchase->getPendingAmount()))
                @php echo number_format( $purchase->getPendingAmount() ); @endphp
              @else
                @php echo number_format( $purchase->getPendingAmount(), 2 ); @endphp
              @endif
            </td>
            <td>
              @if (is_int($purchase->getTotalAmount()))
                @php echo number_format( $purchase->getTotalAmount() ); @endphp
              @else
                @php echo number_format( $purchase->getTotalAmount(), 2 ); @endphp
              @endif
            </td>
            <td class="text-right">
              @if (true)
                <button class="btn btn-primary px-2 py-1" wire:click="">
                  <i class="fas fa-pencil-alt"></i>
                </button>
                <button class="btn btn-success px-2 py-1" wire:click="">
                  <i class="fas fa-eye"></i>
                </button>
                <button class="btn btn-danger px-2 py-1" wire:click="">
                  <i class="fas fa-trash"></i>
                </button>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>

      <tfoot>
        <tr>
          <th colspan="6" class="text-right pl-3">
            Total
          </th>
          <td>
              @php echo number_format($total, 2); @endphp
          </td>
          <td>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>


  {{-- Show in smaller screens --}}
  <div class="table-responsive bg-white d-md-none">
    <table class="table border mb-0">

      <tbody>
        @foreach ($purchases as $purchase)
          <tr wire:key="{{ rand() }}">
            <td>
              {{ $purchase->purchase_id }}
              <div>
                {{ $purchase->created_at->toDateString() }}
              </div>
              <div>
                @if ($purchase->vendor)
                  {{ $purchase->vendor->name }}
                @else
                @endif
              </div>
            </td>
            <td>
              @if ($purchase->purchaseItems)
                @foreach ($purchase->purchaseItems as $purchaseItem )
                  {{ $purchaseItem->product->name }}
                @endforeach
              @else
                NONE
              @endif
            </td>
            <td>
              <span class="font-weight-bold">
              Rs
              @if (is_int($purchase->getTotalAmount()))
                @php echo number_format( $purchase->getTotalAmount() ); @endphp
              @else
                @php echo number_format( $purchase->getTotalAmount(), 2 ); @endphp
              @endif
              </span>
              <div>
                @if ($purchase)
                  @if ($purchase->payment_status == 'pending')
                    <span class="badge badge-pill badge-danger">
                      Pending
                    </span>
                  @elseif ($purchase->payment_status == 'partially_paid')
                    <span class="badge badge-pill badge-warning">
                      Partial
                    </span>
                  @elseif ($purchase->payment_status == 'paid')
                    <span class="badge badge-pill badge-success">
                      Paid
                    </span>
                  @else
                    {{ $purchase->payment_status }}
                  @endif
                @endif
              </div>
            </td>
            <td>
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-cog text-secondary"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <button class="dropdown-item" wire:click="$dispatch('displayPurchase', { purchaseId: {{ $purchase->purchase_id }} })">
                    <i class="fas fa-file text-primary mr-2"></i>
                    View
                  </button>
                  <button class="dropdown-item" wire:click="enterConfirmDeletePurchaseMode({{ $purchase }})">
                    <i class="fas fa-trash text-danger mr-2"></i>
                    Delete
                  </button>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>

    </table>
  </div>
  @else
    <div class="pl-3 text-muted">
      No purchases
    </div>
  @endif

  @if ($modes['confirmDeletePurchase'])
    @livewire ('purchase-list-purchase-delete-confirm', ['purchase' => $deletingPurchase,])
  @endif


</div>
