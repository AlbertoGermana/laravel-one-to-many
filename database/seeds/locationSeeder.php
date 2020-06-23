<?php

use Illuminate\Database\Seeder;
use App\Task;
use App\Employee;
use App\Location;
class locationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Location::class, 15)
                  -> create()  //non salva nel db ma elabora
                  -> each(function($location){
                    $employees = Employee::inRandomOrder() -> take(rand(1,2)) -> get();
                    $location -> employees() -> attach($employees);

                  });
  }
}
