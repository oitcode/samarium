<div>
  @if ($modes['onlineOrderDisplay'])
    @livewire ('online-order-display', ['websiteOrder' => $displayingOnlineOrder,])
  @else
    @livewire ('online-order-list')
  @endif
</div>
