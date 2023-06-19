<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the students associated with the department.
     */
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
