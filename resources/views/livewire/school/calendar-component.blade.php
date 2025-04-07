<div>
  
  <x-base-component moduleName="Calendar">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if (! array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('eventCreate')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'Create event',
            'btnCheckMode' => 'eventCreate',
        ])
      @endif

      @if (! array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="calendarToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

      {{--
         |
         | Use the required component as per mode
         |
      --}}

      @if ($modes['eventCreate'])
        @if ($eventCreationDay)
          @livewire ('school.calendar-event-create', ['eventCreationDay' => $eventCreationDay,])
        @else
          @livewire ('school.calendar-event-create')
        @endif
      @elseif ($modes['displayCalendarEventMode'])
        @livewire ('school.calendar-event-display', ['calendarEvent' => $displayingCalendarEvent,])
      @else
      <div class="d-flex bg-white mb-1">
        <div class="d-flex flex-column justify-content-center mr-2 px-3">
          <div class="dropdown py-3">
            <button class="btn dropdown-toggle" type="button" id="monthDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          @if ($displayMonthName)
            <div>
              <h2 class="h2 pb-3 text-center mb-0 o-heading">
                {{ $displayMonthName }}
              </h2>
            </div>
          @endif
        </div>
      </div>

      <div class="border bg-white">
        @if ($displayMonthName)
          <div class="table-responsive border">
            <table class="table table-sm table-hover mb-0">
              <thead>
                <tr class="bg-light py-5">
                  <th class="o-heading py-4" style="width: 300px;">Date</th>
                  <th class="o-heading py-4">Day</th>
                  <th class="o-heading py-4">Details</th>
                  <th class="o-heading py-4 text-right">Action</th>
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
                      <span class="text-secondary">
                        {{ $day['day']->format('Y F d') }}
                      </span>
                      @if (\Carbon\Carbon::today() == $day['day'])
                        <span class="badge badge-pill badge-success ml-3">
                          TODAY
                        </span>
                      @endif
                    </td>
                    <td class="font-weight-bold">
                      {{ $day['day']->format('l') }}
                    </td>
                    <td>
                      @if ($day['day']->format('l') == 'Saturday')
                        <span>
                          Holiday
                        </span>
                        <br />
                      @endif
                      @foreach ($day['events'] as $event)
                        <span>
                          {{ $event->title }}
                        </span>
                        <button class="btn text-primary" wire:click="displayCalendarEvent({{ $event }})">
                          <i class="fas fa-pencil-alt"></i>
                          Edit event
                        </button>
                        <br />
                      @endforeach
                    </td>
                    <td class="text-right">
                      <button class="btn btn-light"
                          wire:click="addEventForADate({{ json_encode($day['day']->toDateString()) }})">
                        <i class="fas fa-plus-circle"></i>
                        Add event
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <div class="p-3">
            Month not selected.
            Please select a month.
          </div>
        @endif
      </div>
      @endif
    </div>
  </x-base-component>

</div>
