<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // echo 'Task index <br>';
        // echo 'a = '. $request->get('a');
        $tasks = Task::all();
        foreach ($tasks as $task){
            echo $task->name;
         }
        return view('tasks.index', [
            'task'=>$tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "EDIT FUNCTION CREATE ";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $name = $request->get(key:'name');
          $content = $request->get(key:'content');

          $task = new Task();
          $task->name = $name;
          $task->content = $content;
          $task->status = 1;
          $task->deadline = '2021-5-19 21:50:00';
          $task->save();

          return redirect()->route(route:'task.index');

        //  $deadline = $request->get('deadline');

        //  dd($name);
        //  echo $name;
        //  echo $deadline;
        
        // $all = $request->except(['_token']);;
        // dd($all);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo "SHOW ID = " .$id;
        $task = Task::find($id);
        dd($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "EDIT ID = " .$id;
    }

    public function complete($id)
    {
        echo "COMPLETE TASK ID = " .$id;
    }

    public function recomplete($id)
    {
        echo "RECOMPLETE TASK ID = " .$id;
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $all =  "DELETE task = " .$id;
        // dd($all);
        $task = Task::find($id);
        $task->delete();
        return redirect()->route(route:'task.index');
    }
}
