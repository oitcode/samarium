<div class="container py-3">

  <div class="d-flex">
    <div class="border-rm bg-white mb-4-rm">
      <div class="d-flex">
        <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
          <button class="btn btn-primary dropdown-toggle" type="button" id="monthDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
    @if ($calendarGroups && count($calendarGroups) > 0)
      {{-- Calendar group choose option --}}
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
    @endif

    <div>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>

  {{-- Today --}}
  @if (true)
  <div class="mb-3">
    @livewire ('calendar.website.today-display')
  </div>
  @endif

  @if (false)
  @else

  <div class="border bg-white p-0">
    @if ($displayMonthName)
      <h3 class="h3 text-center py-4 mb-0 bg-dark text-white"
          style="{{--background-color: @if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_bg_color }} @else @endif ;
              color:@if (\App\CmsTheme::first()) {{ \App\CmsTheme::first()->ascent_text_color }} @else @endif ;--}} 
          ">
        <span class="mr-2">
          2081
        </span>
        {{ $displayMonthName }}
      </h3>
      <div class="table-responsive border">
        <table class="table table-sm table-bordered-rm w-auto-rm mb-0">
          <thead>
            <tr class="bg-dark-rm text-white-rm d-none d-md-table-row">
              <th class="w-25">Date</th>
              @if (true)
              <th class="w-25">Day</th>
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
                <td class="d-block d-md-table-cell border-0">
                  <div>
                    <span class="mr-3 font-weight-bold">
                      {{ $displayMonthName }}
                      {{ $loop->iteration }}
                    </span>
                    <span class="text-secondary mr-3">
                      @if (false)
                      {{ $day['day']->format('Y F d') }}
                      @endif
                      {{ $day['day']->format('F d') }}
                      @if (\Carbon\Carbon::today() == $day['day'])
                        <span class="badge badge-pill badge-success ml-3">
                          TODAY
                        </span>
                      @endif
                    </span>
                    @if (false)
                    <span class="text-secondary-rm mr-3" style="font-size: 0.5rem;">
                      {{ $day['day']->format('l') }}
                    </span>
                    @endif
                  </div>
                  <div>
                  </div>
                </td>
                <td class="font-weight-bold d-block d-md-table-cell border-0">
                  {{ $day['day']->format('l') }}
                </td>
                <td class="d-block d-md-table-cell border-0">
                  @if ($day['day']->format('l') == 'Saturday' || $day['is_holiday'])
                    @if (false)
                    <span class=" badge badge-pill badge-danger">
                      Holiday
                    </span>
                    <br />
                    @endif
                  @endif
                  @foreach ($day['events'] as $event)

                    <span class="badge-rm badge-pill-rm badge-primary-rm h5" style="font-size: 0.9rem;">
                      @if ($selectedCalendarGroup)
                      @else
                        @foreach ($event->calendarGroups as $calendarGroup)
                          {{ $calendarGroup->name }}
                          :&nbsp;&nbsp;
                        @endforeach
                      @endif
                      {{ $event->title }}
                    </span>
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
