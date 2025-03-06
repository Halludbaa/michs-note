<?php

namespace App\Livewire;

use App\Models\TodoList;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class MakeTodoList extends Component
{
    #[Validate("required|string|max:100")]
    public $title = "";

    public function add()
    {
        $this->validate();
        $this->dispatch("add-todo", $this->pull("title"));
    }
    public function render()
    {
        return view('livewire.make-todo-list');
    }
}
