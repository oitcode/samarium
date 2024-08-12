<div>


  <div class="form-group">
     @livewire ('school.calendar-date-picker-nepali', ['emitDate' => 'start_date',], key(rand()))

  </div>

  <div class="my-4">
     <div>
       <strong>
         Date:
       </strong>
     </div>
     <div>
       @if ($start_date)
         {{ $start_date }}
       @else
         Not selected
       @endif
     </div>
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$dispatch('calendarEventUpdateDateCancelled')">
      Cancel
    </button>
  </div>


</div>
