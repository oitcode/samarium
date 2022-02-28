<div>
  @if (false)
  <x-menu-bar-horizontal>
    <x-menu-item title="Create" fa-class="fas fa-plus" click-method="enterMode('create')" />
    <x-menu-item title="List" fa-class="fas fa-list" click-method="enterMode('list')" />
  </x-menu-bar-horizontal>
  @endif


  @if ($modes['create'])
    @livewire ('customer-create')
  @elseif ($modes['list'])
  @elseif ($modes['display'])
    @livewire ('customer-detail', ['customer' => $displayingCustomer,])
  @else
    @livewire ('customer-list')
  @endif

</div>
