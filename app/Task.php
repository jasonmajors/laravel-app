<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name'];

    /**
    * Get the user that owns the task.
    */
    public function user()
    {
    	return $this0>belongsTo(User::class);
    }
}
