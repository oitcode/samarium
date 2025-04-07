<div>
  
  <x-base-component moduleName="Expense">

    {{--
    |
    | Toolbar.
    |
    --}}

    <x-slot name="toolbar">
      @include ('partials.dashboard.spinner-button')

      @if ($modes['list'] || !array_search(true, $modes))
        @include ('partials.dashboard.tool-bar-button-pill', [
            'btnClickMethod' => "enterMode('create')",
            'btnIconFaClass' => 'fas fa-plus-circle',
            'btnText' => 'New',
            'btnCheckMode' => 'create',
        ])
      @endif

      @if ($modes['list'] || !array_search(true, $modes))
        <x-toolbar-dropdown-component toolbarButtonDropdownId="expenseToolbarDropdown">
          <x-toolbar-dropdown-item-component clickMethod="enterMode('search')">
            Search
          </x-toolbar-dropdown-item-component>
        </x-toolbar-dropdown-button>
      @endif
    </x-slot>

    <div>

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
  </x-base-component>

</div>
