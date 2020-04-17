<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('welcome')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(explode(' ', request('task'))) >=2  ){


            $objTask = new Task();
            $task = $request['task'];

            $objTask->note = $task;
            $objTask->save();

            return redirect()->back()->with('success_added', 'Item successfully added');
        }
        else if( request('task') === null ){
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $task = Task::find($id);

        

        return view('tasks.edit')->with('taskUnderEdit', $task);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $task = Task::find($id);
            
        
        $task->note=$request->updatedTaskName;
        if(count(explode(' ', request('updatedTaskName'))) >=2  ){
            
            $task->save();
            return redirect('/')->with('success_updated', 'Item successfully updated');
        }
        else if( request('updatedTaskName') === null ){
            return redirect()->back()->with('field__empty', 'Field is empty');

        }
        else{
            $data = request()->validate([
                'coun_w' => 'required'
            ]);
        }
        
        return redirect('/')->with('success_updated', 'Item successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        $task = Task::where('id', $id)->first();

        $task->delete();
        return redirect()->back()->with('success_deleted', 'Item successfully deleted');

    }
}
