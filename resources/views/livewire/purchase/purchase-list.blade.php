<div>

  @if (false)
  {{-- TODO: Top toolbar of purchase list has to be implemented --}} 
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

      @include ('partials.dashboard.spinner-button')

      <div class="d-flex justify-content-end flex-grow-1">
        <div class="pl-2 font-weight-bold pr-3 py-2">
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
  @endif

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

    @include ('partials.dashboard.spinner-button')

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

  <x-list-component>
    <x-slot name="listInfo">
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell">ID</th>
      <th class="d-none d-md-table-cell" style="width: 100px;">Date</th>
      <th class="d-none d-md-table-cell">Vendor</th>
      <th class="d-none d-md-table-cell">Items</th>
      <th class="d-none d-md-table-cell" style="width: 200px;">Payment Status</th>
      <th class="d-none d-md-table-cell"> Pending</th>
      <th class="d-none d-md-table-cell">Amount</th>
      <th class="d-none d-md-table-cell text-right">Action</th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($purchases as $purchase)
        {{-- Show in bigger screens --}} 
        <tr class="d-none d-md-table-row" wire:key="{{ rand() }}">
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
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayPurchase', { purchaseId: {{ $purchase->purchase_id }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayPurchase', { purchaseId: {{ $purchase->purchase_id }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
          </td>
        </tr>

        {{-- Show in mobile screens --}}
        <tr class="d-md-none" wire:key="{{ rand() }}">
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
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $purchases->links() }}
    </x-slot>
  </x-list-component>

  @if ($modes['confirmDeletePurchase'])
    @livewire ('purchase-list-purchase-delete-confirm', ['purchase' => $deletingPurchase,])
  @endif

</div>
