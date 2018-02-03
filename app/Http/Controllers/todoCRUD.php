<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Todo;
use Illuminate\Http\Request;

class todoCRUD extends Controller
{
    //
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add(Request $request){
        $user = Auth::User();
        $task = new Todo();
        if ($request->isMethod('post')) {
            $task['Task Name'] = $request->input('name');
            $task['Task Description'] = $request->input('desc');
            $task->Deadline = $request->input('dead');
            $task->user_id = $user->id;
            $task->save();
            return view('Todo.add')->withTitle('Saved');

        }
        return view('Todo.add');
    }
    public function view(){


      return view('Todo.view');

    }

    public function delete($id){
        $task= Todo::findorfail($id);
        $task->delete();
        return redirect('view');
    }

    public function edit(Request $request,$id){
        $task = Todo::findorfail($id);

           if ($request->isMethod('post')) {
               $task['Task Name'] = $request->input('name');
               $task['Task Description'] = $request->input('desc');
               $task->Deadline = $request->input('dead');
               $task->save();
               return view('Todo.view')->withTitle('Saved');
           }else{
                $tasks = array('todo'=> $task);
               return view('Todo.edit',$tasks);

           }
    }
}
