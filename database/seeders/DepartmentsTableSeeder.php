<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['English', 'Mathematics', 'History', 'Physics', 'Biology', 'Chemistry', 'Computer Science', 'Art', 'Music', 'Geography'];

        foreach ($departments as $name) {
            Department::create([
                'name' => $name
            ]);
    }
}
}
