<?php

namespace App\Livewire;

use App\Models\ToDo;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TodoList extends Component
{
    #[Validate("required")]
    public $id = "";

    #[Validate("required")]
    public $task = "";

    public $status = true;



    public function mount($task, $id, $status)
    {
        $this->id = $id;
        $this->status = $status != "pending" ? true : false;
        $this->task = $task;
    }

    public function save()
    {
        $this->validate();
        $todo = ToDo::where("id", "=", $this->id)->update([
            "task" => $this->task,
            "status" => $this->status ? "completed" : "pending",
        ]);
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
