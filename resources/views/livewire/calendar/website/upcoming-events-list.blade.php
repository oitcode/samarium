<div class="">

  <div class="d-flex-rm justify-content-between-rm col-md-4-rm bg-success text-white p-3">
    <div class="d-flex flex-column justify-content-center">
      <h2 class="h6 mb-0 font-weight-bold">
        Upcoming events
      </h2>
    </div>
  </div>

  <div class="my-3 px-3">
    @foreach ($calendarGroups as $calendarGroup)
      <button class="btn @if ($calendarGroup->calendar_group_id == $selectedCalendarGroup->calendar_group_id) btn-dark @else btn-light border
      @endif p-3-rm mx-3"
          type="button" wire:click="selectCalendarGroup({{ $calendarGroup }})">{{ $calendarGroup->name }}</button>
    @endforeach
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

</div>
