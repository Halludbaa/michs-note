<?php

namespace App\Livewire;

use App\Models\ToDo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class TodoListGroup extends Component
{
    public $todo_list = null;

    public function mount()
    {
        $this->todo_list = TodoList::with([
            "todos"
        ])->where("user_id", "=", Auth::user()->id)->get();
    }

    #[On("add-todo")]
    public function add($title)
    {
        TodoList::create([
            "title" => $title,
            "user_id" => Auth::user()->id,
        ]);
    }

    public function remove()
    {
        dd("hello");
    }

    public function render()
    {
        return view('livewire.todo-list-group', [
            "todo_list" => $this->todo_list,
        ]);
    }
}
