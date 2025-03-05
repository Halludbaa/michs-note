<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToDo extends Model
{
    use HasUuids, HasFactory;

    protected $guarded = ["id", "created_at", "updated_at"];


    public function group()
    {
        return $this->belongsTo(Group::class, "group_id", "id");
    }

    public function todo_list()
    {
        return $this->belongsTo(TodoList::class, "todo_list_id", "id");
    }
}
