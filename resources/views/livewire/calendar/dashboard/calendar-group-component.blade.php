<div>


  {{--
     |
     | Top tool bar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Calendar Group">

    @include ('partials.dashboard.spinner-button')

    @if (! array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('createCalendarGroupMode')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'createMode',
      ])
    @endif

    @if ($modes['createCalendarGroupMode'] || $modes['displayCalendarGroupMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
          'btnBsColor' =>'bg-danger text-white',
      ])
    @endif

  </x-toolbar-classic>


  {{--
     |
     | Flash message div
     |
  --}}

  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['createCalendarGroupMode'])
    @livewire ('calendar.dashboard.calendar-group-create')
  @elseif ($modes['listCalendarGroupMode'])
    @livewire ('calendar.dashboard.calendar-group-list')
  @elseif ($modes['displayCalendarGroupMode'])
    @livewire ('calendar.dashboard.calendar-group-display', ['calendarGroup' => $displayingCalendarGroup,])
  @else
    @livewire ('calendar.dashboard.calendar-group-list')
  @endif


</div>
