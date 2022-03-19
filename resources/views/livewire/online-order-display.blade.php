<div>
  
  <h2 class="text-secondary">
    Online order details
  </h2>

  <div class="row">
    <div class="col-md-6">

      <div class="mb-4">
        <div>
          Date: {{ $websiteOrder->created_at->toDateString() }}
        </div>
        <div>
          Phone: {{ $websiteOrder->phone }}
        </div>
        <div>
          Address: {{ $websiteOrder->address }}
        </div>
        <div>
          Status: {{ $websiteOrder->status }}
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover table-bordered">
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
      <div>
        <button class="btn btn-success mr-3" wire:click="acceptOrder">
          Accept
        </button>

        <button class="btn btn-danger mr-3" wire:click="rejectOrder">
          Reject
        </button>
      </div>
    </div>
  </div>

</div>
