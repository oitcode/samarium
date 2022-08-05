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

    public $todoCount = 0;
    public $todoDisplayCount = 0;


    protected $listeners = [
        'updateList' => 'mount',
    ];

    public function mount()
    {
        $this->todos = Todo::where('status', 'pending');

        $this->todoCount = $this->todos->count();
        $this->todoDisplayCount = $this->todoCount;;

        $this->todos = $this->todos->orderBy('created_at', 'DESC')->get();
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
}
