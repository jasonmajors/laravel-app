<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

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
        return $user->id === $task->user_id;
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
