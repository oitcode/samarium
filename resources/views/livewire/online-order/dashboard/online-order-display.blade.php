<div>

  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-0 border-rm">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2">
      Online order

      <i class="fas fa-angle-right mx-2"></i>
      {{ $websiteOrder->website_order_id }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$dispatch('exitOnlineOrderDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">

      <div class="mb-4">

        <div class="table-responsive bg-white">
          <table class="table border mb-0" style="font-size: 1.1rem;">
            <tbody>

              <tr>
                <td>
                  Date
                </td>
                <td>
                  {{ $websiteOrder->created_at->toDateString() }}
                </td>
              </tr>

              <tr>
                <td>
                  Time
                </td>
                <td>
                  {{ $websiteOrder->created_at->format('g:i A') }}
                </td>
              </tr>

              <tr>
                <td>
                  Phone
                </td>
                <td>
                  {{ $websiteOrder->phone }}
                </td>
              </tr>

              <tr>
                <td>
                  Address
                </td>
                <td>
                  {{ $websiteOrder->address }}
                </td>
              </tr>

              <tr>
                <td>
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
                <td>
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
        <table class="table table-hover table-bordered mb-0" style="font-size: 1.1rem;">
          <thead>
            <tr class="bg-primary text-white">
              <th>Item</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>Total</th>
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
                  @php echo number_format( $item->product->selling_price ); @endphp
                </td>
                <td>
                  @php echo number_format( $item->product->selling_price * $item->quantity); @endphp
                </td>
              </tr>
            @endforeach
          </tbody>

          <tfoot>
            <tr>
              <th colspan="3" class="text-right">
                Grand Total
              </th>
              <td>
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
