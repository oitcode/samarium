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
    @include ('partials.button-update')
    @include ('partials.button-cancel', ['clickEmitEventName' => 'calendarEventUpdateDateCancelled',])
    @include ('partials.spinner-border')
  </div>

</div>
