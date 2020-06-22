<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Employee;
class taskController extends Controller
{
    public function index(){
      $tasks = Task::all();
      return view('home', compact('tasks'));
    }
    public function showTask($id){
      $task = Task::findOrFail($id);
      return view('agency.showTask', compact('task'));
    }
    public function createTask(){
      $employees = Employee::all();
      return view('agency.createTask',compact('employees'));
    }
    public function storeTask(Request $request){
      $validateData = $request -> validate([
        "name" => 'required|string|max:30',
        "description" => 'required|string|max:60',
        "deadLine" => 'required|date',
        "employee_id" => 'required'
      ]);
      $taskDaCreare = new Task;
      $taskDaCreare -> name = $validateData['name'];
      $taskDaCreare -> description = $validateData['description'];
      $taskDaCreare -> deadLine = $validateData['deadLine'];
      $taskDaCreare -> employee_id = $validateData['employee_id'];
      $taskDaCreare -> save();
      return redirect() -> route('home')
                        -> withSuccess('Task ' . $taskDaCreare['name'] . ' creato!');
    }

}
