<div class="p-3-rm p-md-0">


  {{-- Toolbar --}}
  <x-toolbar-classic toolbarTitle="Expense">

    @include ('partials.dashboard.spinner-button')

    @if ($modes['list'] || !array_search(true, $modes))
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "enterMode('create')",
          'btnIconFaClass' => 'fas fa-plus-circle',
          'btnText' => 'New',
          'btnCheckMode' => 'create',
      ])
    @endif

    @if ($modes['display'])
      @include ('partials.dashboard.tool-bar-button-pill', [
          'btnClickMethod' => "clearModes",
          'btnIconFaClass' => 'fas fa-times',
          'btnText' => '',
          'btnCheckMode' => '',
      ])
    @endif

  </x-toolbar-classic>


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


  {{--
     |
     | Use required component as per mode
     |
  --}}

  @if ($modes['create'])
    @livewire ('expense.expense-create')
  @elseif ($modes['list'])
    @livewire ('expense.expense-list')
  @elseif ($modes['display'])
    @if ($displayingExpense->creation_status == 'progress')
      @livewire ('expense.expense-create', [
          'createNew' => false,
          'expense' => $displayingExpense,
      ])
    @else
      @livewire ('expense.expense-display', ['expense' => $displayingExpense,])
    @endif
  @elseif ($modes['report'])
    @livewire ('expense.expense-report')
  @elseif ($modes['createCategory'])
    @livewire ('expense.expense-category-create')
  @else
    @livewire ('expense.expense-list')
  @endif


</div>
