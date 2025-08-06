<div class="container my-5">

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
  <div class="px-4 py-4 o-border-top-radius" style="background-color: @if ($cmsTheme) {{ $cmsTheme->ascent_bg_color }} @else white @endif;
                                                    color: @if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else black @endif ;">
    <div class="mb-3 mb-0 text-center text-md-left">
      <div class="h5 o-heading mb-3" style="color: @if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else black @endif;">
        Today
      </div>
      <div class="h2 o-heading mb-0" style="color: @if ($cmsTheme) {{ $cmsTheme->ascent_text_color }} @else black @endif;">
        {{ \App\Traits\NepaliDateTrait::convertEnglishToNepaliDate($today['day'], 'english') }}
        ,
        {{ $today['day']->format('l') }}
      </div>
    </div>

    <div class="border-0">
      <div class="o-ascent-border-color o-border-radius px-3 py-2 o-lighter text-center text-md-left">
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

  <div class="border-rm bg-white-rm p-0 py-3-rm">
    @if ($displayMonthName)
      <div class="d-flex flex-column flex-md-row justify-content-between border-left border-right py-3" style="background-color: #eee;">
        <h3 class="h2 o-heading text-center py-4 mb-0 pl-3" >
          <span class="mr-2">
            {{ $displayMonthName }}
          </span>
          <span class="text-muted mr-2">
            {{ $monthBook[0]['day']->format('F') }}
            /
            {{ \Carbon\Carbon::create($monthBook[0]['day']->copy()->addMonth())->format('F') }}
        </h3>
        <div class="d-flex flex-column justify-content-center pb-4 pb-md-0">
          <div class="d-flex justify-content-center justify-content-md-start">
            <button class="btn btn-primary px-3 mr-3 o-border-radius-sm shadow">
              <i class="fas fa-arrow-left mr-1"></i>
              Previous
            </button>
            <div class="dropdown mr-3" style="position: relative; z-index: 10000;">
              <button class="btn btn-success border dropdown-toggle o-border-radius-sm shadow" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <button class="btn btn-primary px-3 mr-3 shadow">
              Next
              <i class="fas fa-arrow-right ml-1"></i>
            </button>
          </div>
        </div>
      </div>

      <div class="table-responsive border">
        <table class="table table-sm-rm table-bordered-rm mb-0">
          <thead>
            <tr class="d-none d-md-table-row">
              <th class="px-4 w-50 o-heading py-4">Date</th>
              <th class="o-heading py-4">Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($monthBook as $day)
              <tr
                  class="
                      border
                      @if ($day['day']->format('l') == 'Saturday') table-danger @endif
                      @if ($day['is_holiday']) table-danger @endif
                      @if (\Carbon\Carbon::today() == $day['day']) && $day['day']->format('l') != 'Saturday')
                        table-primary
                      @endif
                  "
              >
                <td class="border-0 w-50 py-4">
                    <span class="h5 o-heading px-3" style="display: inline-block; min-width: 30px !important;">
                      {{ $loop->iteration }}
                    </span>
                    <span class="o-heading text-secondary px-3" style="display: inline-block; min-width: 30px !important;">
                      {{ $day['day']->format('j') }}
                    </span>
                    <span class="o-heading px-3">
                      {{ $day['day']->isoFormat('ddd') }}
                    </span>
                    @if (\Carbon\Carbon::today() == $day['day'])
                      <span class="badge badge-pill badge-success ml-3 p-3 o-heading text-white mt-3 mt-md-0">
                        TODAY
                      </span>
                    @endif
                </td>
                <td class="border-0 py-4">
                  @if ($day['day']->format('l') == 'Saturday' || $day['is_holiday'])
                  @endif
                  @if (count($day['events']) > 0)
                    @foreach ($day['events'] as $event)

                      <div class="d-flex px-3 py-2 bg-primary text-white o-border-radius @if (!$loop->last) mb-2 @endif">
                        <div class="mr-2">
                          <i class="fas fa-calendar"></i>
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
                  @else
                    @if (false)
                    <div class="text-muted">
                      <i>No events</i>
                    </div>
                    @endif
                  @endif
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
