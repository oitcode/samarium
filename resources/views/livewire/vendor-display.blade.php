<div>


  <div class="bg-white p-2 border">
    <h2 class="my-4">
      {{ $vendor->name }}
    </h2>
    <div class="row">
      <div class="col-md-3">

        <div>
          @if ($vendor->phone)
            {{ $vendor->phone}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            Phone unknown
            </span>
          @endif
        </div>

        <div>
          @if ($vendor->email)
            {{ $vendor->email}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            Email unknown
            </span>
          @endif
        </div>

        <div>
          @if ($vendor->address)
            {{ $vendor->address}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            Address unknown
            </span>
          @endif
        </div>

        <div>
          @if ($vendor->pan_num)
            {{ $vendor->pan_num}}
          @else
            <i class="fas fa-exclamation-circle text-danger mr-3"></i>
            <span class="text-secondary">
            PAN number unknown
            </span>
          @endif
        </div>
      </div>

      <div class="col-md-3">
        <h2 class="h5 text-secondary">
          Balance
        </h2>
        <span class="text-danger" style="font-size: 1.5rem;">
        Rs
        @php echo number_format( $vendor->getBalance() ); @endphp
        </span>
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
            style="font-size: 1.3rem;" wire:click="enterMode('purchaseList')">
          <i class="fas fa-shopping-cart mr-3"></i>
          Purchases
        </button>

        <button class="btn
            @if ($modes['settle'])
              btn-success text-white
            @endif
            m-0 border shadow-sm badge-pill mr-3"
            style="font-size: 1.3rem;" wire:click="enterMode('settle')">
          <i class="fas fa-key mr-3"></i>
          Settle
        </button>

        <button wire:loading class="btn m-0"
            style="height: 100px; width: 225px; font-size: 1.5rem;">
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
      @livewire ('core-purchase-list', ['vendor' => $vendor,])
    @elseif ($modes['settle'])
      @livewire ('vendor-display-settle', ['vendor' => $vendor,])
    @endif

  </div>


</div>
