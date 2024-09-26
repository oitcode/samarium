<div class="">




@if (false)
<div class="border-rm bg-white">

      <div class="table-responsive border">
        <table class="table table-borderless-rm mb-0">
          @if (true)
          <tr>
            <th class="bg-danger text-white">
              Upcoming events
            </th>
          </tr>
          @endif
          @if (count($notices) > 0)
            @foreach ($notices as $notice) 
            <tr class="border-bottom">
              <td class="text-primary-rm font-weight-bold-rm">
                <a href="{{ route('website-webpage-' . $notice->permalink) }}" class="text-decoration-none text-reset">
                  <div>
                    <div class="h5 font-weight-bold">
                      {{ $notice->name }}
                    </div>
                    <div>
                      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($notice->created_at->toDateString(), 'english')  }}
                    </div>
                  </div>
                </a>
              </td>
            </tr>
            @endforeach
          @else
            <tr>
              <td class="text-muted">
                No notice to show.
              </td>
            </tr>
          @endif
        </table>
      </div>
</div>
@endif



   <div class="mb-3 col-md-4-rm bg-success text-white p-3">
     <h2 class="h6 mb-0">
       Upcoming events
     </h2>
   </div>

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
          <div class="border-right mr-4 pr-4 pl-3">
            <div class="h5 font-weight-bold text-success">
            {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($loopDate->toDateString(), 'english')  }}
            </div>
            <div>
            {{ $loopDate->format('l') }}
            </div>
          </div>
          <div class="px-3">
            @foreach (\App\SchoolCalendarEvent::whereDate('start_date', $loopDate->format('Y-m-d'))->get() as $calendarEvent)
              <div class="mb-2">
                {{ $calendarEvent->title }}

                @if ($calendarEvent->is_holiday == 'yes')
                  <span class="text-danger mx-3">
                    <i class="fas fa-exclamation-circle mr-1"></i>
                    Holiday
                  </span>
                @endif

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
      <div class="h5 font-weight-bold px-3" style="color: orange;">
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
