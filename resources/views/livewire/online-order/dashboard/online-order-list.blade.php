<div>


  {{-- Filter div --}}
  @if (true)
  <div class="mb-1 p-3 bg-white border d-flex justify-content-between">
    <div class="font-weight-bold h6 d-flex">
      <div class="d-flex">
        @if (true)
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
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonToolbar">
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
        @endif
      </div>
    </div>


    <div class="pt-2">
      <div class="d-flex">
        <div class="mr-4 font-weight-bold">
          Total : {{ count($websiteOrders) }}
        </div>
      </div>
    </div>
  </div>
  @endif

  <div class="row">
    <div class="col-md-12">
      @if ($websiteOrders != null && count($websiteOrders) > 0)

      {{-- Show in bigger screens --}}
      <div class="table-responsive mb-3 d-none d-md-block">
        <table class="table table-hover border">
          <thead>
            <tr class="bg-white text-dark">
              <th class="o-heading" style="width: 120px;">
                Order ID
              </th>
              <th class="o-heading" style="width: 200px;">
                Date
              </th>
              <th class="o-heading" style="width: 200px;">
                Time
              </th>
              <th class="o-heading" style="width: 200px;">
                Phone
              </th>
              <th class="o-heading" style="width: 200px;">
                Address
              </th>
              <th class="o-heading" style="width: 200px;">
                Total
              </th>
              <th class="o-heading">
                Status
              </th>
              <th class="o-heading text-right">
                Action
              </th>
            </tr>
          </thead>

          <tbody class="bg-white">
            @foreach ($websiteOrders as $order)
              <tr style="" role="button" wire:click="$dispatch('displayOnlineOrder', { onlineOrderId: {{ $order->website_order_id }} })">
                <td>
                  {{ $order->website_order_id }}
                </td>
                <td class="" style="">
                  @if ($order->created_at->isToday())
                    <span class="text-success" style="font-weight: bold;">
                      Today
                    </span>
                  @else
                    {{ $order->created_at->toDateString() }}
                  @endif
                </td>
                <td class="" style="">
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
        </table>
      </div>

      {{-- Show in smaller screens --}}
      <div class="table-responsive mb-3 d-md-none">
        <table class="table table-hover border">
          <tbody class="bg-white">
            @foreach ($websiteOrders as $order)
              <tr role="button" wire:click="$dispatch('displayOnlineOrder', { onlineOrderId: {{ $order->website_order_id }} })">
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
                <td class="">
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
          </tbody>
        </table>
      </div>

      <div>
        {{ $websiteOrders->links() }}
      </div>

      @else
        <div class="text-secondary pl-2">
          No online orders.
        </div>
      @endif
    </div>

    <div class="col-md-2">
    </div>
  </div>


</div>
