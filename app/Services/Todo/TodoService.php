<?php

namespace App\Services\Todo;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Todo\Todo;

class TodoService
{
    /**
     * Get paginated list of todos
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPaginatedTodos(int $perPage = 5): LengthAwarePaginator
    {
        return Todo::orderBy('todo_id', 'DESC')->paginate($perPage);
    }

    /**
     * Create a new todo
     *
     * @param array $data
     * @return Todo
     */
    public function createTodo(array $data): Todo
    {
        $todo = Todo::create($data);

        return $todo;
    }

    /**
     * Check if a todo can be deleted.
     *
     * @param int $todo_id
     * @return void
     */
    public function canDeleteTodo(int $todo_id): bool
    {
        $todo = Todo::find($todo_id);

        // Todo

        return true;
    }

    /**
     * Delete todo
     *
     * @param int $todo_id
     * @return void
     */
    public function deleteTodo(int $todo_id): void
    {
        $todo = Todo::find($todo_id);

        $todo->delete();
    }

    /**
     * Get total todo count
     *
     * @return int
     */
    public function getTotalTodoCount(): int
    {
        return Todo::count();
    }
}
