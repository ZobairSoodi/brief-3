<?php

namespace App\Http\Controllers;

use App\Models\Brief;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    function show_tasks($id_brief){
        $data = Brief::where("id_brief", $id_brief)->first();
        $data->tasks;
        // return $brief;
        return view('task/tasks', compact('data'));
    }

    function get_tasks($id_task){
        $data = Task::where("id_task", $id_task)->first();
        $data->tasks;
        return [$data];
    }

    function add_task(Request $req, $id_brief){
        $task = new Task();
        $task->title_task = $req->title_task;
        $task->descrip_task = $req->descrip_task;
        $task->date_from_task = $req->date_from_task;
        $task->date_to_task = $req->date_to_task;
        $task->id_brief = $id_brief;
        $task->save();
        return redirect(route('show-tasks', ['id_brief'=>$task->id_brief]));
    }

    function edit_task(Request $req, $id_task){
        $task = Task::where("id_task", $id_task)->first();
        $task->title_task = $req->title_task_e;
        $task->descrip_task = $req->descrip_task_e;
        $task->date_from_task = $req->date_from_task_e;
        $task->date_to_task = $req->date_to_task_e;
        $task->save();
        return redirect(route('show-tasks', ['id_brief' => $task->id_brief]));
    }

    function delete_task($id_task){
        $task = Task::where("id_task", $id_task)->first();
        $id_brief = $task->id_brief;
        $task->delete();
        return redirect(route('show-tasks', ['id_brief' => $id_brief]));
    }
}
