<div>


  {{--
     |
     | Top toolbar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Contact Message">

    @include ('partials.dashboard.spinner-button')

    @if ($modes['listContactMessageMode'] || ! array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('listContactMessageMode')",
          'btnIconFaClass' => 'fas fa-list',
          'btnText' => 'List',
          'btnCheckMode' => 'listContactMessageMode',
      ])
    @endif

    @if (false)
    @if ($modes['displayContactMessageMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Contact message display',
          'btnCheckMode' => 'displayContactMessageMode',
      ])
    @endif
    @endif

    @if ($modes['displayContactMessageMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
          'btnBsColor' => 'bg-danger text-white',
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
     | Use the required component as per mode
     |
  --}}

  @if ($modes['listContactMessageMode'])
    @livewire ('contact-form.dashboard.contact-message-list')
  @elseif ($modes['displayContactMessageMode'])
    @livewire ('contact-form.dashboard.contact-message-display', ['contactMessage' => $displayingContactMessage,])
  @endif


</div>
