<div>


  {{--
     |
     | Top tool bar
     |
  --}}

  <x-toolbar-classic toolbarTitle="Newsletter subscription">

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @if ($modes['displayMode'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('displayMode')",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Newsletter subscription display',
          'btnCheckMode' => 'displayMode',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-times',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

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

  @if ($modes['createMode'])
    Whoopsie
  @elseif ($modes['listMode'])
    @livewire ('newsletter-subscription.dashboard.newsletter-subscription-list')
  @elseif ($modes['displayMode'])
    @livewire ('newsletter-subscription.dashboard.newsletter-subscription-display', ['newsletterSubscription' => $displayingNewsletterSubscription,])
  @endif


</div>
