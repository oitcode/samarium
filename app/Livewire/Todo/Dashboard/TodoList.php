<?php

namespace App\Livewire\Todo\Dashboard;

use App\Traits\ModesTrait;
use Livewire\Component;
use Livewire\WithPagination;
use App\Todo;

class TodoList extends Component
{
    use WithPagination;
    use ModesTrait;

    // public $todos = null;

    public $searchToolBoxShow = false;

    public $todoCount = 0;
    public $todoDisplayCount = 0;

    public $deletingTodo = null;


    /* Search items */
    public $searchData = [
        'id' => null,
        'title' => null,
        'startDate' => null,
        'endDate' => null,
        'status' => null,
    ];

    public $modes = [
        'deleteTodoMode' => false,
        'showOnlyPendingMode' => false,
        'showOnlyProgressMode' => false,
        'showOnlyDoneMode' => false,
        'showOnlyDeferredMode' => false,
        'showOnlyCancelledMode' => false,
        'showAllMode' => true,
        'delete' => false, 
        'confirmDeleteMode' => false, 
        'cannotDelete' => false, 
    ];

    protected $listeners = [
        'updateList' => 'mount',
        'deleteInstance',
        'exitConfirmDelete',
    ];

    public function render()
    {
        // $this->todoDisplayCount = $this->todoCount;;
        $this->todoDisplayCount = $this->todoCount;;

        $todos = null;

        // $this->todos = Todo::orderBy('todo_id', 'desc')->get();
        if ($this->modes['showAllMode']) {
            $todos = Todo::orderBy('todo_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyPendingMode']) {
            $todos = Todo::where('status', 'pending')->orderBy('todo_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyProgressMode']) {
            $todos = Todo::where('status', 'progress')->orderBy('todo_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyDoneMode']) {
            $todos = Todo::where('status', 'done')->orderBy('todo_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyDeferredMode']) {
            $todos = Todo::where('status', 'deferred')->orderBy('todo_id', 'desc')->paginate(5);
        } else if ($this->modes['showOnlyCancelledMode']) {
            $todos = Todo::where('status', 'cancelled')->orderBy('todo_id', 'desc')->paginate(5);
        } else {
            dd ('Whoops');
        }

        // $this->todoCount = count($this->todos);
        $this->todoCount = $todos->count();

        return view('livewire.todo.dashboard.todo-list')
            ->with('todos', $todos);
    }

    public function toggleSearchToolBox()
    {
        $this->searchToolBoxShow = !$this->searchToolBoxShow;
    }

    public function search()
    {
        /* Retreive all records if empty search */
        $emptySearch = true;
        foreach ($this->searchData as $key => $value) {
            if ($value !== null && $value != '') {
              $emptySearch = false;
              break;
            }
        }

        if ($emptySearch) {
            $this->todos = Todo::orderBy('publish_date', 'desc')
            ->orderBy('todo_id', 'desc')
            ->get();

            $this->todoCount = Todo::count();
            $this->todoDisplayCount = $this->todoCount;

            return;
        } 

        /* Apply search filter */

        /* Status */
        if ($this->searchData['status'] && $this->searchData['status'] != 'all') {
            $todos = Todo::where('status', $this->searchData['status']);
        }

        if ($this->searchData['status'] && $this->searchData['status'] == 'all') {
            $todos = new Todo;
        }

        $this->todos = $todos
            ->orderBy('publish_date', 'desc')
            ->orderBy('todo_id', 'desc');

        $this->todoCount = $this->todos->count();
        $this->todoDisplayCount = $this->todos->count();

        $this->todos = $this->todos->get();
    }

    /*
    public function confirmDeleteTodo(Todo $todo)
    {
        $this->deletingTodo = $todo;
        $this->enterMode('confirmDeleteMode');
    }
    */

    public function deleteInstance($todoId)
    {
        $todo = Todo::find($todoId);

        $todo->delete();

        session()->flash('message', 'Todo deleted');

        $this->exitConfirmDelete();
        $this->mount();
    }

    public function exitConfirmDelete()
    {
        $this->deletingTodo = null;
        $this->exitMode('confirmDeleteMode');
    }

    public function deleteTodo(Todo $todo)
    {
        $this->deletingTodo = $todo;

        $this->enterMode('delete');
    }

    public function deleteTodoCancel()
    {
        $this->deletingTodo = null;
        $this->exitMode('delete');
    }

    public function confirmDeleteTodo()
    {
        $this->deletingTodo->delete();

        $this->deletingTodo = null; 
        $this->exitMode('delete');
    }
}
