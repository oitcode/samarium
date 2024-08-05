<div>


    @php
      $loopDate = \Carbon\Carbon::today();
      $noEvent = true;
    @endphp
    @for ($i=0; $i<30; $i++)

      @if (\App\SchoolCalendarEvent::whereDate('start_date', $loopDate->format('Y-m-d'))->get()->count())
        @php
          $noEvent = false;
        @endphp

        @if (false)
        <div class="mt-3">
          {{ $loopDate->format('Y-m-d') }}
        </div>
        @endif

        <div class="d-flex mb-3">
          <div class="border-right mr-4 pr-4">
            <div class="h2 font-weight-bold text-success">
            {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($loopDate->toDateString(), 'english')  }}
            </div>
            <div>
            {{ $loopDate->format('l') }}
            </div>
          </div>
          <div class="">
            @foreach (\App\SchoolCalendarEvent::whereDate('start_date', $loopDate->format('Y-m-d'))->get() as $calendarEvent)
              <div class="mb-2">
                {{ $calendarEvent->title }}

                @if ($calendarEvent->calendarGroups != null && count($calendarEvent->calendarGroups) > 0)
                  @foreach ($calendarEvent->calendarGroups as $calendarGroup)
                    <span class="badge badge-pill badge-primary p-2">
                    {{ $calendarGroup->name }}
                  @endforeach
                @endif
              </div>
            @endforeach
          </div>
        </div>
      @endif

      @php
        $loopDate = $loopDate->addDay();
      @endphp
    @endfor

    @if ($noEvent)
      <div class="h4 font-weight-bold" style="color: orange;">
        <i class="fas fa-exclamation-circle mr-1"></i>
        No upcoming events.
      </div>
    @endif

  {{--
  @foreach ($calendarEvents as $calendarEvent)
    @php
      $eventDate = \Carbon\Carbon::create($calendarEvent->start_date);
    @endphp
  @endforeach
  --}}

</div>
