<div>


  {{-- Top tool bar --}}
  <x-toolbar-classic toolbarTitle="Newsletter subscription">

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('listMode')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'listMode',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>


  <!-- Flash message div -->
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
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
    @livewire ('vacancy-display', ['vacancy' => $displayingVacancy,])
  @elseif ($modes['updateMode'])
    @livewire ('vacancy-update', ['vacancy' => $updatingVacancy,])
  @endif


</div>
