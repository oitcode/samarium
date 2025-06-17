<?php

namespace App\Livewire\Todo\Dashboard;

use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\ModesTrait;
use App\Services\Todo\TodoService;
use App\Models\Todo\Todo;

/**
 * TodoList Component
 * 
 * This Livewire component handles the listing of todos.
 * It also handles deletion of todos.
 */
class TodoList extends Component
{
    use WithPagination;
    use ModesTrait;

    /**
     * Todos per pagination
     *
     * @var int
     */
    public $perPage = 5;

    /**
     * Total count of todos
     *
     * @var int
     */
    public $totalTodoCount;

    /**
     * Todo which needs to be deleted
     *
     * @var Todo
     */
    public $deletingTodo;

    /**
     * Component display modes
     *
     * @var array
     */
    public $modes = [
        'deleteTodoMode' => false,
        'showOnlyPendingMode' => false,
        'showOnlyProgressMode' => false,
        'showOnlyDoneMode' => false,
        'showOnlyDeferredMode' => false,
        'showOnlyCancelledMode' => false,
        'showAllMode' => true,

        'confirmDelete' => false, 
        'cannotDelete' => false, 
    ];

    /**
     * Render the component
     *
     * @return \Illuminate\View\View
     */
    public function render(TodoService $todoService): View
    {
        $this->totalTodoCount = $todoService->getTotalTodoCount();

        $todos = null;

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
            // Todo
        }

        return view('livewire.todo.dashboard.todo-list', [
            'todos' => $todos,
        ]);
    }

    // public function toggleSearchToolBox(): void
    // {
    //     $this->searchToolBoxShow = !$this->searchToolBoxShow;
    // }

    // public function search(): void
    // {
    //     /* Retreive all records if empty search */
    //     $emptySearch = true;
    //     foreach ($this->searchData as $key => $value) {
    //         if ($value !== null && $value != '') {
    //           $emptySearch = false;
    //           break;
    //         }
    //     }

    //     if ($emptySearch) {
    //         $this->todos = Todo::orderBy('publish_date', 'desc')
    //         ->orderBy('todo_id', 'desc')
    //         ->get();

    //         $this->todoCount = Todo::count();
    //         $this->todoDisplayCount = $this->todoCount;

    //         return;
    //     } 

    //     /* Apply search filter */

    //     /* Status */
    //     if ($this->searchData['status'] && $this->searchData['status'] != 'all') {
    //         $todos = Todo::where('status', $this->searchData['status']);
    //     }

    //     if ($this->searchData['status'] && $this->searchData['status'] == 'all') {
    //         $todos = new Todo;
    //     }

    //     $this->todos = $todos
    //         ->orderBy('publish_date', 'desc')
    //         ->orderBy('todo_id', 'desc');

    //     $this->todoCount = $this->todos->count();
    //     $this->todoDisplayCount = $this->todos->count();

    //     $this->todos = $this->todos->get();
    // }

    /**
     * Confirm if user really wants to delete a todo
     *
     * @return void
     */
    public function confirmDeleteTodo(int $todo_id, TodoService $todoService): void
    {
        $this->deletingTodo = Todo::find($todo_id);

        if ($todoService->canDeleteTodo($todo_id)) {
            $this->enterModeSilent('confirmDelete');
        } else {
            $this->enterModeSilent('cannotDelete');
        }
    }

    /**
     * Cancel todo delete
     *
     * @return void
     */
    public function cancelDeleteTodo(): void
    {
        $this->deletingTodo = null;
        $this->exitMode('confirmDelete');
    }

    /**
     * Turn off the mode that shows that an todo cannot be deleted
     *
     * @return void
     */
    public function cancelCannotDeleteTodo(): void
    {
        $this->deletingTodo = null;
        $this->exitMode('cannotDelete');
    }

    /**
     * Delete todo
     *
     * @return void
     */
    public function deleteTodo(TodoService $todoService): void
    {
        $todoService->deleteTodo($this->deletingTodo->todo_id);
        $this->deletingTodo = null;
        $this->exitMode('confirmDelete');
    }

}
