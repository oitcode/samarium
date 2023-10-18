<div>


  {{-- Top tool bar --}}
  <x-toolbar-classic toolbarTitle="Vacancy">

    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createMode')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'createMode',
    ])

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


  {{-- Use the required component as per mode --}}
  @if ($modes['createMode'])
    @livewire ('vacancy.dashboard.vacancy-create')
  @elseif ($modes['listMode'])
    @livewire ('vacancy.dashboard.vacancy-list')
  @elseif ($modes['displayMode'])
    @livewire ('vacancy-display', ['vacancy' => $displayingVacancy,])
  @elseif ($modes['updateMode'])
    @livewire ('vacancy-update', ['vacancy' => $updatingVacancy,])
  @endif


</div>
