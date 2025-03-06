<?php

namespace App\Livewire;

use App\Models\ToDo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowTodoList extends Component
{
    public string $id = "";

    #[On("add-todos")]
    public function add($task)
    {
        ToDo::create([
            "task" => $task,
            "todo_list_id" => $this->id,
        ]);
    }

    // #[On("saved")]
    // public function saved() {}
    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $todos = TodoList::with("todos")->where("id", "=", $this->id)->where("user_id", "=", 1)->first();
        $todos = $todos->todos;
        return view('livewire.show-todo-list', compact('todos'));
    }
}
