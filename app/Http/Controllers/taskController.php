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
      $employees = Employee::all();
      return view('agency.showTask', compact('task', 'employees'));
    }
    public function createTask(){
      $employees = Employee::all();
      return view('agency.createTask',compact('employees'));
    }
    public function storeTask(Request $request){
      $validateData = $request -> validate([
        "name" => 'required|max:30',
        "description" => 'required|max:60',
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
    public function editTask($id){
      $task = Task::findOrFail($id);
      $employees = Employee::all();
      return view('agency.editTask',compact('employees', 'task'));
    }
    public function updateTask(Request $request, $id){
      $validateData = $request -> validate([
        "name" => 'required|max:30',
        "description" => 'required|max:60',
        "deadLine" => 'required|date',
        "employee_id" => 'required'
      ]);
      Task::whereId($id) -> update($validateData);
      return redirect() -> route('showTask', $id);
    }
    public function deleteTask($id){
      $task = Task::findOrFail($id);
      $task -> delete();
      return redirect() -> route('home');
    }
}
