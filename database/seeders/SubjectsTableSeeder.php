<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $subjects = ['Computer Fundamental', 'Discrete Math', 'Database', 'OOP', 'CPP', 'Python', 'Java', 'Compiler Design', 'Linear Algebra', 'Geometry'];

       foreach ($subjects as $name) {
           Subject::create([
               'name' => $name
           ]);
    }
    }
}
