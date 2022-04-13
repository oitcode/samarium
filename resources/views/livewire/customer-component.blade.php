<div>

  @if ($modes['create'])
    @livewire ('customer-create')
  @elseif ($modes['list'])
  @elseif ($modes['display'])
    @livewire ('customer-detail', ['customer' => $displayingCustomer,])
  @else
    @livewire ('customer-list')
  @endif

</div>
