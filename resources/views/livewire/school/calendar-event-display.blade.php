<div>


  <div class="bg-white p-3 border">

    @if (false)
    {{-- Temp refresh --}}
    <div class="mb-3">
      <i class="fas fa-refresh" wire:click="$refresh"></i>
    </div>
    @endif

    {{-- Event name --}}
    <div class="my-3">
      <div class="mb-3">
        <strong>
          Event name
        </strong>
      </div>
      <div>
        @if ($modes['editNameMode'])
          @livewire ('calendar.dashboard.calendar-event-edit-name', ['calendarEvent' => $calendarEvent,])
        @else
          {{ $calendarEvent->title }}
          <div>
            <button class="btn text-primary p-0" wire:click="enterMode('editNameMode')">
              Edit
            </button>
          </div>
        @endif
      </div>
    </div>
    <hr />

    {{-- Event date --}}
    <div class="my-3">
      <div class="mb-3">
        <strong>
          Event date
        </strong>
      </div>
      <div>
        @if ($modes['editDateMode'])
          @livewire ('calendar.dashboard.calendar-event-edit-date', ['calendarEvent' => $calendarEvent,])
        @else
          {{ $calendarEvent->start_date }}
          <div>
            <button class="btn text-primary p-0" wire:click="enterMode('editDateMode')">
              Edit
            </button>
          </div>
        @endif
      </div>
    </div>
    <hr />

    {{-- Is holidar --}}
    <div class="my-3">
      <div class="mb-3">
        <strong>
          Is holiday
        </strong>
      </div>
      <div>
        @if ($modes['editIsHolidayMode'])
          @livewire ('calendar.dashboard.calendar-event-edit-is-holiday', ['calendarEvent' => $calendarEvent,])
        @else
          {{ $calendarEvent->is_holiday }}
          <div>
            <button class="btn text-primary p-0" wire:click="enterMode('editIsHolidayMode')">
              Edit
            </button>
          </div>
        @endif
      </div>
    </div>

  </div>


</div>
