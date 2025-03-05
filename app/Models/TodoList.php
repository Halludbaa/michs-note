<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TodoList extends Model
{
    /** @use HasFactory<\Database\Factories\TodoListFactory> */
    use HasFactory, HasUuids;
    protected $table = "todo_list";

    protected $guarded = ["id", "created_at", "updated_at"];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    public function todos()
    {
        return $this->hasMany(ToDo::class, "todo_list_id", "id");
    }
}
