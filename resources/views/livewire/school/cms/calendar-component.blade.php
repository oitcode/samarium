<div class="container">

  <div>
    @if ($calendarGroups && count($calendarGroups) > 0)
      {{-- Calendar group choose option --}}
      <div class="row" style="margin: auto;">
        @foreach ($calendarGroups as $calendarGroup)
          <div class="col-6 p-0">
            <button class="btn @If ($calendarGroup->calendar_group_id == $selectedCalendarGroup->calendar_group_id) btn-dark @else btn-light border
            @endif p-3 w-100"
                type="button" wire:click="selectCalendarGroup({{ $calendarGroup }})">{{ $calendarGroup->name }}</button>
          </div>
        @endforeach
      </div>
    @endif
    <div>
      @include ('partials.dashboard.spinner-button')
    </div>
  </div>

  {{-- Today --}}
  <div>
    <div class="border bg-white">
      <div class="row border" style="margin: auto;">
        <div class="col-6 border-0 w-50 p-0" style="
                  background-color:
                    @if ($cmsTheme)
                      {{ $cmsTheme->ascent_bg_color }}
                    @else
                      white
                    @endif
                    ;
        ">
          <div class="h-100 p-3" style="background-color: rgba(0, 0, 0, 0.5)">
            <div class="h5 font-weight-bold mb-1" style="
                    color:
                    @if ($cmsTheme)
                      {{ $cmsTheme->ascent_text_color }}
                    @else
                      black
                    @endif
                    ;
            ">
              Today
              </br>
              </br>
              {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($today['day']->toDateString(), 'english')  }}
              2081,
              {{ $today['day']->format('l') }}
            </div>
          </div>
        </div>

        <div class="col-6 border-0 py-3"   style="
                  background-color:
                    @if ($cmsTheme)
                      {{ $cmsTheme->ascent_bg_color }}
                    @else
                      white
                    @endif
                    ;
                    color:
                    @if ($cmsTheme)
                      {{ $cmsTheme->ascent_text_color }}
                    @else
                      black
                    @endif
                    ;
                    ">
          @if (count($today['events']) > 0)
            @foreach ($today['events'] as $event)
              <i class="fas fa-calendar mr-1"></i>
              <span>
                {{ $event->title }}
              </span>
              <br />
            @endforeach
          @else
            <div class="p-0">
              No calendar events
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>

  <div class="border bg-white p-0">
    @if ($displayMonthName)
      <div class="d-flex justify-content-between"
            style="background-color: @if ($cmsTheme) {{ $cmsTheme->ascent_bg_color }} @else @endif ;
                color:@if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else @endif ; "
      >
        <h3 class="h3 font-weight-bold text-center py-4 mb-0 pl-2"
            style="background-color: @if ($cmsTheme) {{ $cmsTheme->ascent_bg_color }} @else @endif ;
                color:@if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else @endif ; 
            ">
          <span class="mr-2">
            {{ $displayMonthName }}
          </span>
          <span class="mr-2">
            {{ $monthBook[0]['day']->format('F') }}
            /
            {{ \Carbon\Carbon::create($monthBook[0]['day']->copy()->addMonth())->format('F') }}
          </span>
        </h3>
        <div class="d-flex flex-column justify-content-center">
          <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
            <button class="btn btn-success border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Month
            </button>
            <div class="dropdown-menu" aria-labelledby="monthDropdownMenu">
              <button class="dropdown-item" type="button" wire:click="selectMonth('Baisakh')">Baisakh</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Jestha')">Jestha</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Asadh')">Asadh</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Shrawan')">Shrawan</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Bhadra')">Bhadra</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Ashwin')">Ashwin</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Kartik')">Kartik</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Mangsir')">Mangsir</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Poush')">Poush</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Magh')">Magh</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Falgun')">Falgun</button>
              <button class="dropdown-item" type="button" wire:click="selectMonth('Chaitra')">Chaitra</button>
            </div>
          </div>
        </div>
      </div>

      <div class="table-responsive border">
        <table class="table table-sm table-bordered mb-0">
          <thead>
            <tr class="d-none d-md-table-row">
              <th class="w-50">Date</th>
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($monthBook as $day)
              <tr
                  class="
                      border
                      @if ($day['day']->format('l') == 'Saturday') table-danger @endif
                      @if ($day['is_holiday']) table-danger @endif
                  "
              >
                <td class="border-0 w-50">
                    <span style="display: inline-block; min-width: 30px !important;;">
                      {{ $loop->iteration }}
                    </span>
                    <span class="text-secondary" style="display: inline-block; min-width: 30px !important;">
                      {{ $day['day']->format('j') }}
                    </span>
                    <span>
                      {{ $day['day']->isoFormat('ddd') }}
                    </span>
                    @if (\Carbon\Carbon::today() == $day['day'])
                      <span class="badge badge-pill badge-success ml-3">
                        TODAY
                      </span>
                    @endif
                </td>
                <td class="border-0">
                  @if ($day['day']->format('l') == 'Saturday' || $day['is_holiday'])
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
                      </div>
                    </div>
                  @endforeach
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      Select a month
    @endif
  </div>

</div>
