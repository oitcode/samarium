<div>
  <div class="border-rm mb-4">
    <button class="btn btn-light badge-pill border mr-4" wire:click="enterMode('eventCreate')">Add event</button>
  </div>

  @if ($modes['eventCreate'])
    @if ($eventCreationDay)
      @livewire ('school.calendar-event-create', ['eventCreationDay' => $eventCreationDay,])
    @else
      @livewire ('school.calendar-event-create')
    @endif
  @else
  <div class="border-rm bg-white mb-4">
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
  <div class="border bg-white p-3">
    @if ($displayMonthName)
      <h3 class="h6 mr-4">
        {{ $displayMonthName }}
      </h3>
      <div class="table-responsive border">
        <table class="table">
          <thead>
            <tr>
              <th>Date</th>
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
                <td>
                  <span class="mr-3">
                    {{ $displayMonthName }}
                    {{ $loop->iteration }}
                  </span>
                  <span class="text-secondary" style="font-size: 0.5rem;">
                    {{ $day['day']->format('Y F d') }}
                  </span>
                </td>
                <td>
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
                  <button class="btn btn-primary badge-pill"
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
