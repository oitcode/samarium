<x-box-generic title="Product">
  <x-menu-bar-horizontal>
    <x-menu-item title="Create" fa-class="fas fa-plus" click-method="enterMode('create')" />
    <x-menu-item title="List" fa-class="fas fa-list" click-method="enterMode('list')" />
  </x-menu-bar-horizontal>

  @if ($modes['create'])
    @livewire ('product-create')
  @elseif ($modes['list'])
    @livewire ('product-list')
  @endif

</x-box-generic>
