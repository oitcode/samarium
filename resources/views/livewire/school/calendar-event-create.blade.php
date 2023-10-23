<div class="p-3 bg-white border">


  <div class="d-flex justify-content-start">
    <h2 class="h5">
      <i class="fas fa-plus-circle mr-1"></i>
      Add event
    </h2>
  </div>


  <div class="form-group">
    <label>Title</label>
    <input type="text"
        class="form-control"
        wire:model.defer="title"
        style="font-size: 1.3rem;">
    @error ('title') <span class="text-danger">{{ $message }}</span> @enderror
  </div>


  {{-- Date part --}}
  @if (true || ! $eventCreationDay)
  <div class="my-2">
      @if ($modes['multiDay'])
        <button class="btn btn-sm btn-primary" wire:click="exitMode('multiDay')">
          Single day
        </button>
      @else
        <button class="btn btn-sm btn-primary" wire:click="enterMode('multiDay')">
          Date range
        </button>
      @endif
  </div>
  @endif


  <div class="d-flex mb-4">
    <div class="mr-5">
      @if ($modes['multiDay'])
        <div class="d-flex">
          <span class="mr-2">Start Date:</span>
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
        <div class="d-flex">
          <span class="mr-2">Date:</span>
          @if ($start_date)
            {{ $selectedStartDay }}
          @else
            <div class="text-muted">
              <i class="fas fa-exclamation-circle mr-1"></i>
              Date not selected
            </div>
          @endif
        </div>
      @endif
      @if (true || ! $eventCreationDay)
        @livewire ('school.calendar-date-picker-nepali', ['emitDate' => 'start_date',], key(rand()))
      @endif
    </div>


    @if ($modes['multiDay'])
      <div>
        <div class="d-flex">
          <span class="mr-2">End Date: </span>
            @if ($end_date)
              {{ $selectedEndDay }}
            @else
              <div class="text-muted">
                <i class="fas fa-exclamation-circle mr-1"></i>
                Date not selected
              </div>
            @endif
        </div>
        @livewire ('school.calendar-date-picker-nepali', ['emitDate' => 'end_date',], key(rand()))
      </div>
    @endif
  </div>


  <div class="form-group">
    <label>Is holiday</label>
    <select class="form-control" wire:model.defer="is_holiday">
      <option>---</option>
      <option value="no">No</option>
      <option value="yes">Yes</option>
    </select>
    @error ('description') <span class="text-danger">{{ $message }}</span> @enderror
  </div>


  <div class="py-3 m-0">

    @include ('partials.button-store')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'exitCalendarEventCreate',])

    <button wire:loading class="btn">
      <span class="spinner-border text-info mr-3" role="status">
      </span>
    </button>
  </div>


</div>
