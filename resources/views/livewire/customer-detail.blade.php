<x-box-generic title="Customer detail">
  <x-menu-bar-horizontal>
    @if (true)
    <x-menu-item fa-class="fas fa-arrow-right" title="Sales hitory" click-method="enterMode('salesHistory')" />
    <x-menu-item fa-class="fas fa-hand-holding-usd" title="Credit history" click-method="enterWorkerListMode" />
    @endif

  </x-menu-bar-horizontal>

  <div class="">

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Customer name
      </div>
      <div class="col-md-9">
        {{ $customer->name }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Phone
      </div>
      <div class="col-md-9">
        {{ $customer->phone }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Email
      </div>
      <div class="col-md-9">
        {{ $customer->email }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        Address
      </div>
      <div class="col-md-9">
        {{ $customer->address }}
      </div>
    </div>

    <div class="row p-2 border" style="margin: auto;">
      <div class="col-md-3">
        PAN num
      </div>
      <div class="col-md-9">
        {{ $customer->pan_num }}
      </div>
    </div>

  </div>

  @if ($modes['salesHistory'])
    @livewire ('customer-sale-list', ['customer' => $customer,])
  @endif

</x-box-generic>
