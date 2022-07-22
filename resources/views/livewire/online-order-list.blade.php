<div>

  <div class="d-flex mb-4 pl-2" style="font-size: 1rem;">
    <div class="mr-4">
      New : {{ $newOrderCount }}
    </div>
    <div class="mr-4">
      Today : {{ $todayOrderCount }}
    </div>
    <div class="mr-4">
      Total : {{ $totalOrderCount }}
    </div>
  </div>

  <div class="row">
    <div class="col-md-10">
      @if ($websiteOrders != null && count($websiteOrders) > 0)

      {{-- Show in bigger screens --}}
      <div class="table-responsive mb-3 d-none d-md-block">
        <table class="table table-bordered-rm table-hover border">
          <thead>
            <tr class="bg-success text-white" style="font-size: 1.1rem;">
              <th style="width: 120px;">
                Order ID
              </th>
              <th style="width: 200px;">
                Date
              </th>
              <th style="width: 200px;">
                Phone
              </th>
              <th style="width: 200px;">
                Address
              </th>
              <th>
                Total
              </th>
              <th>
                Status
              </th>
              @if (false)
              <th>
                Action
              </th>
              @endif
            </tr>
          </thead>

          <tbody class="bg-white">
            @foreach ($websiteOrders as $order)
              <tr style="" role="button" wire:click="$emit('displayOnlineOrder', {{ $order->website_order_id }})">
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
                <td class="pl-3">
                  {{ $order->phone }}
                </td>
                <td class="text-secondary-rm" style="">
                  {{ \Illuminate\Support\Str::limit($order->address, 15, $end=' ...') }}
                </td>
                <td class="text-secondary-rm font-weight-bold" style="font-size: 0.9rem;">
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

                @if (false)
                <td>
                  @if ($order->status == 'new')
                    <button class="btn btn-success mr-3" wire:click="updateStatus({{ $order }}, 'new', 'open')">
                      Accept
                    </button>

                    <button class="btn btn-danger mr-3" wire:click="updateStatus({{ $order }}, 'new', 'rejected')">
                      Reject
                    </button>
                  @elseif ($order->status == 'open')
                    <button class="btn btn-success mr-3" wire:click="updateStatus({{ $order }}, 'open', 'closed')">
                      Close
                    </button>
                  @endif
                </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      {{-- Show in smaller screens --}}
      <div class="table-responsive mb-3 d-md-none">
        <table class="table table-bordered-rm table-hover border">
          @if (false)
          <thead>
            <tr class="text-secondary-rm bg-success-rm text-white-rm" style="font-size: 1.1rem;">
              <th style="width: 120px;">
                Order ID
              </th>
              <th style="width: 200px;">
                Date
              </th>
              <th style="width: 200px;">
                Phone
              </th>
              <th style="width: 200px;">
                Address
              </th>
              <th>
                Total
              </th>
              <th>
                Status
              </th>
              @if (false)
              <th>
                Action
              </th>
              @endif
            </tr>
          </thead>
          @endif

          <tbody class="bg-white">
            @foreach ($websiteOrders as $order)
              <tr role="button" wire:click="$emit('displayOnlineOrder', {{ $order->website_order_id }})">
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
                <td class="" style="font-size: 1.1rem;">
                </td>
                <td class="pl-3">
                  {{ $order->phone }}
                  <div>
                    {{ \Illuminate\Support\Str::limit($order->address, 15, $end=' ...') }}
                  <div>
                </td>
                <td class="text-secondary-rm" style="font-size: 1rem;">
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

                @if (false)
                <td>
                  @if ($order->status == 'new')
                    <button class="btn btn-success mr-3" wire:click="updateStatus({{ $order }}, 'new', 'open')">
                      Accept
                    </button>

                    <button class="btn btn-danger mr-3" wire:click="updateStatus({{ $order }}, 'new', 'rejected')">
                      Reject
                    </button>
                  @elseif ($order->status == 'open')
                    <button class="btn btn-success mr-3" wire:click="updateStatus({{ $order }}, 'open', 'closed')">
                      Close
                    </button>
                  @endif
                </td>
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div>
        {{ $websiteOrders->links() }}
      </div>

      @else
        <div class="text-secondary pl-2" style="font-size: 1rem;">
          No online orders.
        </div>
      @endif
    </div>


    <div class="col-md-2">

      @if (false)
      <div class="card">
        <div class="card-body p-0 bg-danger-rm text-white-rm">
          <div class="p-4">
            <h2>
              New
            </h2>
            <div class="" style="font-size: 2rem;">
            {{ $newOrderCount }}
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body p-0 bg-danger-rm text-white-rm" style="{{--background-color: orange;--}}">
          <div class="p-4">
            <h2>
              Today
            </h2>
            <div class="" style="font-size: 2rem;">
            {{ $todayOrderCount }}
            </div>
          </div>
        </div>
      </div>


      <div class="card">
        <div class="card-body p-0 bg-success-rm text-white-rm">
          <div class="p-4">
            <h2>
              Total
            </h2>
            <div class="" style="font-size: 2rem;">
            {{ $totalOrderCount }}
            </div>
          </div>
        </div>
      </div>
      @endif

    </div>
  </div>

</div>
