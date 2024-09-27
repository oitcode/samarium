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



   <div class="d-flex justify-content-between col-md-4-rm bg-success text-white p-3">
     <div class="d-flex flex-column justify-content-center">
       <h2 class="h6 mb-0 font-weight-bold">
         Upcoming events
       </h2>
     </div>
     <div class="my-3">
       @foreach ($calendarGroups as $calendarGroup)
         <button class="btn @if ($calendarGroup->calendar_group_id == $selectedCalendarGroup->calendar_group_id) btn-dark @else btn-light border
         @endif p-3-rm"
             type="button" wire:click="selectCalendarGroup({{ $calendarGroup }})">{{ $calendarGroup->name }}</button>
       @endforeach
     </div>
   </div>


            @foreach ($monthBook as $day)
              @if (count($day['events']) > 0)
              <div
                  class="row border" style="margin: auto;">
                <div class="col-4 border-0 w-50 bg-danger-rm bg-success text-white-rm p-0">
                  <div class="h-100 p-3" style="background-color: rgba(255, 255, 255, 0.8)">
                    <div class="h5 font-weight-bold text-success mb-1">
                    {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($day['day']->toDateString(), 'english')  }}
                    </div>
                    <div>
                    {{ $day['day']->format('l') }}
                    </div>
                  </div>
                </div>

                <div class="col-8 border-0 py-3">
                  @if ($day['day']->format('l') == 'Saturday' || $day['is_holiday'])
                    @if (false)
                    <span class=" badge badge-pill badge-danger">
                      Holiday
                    </span>
                    <br />
                    @endif
                  @endif
                  @foreach ($day['events'] as $event)

                    <div class="d-flex">
                      <div class="mr-2">
                        <i class="fas fa-calendar text-muted"></i>
                      </div>
                      <div>
                        @if ($selectedCalendarGroup)
                        @else
                          @foreach ($event->calendarGroups as $calendarGroup)
                            {{ $calendarGroup->name }}
                            :&nbsp;&nbsp;
                          @endforeach
                        @endif
                        {{ $event->title }}
                        @if ($day['day']->format('l') == 'Saturday' || $day['is_holiday'])
                          <span class="mx-4 text-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            Holiday
                          </span>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              @endif
            @endforeach






















    @if (false)
    @if (count($calendarEvents) > 0)
      @foreach ($calendarEvents as $calendarEvent)
      <div class="d-flex mb-3">
        <div class="border-right mr-4 pr-4 pl-3">
          <div class="h5 font-weight-bold text-success">
          @if (false)
          {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($calendarEvent->start_date->toDateString(), 'english')  }}
          @else
          Foo
          @endif
          </div>
          <div>
          @if (false)
          {{ $calendarEvent->start_date('l') }}
          @else
          Bar
          @endif
          </div>
        </div>
        <div class="px-3">
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
        </div>
      </div>
      @endforeach
    @else
      <div class="h5 font-weight-bold px-3" style="color: orange;">
        <i class="fas fa-exclamation-circle mr-1"></i>
        No upcoming events.
      </div>
    @endif
    @endif

  {{--
  @foreach ($calendarEvents as $calendarEvent)
    @php
      $eventDate = \Carbon\Carbon::create($calendarEvent->start_date);
    @endphp
  @endforeach
  --}}

</div>
