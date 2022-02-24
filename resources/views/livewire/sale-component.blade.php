<div>
  @livewire ('cafe-sale-component')

  @if (false)
  <x-box-generic title="Sale">
    <x-menu-bar-horizontal>
      <x-menu-item title="Create" fa-class="fas fa-plus" click-method="enterMode('create')" />
      <x-menu-item title="List" fa-class="fas fa-list" click-method="enterMode('list')" />
    </x-menu-bar-horizontal>
  
    @if ($modes['create'])
      @livewire ('sale-create')
    @elseif ($modes['list'])
      @livewire ('sale-invoice-list')
    @elseif ($modes['display'])
      @livewire ('sale-invoice-detail', ['saleInvoice' => $displayingSaleInvoice,])
    @endif
  
  </x-box-generic>
  @endif
</div>
