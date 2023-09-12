<div>

  {{-- Component herobar --}}
  <x-component-header>
    Calendar
  </x-component-header>

  {{-- Toolbar --}}
  <x-toolbar-classic>
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('eventCreate')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create event',
        'btnCheckMode' => 'eventCreate',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-eraser',
        'btnText' => 'Clear modes',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')
  </x-toolbar-classic>

  @if ($modes['eventCreate'])
    @if ($eventCreationDay)
      @livewire ('school.calendar-event-create', ['eventCreationDay' => $eventCreationDay,])
    @else
      @livewire ('school.calendar-event-create')
    @endif
  @else
  <div class="border-rm bg-white-rm mb-4">
    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" id="monthDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Month
      </button>
      <div class="dropdown-menu" aria-labelledby="monthDropdownMenu">
        <button class="dropdown-item" type="button" wire:click="selectMonth('Baisakh')">Baisakh</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Jestha')">Jestha</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Asadh')">Asadh</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Shrawan')">Shrawan</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Bhadra')">Bhadra</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Ashwin')">Ashwin</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Kartik')">Kartik</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Mangsir')">Mangsir</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Poush')">Poush</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Magh')">Magh</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Falgun')">Falgun</button>
        <button class="dropdown-item" type="button" wire:click="selectMonth('Chaitra')">Chaitra</button>
      </div>
    </div>
  </div>

  @if ($displayMonthName)
    <h2 class="h2 py-3 text-center bg-primary text-white mb-0 font-weight-bold">
      {{ $displayMonthName }}
    </h2>
  @endif

  <div class="border bg-white">
    @if ($displayMonthName)
      <div class="table-responsive border">
        <table class="table table-sm table-hover mb-0">
          <thead>
            <tr class="bg-dark text-white">
              <th style="width: 300px;">Date</th>
              <th>Day</th>
              <th>Details</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($monthBook as $day)
              <tr
                  class="
                      @if ($day['day']->format('l') == 'Saturday') table-danger @endif
                      @if ($day['is_holiday']) table-danger @endif
                  "
              >
                <td class="font-weight-bold">
                  <span class="mr-3">
                    {{ $displayMonthName }}
                    {{ $loop->iteration }}
                  </span>
                  <span class="text-secondary" style="{{--font-size: 0.5rem;--}}">
                    {{ $day['day']->format('Y F d') }}
                  </span>
                </td>
                <td class="font-weight-bold">
                  {{ $day['day']->format('l') }}
                </td>
                <td>
                  @if ($day['day']->format('l') == 'Saturday')
                    <span class="">
                      Holiday
                    </span>
                    <br />
                  @endif
                  @foreach ($day['events'] as $event)
                    <span class="">
                      {{ $event->title }}
                    </span>
                    <br />
                  @endforeach
                </td>
                <td>
                  <button class="btn btn-light badge-pill"
                      wire:click="addEventForADate({{ json_encode($day['day']->toDateString()) }})">
                    Add event
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      Select a month
    @endif
  </div>
  @endif

</div>
