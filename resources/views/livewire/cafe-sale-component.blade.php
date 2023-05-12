<div class="p-3 p-md-0">
    <div wire:offline class="border p-2 mb-3 text-secondary">
      YOU ARE OFFLINE
    </div>

  {{--
  |
  | Toolbar
  |
  | Top toolbar of the component.
  |
  --}}

  {{-- Show in bigger screens --}}
  <div class="mb-3 p-2 d-none d-md-block bg-dark-rm">
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createSeatTableMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createSeatTableMode',
    ])

    @include ('partials.dashboard.spinner-button')

    <div class="clearfix">
    </div>
  </div>

  @if ($modes['workingTableDisplay'])
    @livewire ('seat-table-work-display', ['seatTable' => $workingSeatTable,])
  @elseif ($modes['seatTableDisplayXypher'])
    @livewire ('seat-table-display', ['seatTable' => displayingSeatTable,])
  @elseif ($modes['createSeatTableMode'])
    @livewire ('seat-table-create')
  @else
    @livewire ('seat-table-list')
  @endif
</div>
