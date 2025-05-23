<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasUuids;
    protected $fillable = ["name", "user_id"];

    public function todo()
    {
        return $this->hasMany(ToDo::class, "group_id", "id");
    }
}
