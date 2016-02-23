<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Task;

class TaskPolicy
{
    use HandlesAuthorization;

    /** 
    * Check if the user can delete the given task.
    *
    * @param User $user
    * @param Task $task
    * @return boolean
    */
    public function destroy(User $user, Task $task)
    {
        return $user->id == $task->id;
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
