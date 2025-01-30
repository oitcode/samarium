<div>

  <div class="bg-white p-3 border">
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

    {{-- Is holiday --}}
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
    <hr />

    {{-- Danger zone --}}
    <div class="mb-3">
      <strong>
        Danger zone
      </strong>
    </div>

    <div class="col-md-6 p-0 border rounded">
      {{-- Delete event --}}
      <div>
        <div class="d-flex justify-content-between p-3">
          <div>
            <div>
              <strong>
                Delete this event
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>
          <div>
            @if ($modes['deleteMode'])
              <button class="btn btn-danger" wire:click="deleteEvent">
                Confirm delete
              </button>
              <button class="btn btn-light" wire:click="exitMode('deleteMode')">
                Cancel
              </button>
            @else
              <button class="btn btn-outline-danger" wire:click="enterMode('deleteMode')">
                Delete
              </button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
