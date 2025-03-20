<?php

namespace App\Livewire;

use App\Models\ToDo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ShowTodoList extends Component
{
    public string $id = "";


    #[Validate("required")]
    public string $title = "";

    #[On("add-todos")]
    public function add($task)
    {
        ToDo::create([
            "task" => $task,
            "todo_list_id" => $this->id,
        ]);
    }

    #[On("deleted")]
    public function deleted()
    {
        return;
    }

    public function saved()
    {
        $this->validate();
        if ($this->title == "") {
            return;
        }
        TodoList::where("id", "=", $this->id)->update(["title" => $this->title]);
    }

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $todo_list = TodoList::with("todos")->where("id", "=", $this->id)->where("user_id", "=", Auth::user()->id)->first();
        $todos = $todo_list->todos ?? [];
        $this->title = $todo_list->title;
        return view('livewire.show-todo-list', compact('todos', 'todo_list'));
    }
}
