<?php

namespace App\Livewire;

use App\Models\ToDo;
use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class TodoListGroup extends Component
{

    public function mount() {}

    #[On("add-todo")]
    public function add($title)
    {
        TodoList::create([
            "title" => $title,
            "user_id" => Auth::user()->id,
        ]);
    }

    public function remove($id)
    {
        TodoList::destroy($id);
    }

    public function render()
    {
        $todo_list = TodoList::with([
            "todos"
        ])->where("user_id", "=", Auth::user()->id)->get();
        return view('livewire.todo-list-group', compact("todo_list"));
    }
}
