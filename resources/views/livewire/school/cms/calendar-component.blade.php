<div class="container pb-3">

  <div class="d-flex">
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
        <div class="my-3">
          @foreach ($calendarGroups as $calendarGroup)
            <button class="btn @If ($calendarGroup->calendar_group_id == $selectedCalendarGroup->calendar_group_id) btn-dark @else btn-light border @endif p-3"
                type="button" wire:click="selectCalendarGroup({{ $calendarGroup }})">{{ $calendarGroup->name }}</button>
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


  @if (false)
  @else

  <div class="border bg-white p-0">
    @if ($displayMonthName)
      <div class="d-flex justify-content-between">
        <h3 class="h4 text-center py-4 mb-0 bg-dark-rm text-dark pl-1"
            style="{{--background-color: @if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_bg_color }} @else @endif ;
                color:@if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_text_color }} @else @endif ;--}} 
            ">
          <span class="mr-2">
            2081
          </span>
          {{ $displayMonthName }}
        </h3>
        <div class="d-flex flex-column justify-content-center">
          <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
            <button class="btn btn-light border dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                    <span class="mr-3-rm font-weight-bold-rm" style="display: inline-block; min-width: 50px !important;;">
                      @if (false)
                      {{ $displayMonthName }}
                      @endif
                      {{ $loop->iteration }}
                    </span>
                    <span class="text-secondary mr-3-rm" style="display: inline-block; min-width: 50px !important;font-size: 0.6rem;">
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

  {{-- Today --}}
  @if (true)
  <div class="my-3">
  @if (false)
  @livewire ('calendar.website.today-display', ['selectedCalendarGroup' => $selectedCalendarGroup,])
  @endif
  <div class="border bg-white text-white-rm" style="">
    <div class="h6 px-2 mb-0 mt-3 text-muted-rm mb-2">
      <span class="text-success-rm p-1-rm border-rm border-danger-rm px-2-rm bg-success-rm text-white-rm font-weight-bold text-dark-rm badge
      badge-dark">
      Today
      </span>
      </br>
      </br>
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
  </div>
  </div>
  @endif

</div>
