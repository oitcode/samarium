<div class="p-3 p-md-0">


  <div wire:offline class="border p-2 mb-3 text-secondary">
    YOU ARE OFFLINE
  </div>


  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Tables">
    @if (false)
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createSeatTableMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createSeatTableMode',
    ])
    @endif

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('editSettingsMode')",
        'btnIconFaClass' => 'fas fa-cogs',
        'btnText' => 'Settings',
        'btnCheckMode' => 'editSettingsMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])
  </x-toolbar-classic>


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['workingTableDisplay'])
    @livewire ('seat-table-work-display', ['seatTable' => $workingSeatTable,])
  @elseif ($modes['seatTableDisplayXypher'])
    @livewire ('seat-table-display', ['seatTable' => displayingSeatTable,])
  @elseif ($modes['editSettingsMode'])
    @livewire ('seat-table.dashboard.seat-table-settings-component')
  @elseif ($modes['createSeatTableMode'])
    @livewire ('seat-table-create')
  @else
    @livewire ('seat-table-list')
  @endif


</div>
