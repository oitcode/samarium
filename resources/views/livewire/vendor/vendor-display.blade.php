<div>

  <div class="d-flex justify-content-between bg-white py-0 mb-2">
    {{-- Breadcrumb --}}
    <div class="my-2 p-2">
      Vendor

      <i class="fas fa-angle-right mx-2"></i>
      {{ $vendor->vendor_id }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light p-3" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-danger p-3" wire:click="$dispatch('exitVendorDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="bg-white border">

    <div class="table-responsive">
      <table class="table mb-0">
        <tbody>
          <tr>
            <th>Name</th>
            <td>{{ $vendor->name }}</td>
          </tr>
          <tr>
            <th>Email</th>
            <td>
              @if ($vendor->email)
                {{ $vendor->email}}
              @else
                <i class="fas fa-exclamation-circle text-warning mr-1"></i>
                <span class="text-secondary">
                Email unknown
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th>Phone</th>
            <td>
              @if ($vendor->phone)
                <i class="fas fa-phone text-secondary mr-3"></i>
                {{ $vendor->phone}}
              @else
                <i class="fas fa-exclamation-circle text-warning mr-1"></i>
                <span class="text-secondary">
                Phone unknown
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th>PAN Num</th>
            <td>
              @if ($vendor->pan_num)
                {{ $vendor->pan_num}}
              @else
                <i class="fas fa-exclamation-circle text-warning mr-1"></i>
                <span class="text-secondary">
                PAN number unknown
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th>Balance</th>
            <td>
              Rs
              @php echo number_format( $vendor->getBalance() ); @endphp
            </td>
          </tr>
        </tbody>
      </table>
    </div>



  </div>


  {{-- Toolbar --}}
  <div class="my-4">
    <div class="mb-3">
      <button class="btn
          @if ($modes['purchaseList'])
            btn-success text-white
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          wire:click="enterMode('purchaseList')">
        <i class="fas fa-shopping-cart mr-3"></i>
        Purchases
      </button>

      <button class="btn
          @if ($modes['settle'])
            btn-success text-white
          @endif
          m-0 border shadow-sm badge-pill mr-3"
          wire:click="enterMode('settle')">
        <i class="fas fa-key mr-3"></i>
        Settle
      </button>

      <button wire:loading class="btn m-0"
          style="height: 100px; width: 225px;">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>

      <div class="clearfix">
      </div>
    </div>
  </div>

  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['purchaseList'])
    @livewire ('core.core-purchase-list', ['vendor' => $vendor,])
  @elseif ($modes['settle'])
    @livewire ('vendor.vendor-display-settle', ['vendor' => $vendor,])
  @elseif ($modes['purchasePaymentCreate'])
    @livewire ('vendor.vendor-purchase-payment-create', ['purchase' => $paymentMakingPurchase,])
  @elseif ($modes['purchaseDisplay'])
    @livewire ('core.core-purchase-display', ['purchase' => $displayingPurchase,])
  @endif


</div>
