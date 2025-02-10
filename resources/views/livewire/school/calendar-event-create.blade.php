<div>

  <x-create-box-component title="Create event">
    {{-- Title --}}
    <div class="form-group mb-4">
      <label class="h6 o-heading">Title *</label>
      <input type="text"
          class="form-control bg-light rounded-lg"
          wire:model="title">
      @error ('title') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    {{-- Single/Multi day setting --}}
    <div class="mb-3">
      <div class="d-flex">
        <div class="mr-4">
          <label class="h6 o-heading">Single or Multiple day *</label>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <div>
          @if ($modes['multiDay'])
            <div>
              Multiple days
            </div>
          @else
            <div>
              Single day
            </div>
          @endif
        </div>
        @if ($modes['multiDay'])
          <div>
            <button class="btn btn-primary" wire:click="exitMode('multiDay')">
              Make Single day
            </button>
          </div>
        @else
          <div>
            <button class="btn btn-primary" wire:click="enterMode('multiDay')">
              Make Multiple day
            </button>
          </div>
        @endif
      </div>
    </div>

    {{-- Date part --}}
    @if (true || ! $eventCreationDay)
    <div>
      <label class="h6 o-heading">Date *</label>
    </div>
    @endif

    <div class="d-flex mb-4">
      <div class="mr-5">
        @if ($modes['multiDay'])
          <div class="d-flex mb-2">
            <span class="mr-2 o-heading">Start Date:</span>
            @if ($start_date)
              {{ $selectedStartDay }}
            @else
              <div class="text-muted">
                <i class="fas fa-exclamation-circle mr-1"></i>
                Date not selected
              </div>
            @endif
          </div>
        @else
          <div class="d-flex flex-column mb-2">
            @if ($start_date)
              <div>
                {{ $selectedStartDay }}
              </div>
            @else
              <div class="text-muted">
                <i class="fas fa-exclamation-circle mr-1"></i>
                Date not selected
              </div>
            @endif
          </div>
        @endif
        @if (true || ! $eventCreationDay)
          <div class="p-2 border" wire:key="{{ rand() }}" wire:ignore>
            @livewire ('school.calendar-date-picker-nepali', ['emitDate' => 'start_date',], key(rand()))
          </div>
        @endif
      </div>

      @if ($modes['multiDay'])
        <div>
          <div class="d-flex mb-2">
            <span class="mr-2 o-heading">End Date: </span>
              @if ($end_date)
                {{ $selectedEndDay }}
              @else
                <div class="text-muted">
                  <i class="fas fa-exclamation-circle mr-1"></i>
                  Date not selected
                </div>
              @endif
          </div>
          <div class="p-2 border">
            @livewire ('school.calendar-date-picker-nepali', ['emitDate' => 'end_date',], key(rand()))
          </div>
        </div>
      @endif
    </div>

    {{-- Is holiday --}}
    <div class="form-group mb-4">
      <label class="h6 o-heading">Is holiday *</label>
      <select class="form-control" wire:model="is_holiday">
        <option>---</option>
        <option value="no">No</option>
        <option value="yes">Yes</option>
      </select>
      @error ('is_holiday') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    @if ($calendarGroups != null &&  count($calendarGroups) > 0)
      {{-- Calendar group decision --}}
      <div class="mb-3">
        <div class="d-flex">
          <div class="mr-4">
            <label class="h6 o-heading">Applicable to *</label>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div>
            @if ($modes['allCalendarGroups'])
              <div>
                All calendar groups
              </div>
            @else
              <div>
                Single calendar group
              </div>
            @endif
          </div>
          @if ($modes['allCalendarGroups'])
            <div>
              <button class="btn btn-primary" wire:click="exitMode('allCalendarGroups')">
                Make for a single group
              </button>
            </div>
          @else
            <div>
              <button class="btn btn-primary" wire:click="enterMode('allCalendarGroups')">
                Make for all groups
              </button>
            </div>
          @endif
        </div>
      </div>

      @if (! $modes['allCalendarGroups'])
        {{-- Calendar group --}}
        <div class="form-group mb-4">
          <label class="h6 o-heading">Calendar group *</label>
          <select class="form-control" wire:model="calendar_group_id">
            <option>---</option>
            @foreach ($calendarGroups as $calendarGroup)
              <option value="{{ $calendarGroup->calendar_group_id }}">{{ $calendarGroup->name }}</option>
            @endforeach
          </select>
          @error ('calendar_group_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
      @endif
    @endif

    <div class="py-3 m-0">
      @include ('partials.button-store')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCalendarEventCreate',])
      @include ('partials.dashboard.spinner-button')
    </div>
  </x-create-box-component>

</div>
