<?php

namespace App\Livewire;

use App\Models\ToDo;
use Livewire\Component;

class TodoListGroup extends Component
{
    public $todos = null;

    public function mount()
    {
        $this->todos = ToDo::with("group")->get();
    }

    public function render()
    {
        return view('livewire.todo-list-group');
    }
}
