<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Employee;
class taskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Task::class, 15)
                    -> make()  //non salva nel db ma elabora
                    -> each(function($task){
                      $employee = Employee::inRandomOrder() -> first();
                      $task -> employee() -> associate($employee);
                      $task -> save();
                    });
    }
}
