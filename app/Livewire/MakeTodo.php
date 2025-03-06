<?php

namespace App\Livewire;

use Livewire\Component;

class MakeTodo extends Component
{

    public string $task = "";

    public function add()
    {
        $this->dispatch("add-todos", $this->pull("task"));
    }
    public function render()
    {
        return view('livewire.make-todo');
    }
}
