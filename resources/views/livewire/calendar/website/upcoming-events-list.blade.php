<div>

  <div class="d-flex p-3 border">
    <div class="d-flex flex-column justify-content-center">
      <h2 class="h5 o-heading py-3 mb-0">
        Upcoming events
      </h2>
    </div>
  </div>

  @if ($selectedCalendarGroup)
    <div class="row" style="margin: auto;">
      <div class="col-md-4 p-0" style="
          background-color:
            @if (\App\CmsTheme::first())
              {{ \App\CmsTheme::first()->ascent_bg_color }}
            @else
              orange
            @endif
            ;
          color:
            @if (\App\CmsTheme::first())
              {{ \App\CmsTheme::first()->ascent_text_color }}
            @else
              white
            @endif
            ;
      ">
        <div class="d-flex flex-column justify-content-center h-100" style="background-color: rgba(0, 0, 0, 0.5)">
          <div class="h5 font-weight-bold p-3 mb-0">
            {{ $selectedCalendarGroup->name }}
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="d-flex py-3">
          <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
            <button class="btn btn-success border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    @if (\App\CmsTheme::first())
                      {{ \App\CmsTheme::first()->ascent_bg_color }}
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
                      @if (\App\CmsTheme::first())
                        {{ \App\CmsTheme::first()->ascent_bg_color }}
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
    <div class="h5 font-weight-bold p-3" style="color: orange;">
      <i class="fas fa-exclamation-circle mr-1"></i>
      No upcoming events.
    </div>
  @endif

  <div class="my-3 p-3">
    <a href="./calendar">Visit calendar</a>
  </div>

</div>
