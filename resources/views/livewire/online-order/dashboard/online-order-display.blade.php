<div>

  {{--
  |
  | Toolbar
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Online order
      <i class="fas fa-angle-right mx-2"></i>
      {{ $websiteOrder->website_order_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitOnlineOrderDisplayMode')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="row">
    <div class="col-md-12">
      <div class="mb-2">
        <div class="table-responsive bg-white">
          <table class="table border mb-0">
            <tbody>
              <tr>
                <td class="o-heading">
                  Date
                </td>
                <td>
                  {{ $websiteOrder->created_at->toDateString() }}
                </td>
              </tr>
              <tr>
                <td class="o-heading">
                  Time
                </td>
                <td>
                  {{ $websiteOrder->created_at->format('g:i A') }}
                </td>
              </tr>
              <tr>
                <td class="o-heading">
                  Phone
                </td>
                <td>
                  {{ $websiteOrder->phone }}
                </td>
              </tr>
              <tr>
                <td class="o-heading">
                  Address
                </td>
                <td>
                  {{ $websiteOrder->address }}
                </td>
              </tr>
              <tr>
                <td class="o-heading">
                  Status
                </td>
                <td>
                  @if ($websiteOrder->status == 'new')
                    <span class="badge badge-danger">
                      New
                    </span>
                  @elseif ($websiteOrder->status == 'open')
                    <span class="badge badge-warning">
                      Open
                    </span>
                  @elseif ($websiteOrder->status == 'delivered')
                    <span class="badge badge-success">
                      Delivered
                    </span>
                  @elseif ($websiteOrder->status == 'rejected')
                    <span class="badge badge-secondary">
                      Rejected
                    </span>
                  @else
                    {{ $websiteOrder->status }}
                  @endif
                </td>
              </tr>
              <tr>
                <td class="o-heading">
                  Action
                </td>
                <td>
                  @if ($websiteOrder->status == 'new')
                    <button class="btn btn-success mr-3" wire:click="acceptOrder">
                      <i class="fas fa-check-circle mr-2"></i>
                      Accept
                    </button>

                    <button class="btn btn-danger mr-3" wire:click="rejectOrder">
                      <i class="fas fa-times-circle mr-2"></i>
                      Reject
                    </button>
                  @elseif ($websiteOrder->status == 'open')
                    <button class="btn btn-success mr-3" wire:click="markAsDelivered">
                      <i class="fas fa-check-circle mr-2"></i>
                      Mark delivered
                    </button>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="table-responsive bg-white">
        <table class="table table-hover table-bordered mb-0">
          <thead>
            <tr>
              <th class="o-heading">Item</th>
              <th class="o-heading">Quantity</th>
              <th class="o-heading">Rate</th>
              <th class="o-heading">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($websiteOrder->websiteOrderItems as $item)
              <tr>
                <td>
                  {{ $item->product->name }}
                </td>
                <td>
                  {{ $item->quantity }}
                </td>
                <td>
                  {{ config('app.transaction_currency') }}
                  @php echo number_format( $item->product->selling_price ); @endphp
                </td>
                <td>
                  {{ config('app.transaction_currency') }}
                  @php echo number_format( $item->product->selling_price * $item->quantity); @endphp
                </td>
              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th colspan="3" class="o-heading text-right">
                Grand Total
              </th>
              <td class="o-heading">
                {{ config('app.transaction_currency') }}
                @php echo number_format( $websiteOrder->getTotalAmount() ); @endphp
              </td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="col-md-6">
    </div>
  </div>

</div>
