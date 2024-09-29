<div class="container">

  @if (true)
  <div>
    @if ($calendarGroups && count($calendarGroups) > 0)
      {{-- Calendar group choose option --}}
      @if (false)
      <div class="mb-3">
        <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
          <button class="btn btn-primary dropdown-toggle" type="button" id="calendarGroupDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ $selectedCalendarGroup->name }}
          </button>
          <div class="dropdown-menu" aria-labelledby="calendarGroupDropdownMenu">
            @foreach ($calendarGroups as $calendarGroup)
              <button class="dropdown-item" type="button" wire:click="selectCalendarGroup({{ $calendarGroup }})">{{ $calendarGroup->name }}</button>
            @endforeach
          </div>
        </div>
      </div>
      @else
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
    @endif

    <div>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>
  @endif

  {{-- Today --}}
  @if (true)
  <div class="mb-3-rm">
  @if (false)
  @livewire ('calendar.website.today-display', ['selectedCalendarGroup' => $selectedCalendarGroup,])
  @endif
  <div class="border bg-white text-white-rm" style="">


      <div
          class="row border" style="margin: auto;">
        <div class="col-6 border-0 w-50 bg-danger-rm bg-success-rm text-white-rm p-0" style="
                  background-color:
                    @if (\App\CmsTheme::first())
                      {{ \App\CmsTheme::first()->ascent_bg_color }}
                    @else
                      orange
                    @endif
                    ;
        ">
          <div class="h-100 p-3" style="background-color: rgba(0, 0, 0, 0.5)">
            <div class="h5 font-weight-bold text-success-rm mb-1" style="
                    color:
                    @if (\App\CmsTheme::first())
                      {{ \App\CmsTheme::first()->ascent_text_color }}
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
                      black
                    @endif
                    ;
                    ">
          @if (count($today['events']) > 0)
            @foreach ($today['events'] as $event)
              <i class="fas fa-calendar mr-1"></i>
              <span class="">
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



















    @if (false)
    <div class="font-weight-bold bg-success text-white p-3">
    Today
    </div>
    <div class="h6 px-2 mb-0 mt-3 text-muted-rm mb-4">
      <span class="h6 font-weight-bold">
      {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($today['day']->toDateString(), 'english')  }}
      2081,
      {{ $today['day']->format('l') }}
      </span>
    </div>
    <div class="col-md-3-rm bg-info-rm text-white-rm px-3">
      <h2 class="h5 font-weight-bold my-0">
      </h2>
      @if (false)
      <span class="">
        {{ $today['day']->format('Y F d') }}
      </span>
      @endif
    </div>
    @if ($today['is_holiday'] == 'yes')
      <div class="col-md-3-rm p-3 bg-success-rm text-white-rm border-rm">
        <div class="badge badge-pill badge-danger px-3">
          <span class="h6 font-weight-bold-rm">
            Holiday
          </span>
        </div>
      </div>
    @else
      @if (false)
      <div class="col-md-3-rm p-3 bg-success-rm text-white-rm border-rm">
        <div class="badge badge-pill badge-success px-3">
          <span class="h6 font-weight-bold-rm">
            Open
          </span>
        </div>
      </div>
      @endif
    @endif
    <div class="col-md-6-rm bg-success-rm text-white-rm px-2 pb-3 flex-grow-1">
      @if (false)
      <h2 class="h5 font-weight-bold mb-0">
        Events
      </h2>
      @endif
      @if (count($today['events']) > 0)
        @foreach ($today['events'] as $event)
          <i class="fas fa-calendar mr-1"></i>
          <span class="">
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
    @endif
  </div>
  </div>
  @endif


  @if (false)
  @else
  <div class="border bg-white p-0">
    @if ($displayMonthName)
      <div class="d-flex justify-content-between"
            style="background-color: @if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_bg_color }} @else @endif ;
                color:@if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_text_color }} @else @endif ; "
      >
        <h3 class="h3 font-weight-bold text-center py-4 mb-0 bg-dark-rm text-dark-rm pl-2"
            style="background-color: @if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_bg_color }} @else @endif ;
                color:@if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_text_color }} @else @endif ; 
            ">
          @if (false)
          <span class="mr-2">
            2081
          </span>
          @endif
          <span class="mr-2">
            {{ $displayMonthName }}
          </span>
          <span class="text-muted-rm mr-2" style="font-size: 0.8rem;">
            {{ $monthBook[0]['day']->format('F') }}
            /
            {{ \Carbon\Carbon::create($monthBook[0]['day']->copy()->addMonth())->format('F') }}
          </span>
        </h3>
        <div class="d-flex flex-column justify-content-center">
          <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
            <button class="btn btn-success border dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
        <table class="table table-sm table-bordered w-auto-rm mb-0">
          <thead>
            <tr class="bg-dark-rm text-white-rm d-none d-md-table-row">
              <th class="w-50">Date</th>
              @if (false)
              <th class="w-25-rm">Day</th>
              @endif
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
                    <span class="mr-3-rm font-weight-bold-rm" style="display: inline-block; min-width: 30px !important;;">
                      @if (false)
                      {{ $displayMonthName }}
                      @endif
                      {{ $loop->iteration }}
                    </span>
                    <span class="text-secondary mr-3-rm" style="display: inline-block; min-width: 30px !important;font-size: 0.6rem;">
                      {{ $day['day']->format('j') }}
                    </span>
                    <span class="text-secondary-rm mr-3-rm" style="font-size: 0.7rem;">
                      {{ $day['day']->isoFormat('ddd') }}
                    </span>
                    @if (\Carbon\Carbon::today() == $day['day'])
                      <span class="badge badge-pill badge-success ml-3">
                        TODAY
                      </span>
                    @endif
                </td>
                @if (false)
                <td class="font-weight-bold-rm d-block d-md-table-cell border-0">
                  {{ $day['day']->isoFormat('ddd') }}
                </td>
                @endif
                <td class="d-block-rm d-md-table-cell-rm border-0">
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
  @endif


</div>
