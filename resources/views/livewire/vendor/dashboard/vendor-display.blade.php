<div>

  {{-- Basic info --}}
  <div class="py-5 mb-2 text-center o-linear-gradient o-border-radius">
    <div class="h2 o-heading">
      {{ $vendor->name }}
    </div>
    <div class="h5">
      {{ $vendor->created_at }}
    </div>
  </div>

  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Vendor
      <i class="fas fa-angle-right mx-2"></i>
      {{ $vendor->vendor_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$dispatch('exitVendorDisplayMode')">
        <i class="fas fa-times-circle text-danger mr-1"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="bg-white border">
    <div class="table-responsive">
      <table class="table mb-0">
        <tbody>
          <tr>
            <th class="o-heading">Name</th>
            <td>
              @if ($modes['updateNameMode'])
                @livewire ('vendor.dashboard.vendor-edit-name', ['vendor' => $vendor,])
              @else
                {{ $vendor->name }}
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updateNameMode'])
                <span class="mx-3" wire:click="enterMode('updateNameMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">Email</th>
            <td>
              @if ($modes['updateEmailMode'])
                @livewire ('vendor.dashboard.vendor-edit-email', ['vendor' => $vendor,])
              @else
                @if ($vendor->email)
                  {{ $vendor->email}}
                @else
                  <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                  <span class="text-secondary">
                    Email unknown
                  </span>
                @endif
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updateEmailMode'])
                <span class="mx-3" wire:click="enterMode('updateEmailMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">Phone</th>
            <td>
              @if ($modes['updatePhoneMode'])
                @livewire ('vendor.dashboard.vendor-edit-phone', ['vendor' => $vendor,])
              @else
                @if ($vendor->phone)
                  {{ $vendor->phone}}
                @else
                  <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                  <span class="text-secondary">
                    Phone unknown
                  </span>
                @endif
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updatePhoneMode'])
                <span class="mx-3" wire:click="enterMode('updatePhoneMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">PAN Num</th>
            <td>
              @if ($modes['updatePanMode'])
                @livewire ('vendor.dashboard.vendor-edit-pan', ['vendor' => $vendor,])
              @else
                @if ($vendor->pan_num)
                  {{ $vendor->pan_num}}
                @else
                  <i class="fas fa-exclamation-circle text-secondary mr-1"></i>
                  <span class="text-secondary">
                  PAN number unknown
                  </span>
                @endif
              @endif
            </td>
            <td class="text-right">
              @if (! $modes['updatePanMode'])
                <span class="mx-3" wire:click="enterMode('updatePanMode')" role="button">
                  Edit
                </span>
              @endif
            </td>
          </tr>
          <tr>
            <th class="o-heading">Balance</th>
            <td>
              {{ config('app.transaction_currency_symbol') }}
              @php echo number_format( $vendor->getBalance() ); @endphp
            </td>
            <td>
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
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['purchaseList'])
    @livewire ('core.dashboard.core-purchase-list', ['vendor' => $vendor,])
  @elseif ($modes['settle'])
    @livewire ('vendor.dashboard.vendor-display-settle', ['vendor' => $vendor,])
  @elseif ($modes['purchasePaymentCreate'])
    @livewire ('vendor.dashboard.vendor-purchase-payment-create', ['purchase' => $paymentMakingPurchase,])
  @elseif ($modes['purchaseDisplay'])
    @livewire ('core.dashboard.core-purchase-display', ['purchase' => $displayingPurchase,])
  @endif

</div>
