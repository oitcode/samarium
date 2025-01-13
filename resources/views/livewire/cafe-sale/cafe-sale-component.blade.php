<div>

  
  <x-base-component moduleName="Tables">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('editSettingsMode')",
          'btnIconFaClass' => 'fas fa-cogs',
          'btnText' => 'Settings',
          'btnCheckMode' => 'editSettingsMode',
      ])

      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])
    </x-slot>

    <div>

      {{--
         |
         | Use required component as per mode
         |
      --}}

      @if ($modes['workingTableDisplay'])
        @livewire ('cafe-sale.seat-table-work-display', ['seatTable' => $workingSeatTable,])
      @elseif ($modes['seatTableDisplayXypher'])
        @livewire ('cafe-sale.seat-table-display', ['seatTable' => displayingSeatTable,])
      @elseif ($modes['editSettingsMode'])
        @livewire ('seat-table.dashboard.seat-table-settings-component')
      @elseif ($modes['createSeatTableMode'])
        @livewire ('cafe-sale.seat-table-create')
      @else
        @livewire ('cafe-sale.seat-table-list')
      @endif

    </div>
  </x-base-component>


</div>
