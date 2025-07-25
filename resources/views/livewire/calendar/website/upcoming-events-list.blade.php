<div class="h-100 bg-white border py-4 px-4 o-border-radius">

  <div>
    <div class="d-flex justify-content-between mb-3">
      <h2 class="h4 o-heading">
        Upcoming events
      </h2>
      <div>
        <i class="fas fa-calendar fa-2x"></i>
      </div>
    </div>
  </div>
  @if (false)
  <hr class="mb-4" width="10%" style="border: 3px solid black; margin: 0 0;"/>
  @endif

  @if ($selectedCalendarGroup)
    <div class="d-flex">
      <div class="p-0">
        <div class="h-100 d-flex flex-column justify-content-center">
          <div class="h5 o-heading py-2 px-3 mb-0 bg-primary text-white o-border-radius mr-3">
            {{ $selectedCalendarGroup->name }}
          </div>
        </div>
      </div>
      <div class="">
        <div class="d-flex py-3">
          <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
            <button class="btn btn-success border o-border-radius-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Calendar Group
            </button>
            <div class="dropdown-menu" aria-labelledby="calendarGroupDropdownMenu">
              @foreach ($calendarGroups as $calendarGroup)
                <button class="dropdown-item" type="button" wire:click="selectCalendarGroup({{ $calendarGroup }})">{{ $calendarGroup->name }}</button>
              @endforeach
            </div>
          </div>
          <div>
            @include ('partials.dashboard.spinner-button')
          </div>
        </div>
      </div>
    </div>
  @endif

  @if ($hasEvents)
    @foreach ($monthBook as $day)
      @if (count($day['events']) > 0)
      <div class="row border" style="margin: auto; " wire:key="{{ rand() }}">
        <div class="col-4 border-0 w-50 p-0 " style="
                  background-color:
                    @if ($cmsTheme)
                      {{ $cmsTheme->ascent_bg_color }}
                    @else
                      orange
                    @endif
                    ;
                    "
        >
          <div class="h-100" style="background-color: rgba(255, 255, 255, 0.5)">
            <div class="h-100 p-3">
              <div class="h5 font-weight-bold mb-1" style="
                      color:
                      @if ($cmsTheme)
                        {{ $cmsTheme->ascent_bg_color }}
                      @else
                        black
                      @endif
                      ;
              ">
              {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($day['day']->toDateString(), 'english')  }}
              </div>
              <div>
              {{ $day['day']->format('l') }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-8 border-0 py-3">
          @if ($day['day']->format('l') == 'Saturday' || $day['is_holiday'])
          @endif
          @if (\Carbon\Carbon::today() == $day['day'])
            <div class="d-flex o-toggle-oo">
              <div class="mr-2">
                <i class="fas fa-circle text-success"></i>
              </div>
              <div class="text-success">
                Today
              </div>
            </div>
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
  @else
    <div class="p-3 py-5">
      <div class="text-center mb-4">
        <i class="fas fa-exclamation-circle fa-2x"></i>
      </div>
      <div class="h6 o-heading text-center">
        No upcoming events
      </div>
      <div class="text-center text-muted">
        There are currently no events scheduled.
      </div>
    </div>
  @endif

  <div class="my-3">
    <a href="./calendar">
      Visit calendar
      <i class="fas fa-arrow-right ml-2"></i>
    </a>
  </div>

</div>
