<div>


  {{--
     |
     | Top toolbar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Contact Message">

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listContactMessageMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listContactMessageMode',
    ])

    @if ($modes['displayContactMessageMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Contact message display',
          'btnCheckMode' => 'displayContactMessageMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

    @include ('partials.dashboard.spinner-button')

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
