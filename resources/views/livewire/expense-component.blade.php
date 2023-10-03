<div class="p-3 p-md-0">
  <!-- Menu tool bar -->

  {{-- Show in bigger screens --}}
  <x-toolbar-classic toolbarTitle="Expense">
    @include ('partials.dashboard.spinner-button')

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('create')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'New',
        'btnCheckMode' => 'create',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('list')",
        'btnIconFaClass' => 'fas fa-list',
        'btnText' => 'List',
        'btnCheckMode' => 'list',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('createCategory')",
        'btnIconFaClass' => 'fas fa-plus-circle',
        'btnText' => 'Category',
        'btnCheckMode' => 'createCategory',
    ])

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "enterMode('report')",
        'btnIconFaClass' => 'fas fa-paper-plane',
        'btnText' => 'Report',
        'btnCheckMode' => 'report',
    ])

    @if ($modes['display'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('display')",
          'btnIconFaClass' => 'fas fa-circle',
          'btnText' => 'Expense display',
          'btnCheckMode' => 'displaye',
      ])
    @endif

    @include ('partials.dashboard.tool-bar-button-pill', [
        'btnClickMethod' => "clearModes",
        'btnIconFaClass' => 'fas fa-refresh',
        'btnText' => '',
        'btnCheckMode' => '',
    ])

  </x-toolbar-classic>

  <!-- ./Menu tool bar -->

  {{-- Flash message div --}}
  @if (session()->has('message'))
    <div class="p-2">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle mr-3"></i>
        {{ session('message') }}
        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  @endif


  {{-- Use required component as per mode --}}

  @if ($modes['create'])
    @if (true)
    @livewire ('expense-create')
    @endif
  @elseif ($modes['list'])
    @livewire ('expense-list')
  @elseif ($modes['display'])
    @if ($displayingExpense->creation_status == 'progress')
      @livewire ('expense-create', [
          'createNew' => false,
          'expense' => $displayingExpense,
      ])
    @else
      @livewire ('expense-display', ['expense' => $displayingExpense,])
    @endif
  @elseif ($modes['report'])
    @livewire ('expense-report')
  @elseif ($modes['createCategory'])
    @livewire ('expense-category-create')
  @endif

</div>
