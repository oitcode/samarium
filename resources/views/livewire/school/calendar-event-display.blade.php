<div>


  <div class="bg-white p-3 border">

    @if (true)
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

    <div class="col-md-6 p-0 border border-secondary-rm rounded">

      {{-- Change visibility --}}
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Change event visibility
              </strong>
            </div>
            <div>
              This event is currently public
            </div>
          </div>

          <div>
            <button class="btn btn-outline-danger">
              Change visibility
            </button>
          </div>
        </div>
      </div>
      <hr />

      {{-- Delete event --}}
      <div class="">
        <div class="d-flex justify-content-between p-3">
          <div>
            <div class="">
              <strong>
                Delete this event
              </strong>
            </div>
            <div>
              Once you delete, it cannot be undone. Please be sure.
            </div>
          </div>

          <div>
            <button class="btn btn-outline-danger">
              Delete
            </button>
          </div>
        </div>
      </div>


    </div>



  </div>


</div>
