<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // Add the HasFactory trait to allow for model factories
    use HasFactory;

    // Define the fillable fields for the model
    protected $fillable = ['first_name', 'last_name', 'student_id', 'age'];

    // Define the relationship between students and subjects
    public function subjects()
    {
        // Define a many-to-many relationship with the Subject model using the student_subject table
        return $this->belongsToMany(Subject::class, 'student_subject');
    }

    // Define the relationship between students and departments
    public function departments()
    {
        // Define a many-to-one relationship with the Department model
        return $this->belongsTo(Department::class);
    }
}
