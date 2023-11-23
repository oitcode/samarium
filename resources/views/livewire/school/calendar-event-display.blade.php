<div>


  <div class="bg-white p-3 border">

    {{-- Temp refresh --}}
    <div class="mb-3">
      <i class="fas fa-refresh" wire:click="$refresh"></i>
    </div>

    {{-- Event name --}}
    <div class="my-3">
      <div>
        Event name

        <span class="text-primary ml-3" wire:click="enterMode('editNameMode')">
          Edit
        </span>

      </div>
      <div>
        @if ($modes['editNameMode'])
          @livewire ('calendar.dashboard.calendar-event-edit-name', ['calendarEvent' => $calendarEvent,])
        @else
          {{ $calendarEvent->title }}
        @endif
      </div>
    </div>

    {{-- Event date --}}
    <div class="my-3">
      <div>
        Event date

        <span class="text-primary ml-3">
          Edit
        </span>

      </div>
      <div>
        {{ $calendarEvent->start_date }}
      </div>
    </div>

    {{-- Is holidar --}}
    <div class="my-3">
      <div>
        Is holiday

        <span class="text-primary ml-3">
          Edit
        </span>

      </div>
      <div>
        {{ $calendarEvent->is_holiday }}
      </div>
    </div>

  </div>


</div>
