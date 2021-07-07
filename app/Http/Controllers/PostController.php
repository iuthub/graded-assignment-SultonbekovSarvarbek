<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Show the form to create a new blog post.
     *
     * @return Response
     */
    public function create()
    {
      

        return view('tasks.index');
    }
    
    public function tasks(){

        // $lists = [
        //     'list 1',
        //     'list 2',
        //     'list 3',
        //     'list 4',
        //     'list 5',
        // ];

        $tasks =\App\Task::all();

        // dd();
        return view('tasks.index', compact ('tasks'));

    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        if(count(explode(' ', request('name'))) >=2  ){
         
            $task= new \App\Task();

            $task->name = request('name');
            $task->save();

            return redirect()->back()->with('success_added', 'Item successfully added');
        }
        else if( request('name') === null ){
            return redirect()->back()->with('field__empty', 'Field is empty');
        }
        else
        {   
            
            $data = request()->validate([
                'coun_w' => 'required'
            ]);
            // return redirect()->back()->with('success_added', 'Item successfully added');

        }
        return redirect()->back();
    }


    public function destroy($id)
    {
    $task = Task::find($id);
    $task->delete();
    return Redirect::back()->with('message', "Task has been deleted");
    }
    
}
