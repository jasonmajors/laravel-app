<?php

namespace App\Http\Controllers;

use App\Task;
use App\Repositories\TaskRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class TaskController extends Controller
{
    /**
    * The task repository instance.
    *
    * @var TaskRepository
    */
    protected $tasks;

    /**
    * Create a new controller instance.
    *
    * @param TaskRepository $tasks
    * @return void
    */
    public function __construct(TaskRepository $tasks)
    {
        // Require authentication to use this controllerbnzx
    	$this->middleware('auth');
        $this->tasks = $tasks;
    }
    
    /**
    * Display a list of a user's tasks
    *
    * @param Request $request
    * @return Response
    */
    public function index(Request $request)
    {
    	return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    /**
    * Create a task
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:255',
    	]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }
}
