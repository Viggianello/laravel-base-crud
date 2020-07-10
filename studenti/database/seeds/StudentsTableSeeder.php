<?php

use Illuminate\Database\Seeder;
use App\Student;
use Faker\Generator as Faker;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(Faker $faker)
     {
         for ($i=0; $i < 10; $i++) {
             $new_student = new Student();
             $new_student->name = $faker->word;
             $new_student->lastname = $faker->word;
             $new_student->matricola = $faker->md5;
             $new_student->email = $faker->email;
             $new_student->save();
         }
     }
}
