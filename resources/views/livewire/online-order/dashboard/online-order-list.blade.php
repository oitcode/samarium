<div>

  <x-list-component>
    <x-slot name="listInfo">
      <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
        <div class="pt-2">
          <div class="d-flex">
            <div class="mr-4 font-weight-bold">
              Total : {{ count($websiteOrders) }}
            </div>
          </div>
        </div>
        <div class="font-weight-bold h6 d-flex">
          <div class="d-flex">
            <div class="d-flex flex-column justify-content-center mr-3 o-heading">
              <i class="fas fa-funnel mr-1"></i>
              Filter
            </div>
            <div class="dropdown">
              <button class="btn
                  @if ($modes['showOnlyNewMode'])
                    btn-danger
                  @elseif ($modes['showOnlyOpenMode'])
                    btn-warning
                  @elseif ($modes['showOnlyRejectedMode'])
                    btn-secondary
                  @elseif ($modes['showOnlyDeliveredMode'])
                    btn-success
                  @elseif ($modes['showAllMode'])
                    btn-dark border
                  @endif
                  dropdown-toggle"
                  type="button" id="dropdownMenuButtonToolbar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if ($modes['showOnlyNewMode'])
                  New
                @elseif ($modes['showOnlyOpenMode'])
                  Open
                @elseif ($modes['showOnlyRejectedMode'])
                  Rejected
                @elseif ($modes['showOnlyDeliveredMode'])
                  Delivered
                @elseif ($modes['showAllMode'])
                  All
                @else
                  Whoops
                @endif
              </button>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButtonToolbar">
                <button class="dropdown-item" wire:click="enterMode('showOnlyNewMode')">
                  New
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyOpenMode')">
                  Open
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyDeliveredMode')">
                  Delivered
                </button>
                <button class="dropdown-item" wire:click="enterMode('showOnlyRejectedMode')">
                  Rejected
                </button>
                <button class="dropdown-item" wire:click="enterMode('showAllMode')">
                  All
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </x-slot>

    <x-slot name="listHeadingRow">
      <th class="d-none d-md-table-cell" style="width: 120px;">
        Order ID
      </th>
      <th class="d-none d-md-table-cell" style="width: 200px;">
        Date
      </th>
      <th class="d-none d-md-table-cell" style="width: 200px;">
        Time
      </th>
      <th class="d-none d-md-table-cell" style="width: 200px;">
        Phone
      </th>
      <th class="d-none d-md-table-cell" style="width: 200px;">
        Address
      </th>
      <th class="d-none d-md-table-cell" style="width: 200px;">
        Total
      </th>
      <th class="d-none d-md-table-cell">
        Status
      </th>
      <th class="d-none d-md-table-cell text-right">
        Action
      </th>
    </x-slot>

    <x-slot name="listBody">
      @foreach ($websiteOrders as $order)
        {{-- Show in bigger screens --}}
        <tr class="d-none d-md-table-row">
          <td>
            {{ $order->website_order_id }}
          </td>
          <td>
            @if ($order->created_at->isToday())
              <span class="text-success" style="font-weight: bold;">
                Today
              </span>
            @else
              {{ $order->created_at->toDateString() }}
            @endif
          </td>
          <td>
            {{ $order->created_at->format('g:i A') }}
          </td>
          <td class="pl-3">
            {{ $order->phone }}
          </td>
          <td>
            {{ \Illuminate\Support\Str::limit($order->address, 15, $end=' ...') }}
          </td>
          <td class="font-weight-bold">
            Rs
            @php echo number_format( $order->getTotalAmount() ); @endphp
          </td>
          <td>
            @if ($order->status == 'new')
              <span class="badge badge-pill badge-danger">
                {{ $order->status }}
              </span>
            @elseif ($order->status == 'open')
              <span class="badge badge-pill badge-warning" style="background-color: orange;">
                {{ $order->status }}
              </span>
            @elseif ($order->status == 'rejected')
              <span class="badge badge-pill badge-secondary">
                {{ $order->status }}
              </span>
            @elseif ($order->status == 'delivered')
              <span class="badge badge-pill badge-success">
                {{ $order->status }}
              </span>
            @else
              <span class="badge">
                {{ $order->status }}
              </span>
            @endif
          </td>
          <td class="text-right">
            <button class="btn btn-primary px-2 py-1" wire:click="$dispatch('displayOnlineOrder', { onlineOrderId: {{ $order->website_order_id }} })">
              <i class="fas fa-pencil-alt"></i>
            </button>
            <button class="btn btn-success px-2 py-1" wire:click="$dispatch('displayOnlineOrder', { onlineOrderId: {{ $order->website_order_id }} })">
              <i class="fas fa-eye"></i>
            </button>
            <button class="btn btn-danger px-2 py-1" wire:click="">
              <i class="fas fa-trash"></i>
            </button>
        </tr>

        {{-- Show in smaller screens --}}
        <tr class="d-md-none" role="button" wire:click="$dispatch('displayOnlineOrder', { onlineOrderId: {{ $order->website_order_id }} })">
          <td>
            {{ $order->website_order_id }}
            <div>
              @if ($order->created_at->isToday())
                <i class="fas fa-star mr-3 text-primary"></i>
                <span class="text-primary" style="font-weight: bold;">
                  Today
                </span>
              @else
                {{ $order->created_at->toDateString() }}
              @endif
            <div>
          </td>
          <td>
          </td>
          <td class="pl-3">
            {{ $order->phone }}
            <div>
              {{ \Illuminate\Support\Str::limit($order->address, 15, $end=' ...') }}
            <div>
          </td>
          <td>
            Rs
            @php echo number_format( $order->getTotalAmount() ); @endphp
          </td>
          <td>
            @if ($order->status == 'new')
              <span class="badge badge-pill badge-danger">
                {{ $order->status }}
              </span>
            @elseif ($order->status == 'open')
              <span class="badge badge-pill badge-warning" style="background-color: orange;">
                {{ $order->status }}
              </span>
            @elseif ($order->status == 'rejected')
              <span class="badge badge-pill badge-secondary">
                {{ $order->status }}
              </span>
            @elseif ($order->status == 'delivered')
              <span class="badge badge-pill badge-success">
                {{ $order->status }}
              </span>
            @else
              <span class="badge">
                {{ $order->status }}
              </span>
            @endif
          </td>
        </tr>
      @endforeach
    </x-slot>

    <x-slot name="listPaginationLinks">
      {{ $websiteOrders->links() }}
    </x-slot>
  </x-list-component>

</div>
