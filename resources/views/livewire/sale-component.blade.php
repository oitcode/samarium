<x-box-generic title="Sale">
  <x-menu-bar-horizontal>
    <x-menu-item title="Create" fa-class="fas fa-plus" click-method="enterMode('create')" />
    <x-menu-item title="List" fa-class="fas fa-list" click-method="enterMode('list')" />
  </x-menu-bar-horizontal>

  @if ($modes['create'])
    @livewire ('sale-create')
  @elseif ($modes['list'])
    @livewire ('sale-list')
  @elseif ($modes['display'])
    @livewire ('sale-detail', ['sale' => $displayingSale,])
  @endif

</x-box-generic>
