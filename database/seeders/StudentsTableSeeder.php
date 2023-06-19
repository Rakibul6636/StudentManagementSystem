<?php
namespace App\Models;
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Student::factory(100000)->create();
    }
}
