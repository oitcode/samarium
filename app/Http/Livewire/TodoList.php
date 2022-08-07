<?php

namespace App\Http\Livewire;

use App\Traits\ModesTrait;

use Livewire\Component;

use App\Todo;

class TodoList extends Component
{
    use ModesTrait;

    public $todos = null;

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
        'confirmDeleteMode' => false,
    ];

    protected $listeners = [
        'updateList' => 'mount',
        'deleteInstance',
        'exitConfirmDelete',
    ];

    public function mount()
    {
        $this->todos = Todo::orderBy('created_at', 'DESC')->get();

        $this->todoCount = count($this->todos);
        $this->todoDisplayCount = $this->todoCount;;
    }

    public function render()
    {
        return view('livewire.todo-list');
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

    public function confirmDeleteTodo(Todo $todo)
    {
        $this->deletingTodo = $todo;
        $this->enterMode('confirmDeleteMode');
    }

    public function deleteInstance($todoId)
    {
        $todo = Todo::find($todoId);

        $todo->delete();

        session()->flash('message', 'Todo deleted');

        $this->mount();
    }

    public function exitConfirmDelete()
    {
        $this->deletingTodo = null;
        $this->exitMode('confirmDeleteMode');
    }
}
