<div>


  {{-- Top toolbar --}}
  <x-toolbar-classic toolbarTitle="Contact Message">

    @include ('partials.dashboard.spinner-button')

    @if (false)
    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createContactMessageMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Create',
        'btnCheckMode' => 'createContactMessageMode',
    ])
    @endif

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
     | Use the required component as per mode
     |
  --}}

  @if ($modes['listContactMessageMode'])
    @livewire ('contact-form.dashboard.contact-message-list')
  @elseif ($modes['displayContactMessageMode'])
    @livewire ('contact-form.dashboard.contact-message-display', ['contactMessage' => $displayingContactMessage,])
  @endif


</div>
