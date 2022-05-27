<div>
  
  <h2 class="text-secondary">
    Online order details
  </h2>

  <div class="row">
    <div class="col-md-6">

      <div class="mb-4">

        <div class="table-responsive">
          <table class="table table-bordered-rm border" style="font-size: 1.1rem;">
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

      <div class="table-responsive">
        <table class="table table-hover table-bordered" style="font-size: 1.1rem;">
          <thead>
            <tr>
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
            @if (false)
            <tr>
              <th colspan="3" class="text-right">
                Discount
              </th>
              <td>
                0
              </td>
            </tr>
            <tr>
              <th colspan="3" class="text-right">
                Delivery charge
              </th>
              <td>
                0
              </td>
            </tr>
            @endif
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
