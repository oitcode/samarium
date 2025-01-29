<div>
  
  <x-base-component moduleName="Customer">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['list'] || !array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'create',
        ])
      @endif
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['create'])
        @livewire ('customer.customer-create')
      @elseif ($modes['list'])
        @livewire ('customer.customer-list')
      @elseif ($modes['search'])
        @livewire ('customer.customer-search')
      @elseif ($modes['display'])
        @livewire ('customer.customer-detail', ['customer' => $displayingCustomer,])
      @else
        @livewire ('customer.customer-list')
      @endif

    </div>
  </x-base-component>

</div>
