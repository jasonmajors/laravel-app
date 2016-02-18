<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    
    /**
    * Display a list of a user's tasks
    *
    * @param Request $request
    * @return Response
    */
    public function index(Request $request)
    {
    	return view('tasks.index');
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
