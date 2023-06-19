<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Support\Facades\Response as ResponseFacade;

class StudentsController extends Controller
{
    public function students()
    {
      $students= Student::where([

        ['created_at', '!=', 'null']

    ])->paginate(10);
       return view('/pages/students',compact('students'));

    }

    public function show(\App\Models\Student $student)
    {
        $studentProfile = Student::find($student->id);
        $departmentEnroll = Department::find($studentProfile->department_id);
        $selectedSubjects = Subject::whereHas('students', function ($query) use ($student) {
            $query->where('students.id', $student->id);
        })->get();
        return view('/pages/studentsProfile',compact('studentProfile','departmentEnroll','selectedSubjects'));
    }

    public function edit(\App\Models\Student $student)
    {      
        $studentProfile = Student::find($student->id);
        $departments = Department::all();
        $subjects = Subject::all();
        $departmentEnroll = $student->department;
        $selectedSubjects = Subject::whereHas('students', function ($query) use ($student) {
            $query->where('students.id', $student->id);
        })->get();
        return view('/pages/studentsProfileEdit',compact('studentProfile','departmentEnroll','departments','subjects','selectedSubjects'));
    }


    public function update(\App\Models\Student $student)
    {
      $student = Student::find($student->id);
      $student->first_name = request()->input('first_name');
      $student->last_name = request()->input('last_name');
      $student->age = request()->input('age');
      $student->student_id = request()->input('student_id');
      $student->department_id = request()->input('department');

      $student->save();


      $department = Department::find(request()->input('department_id'));
      $student->department_id = $department ? $department->id : null;
      $student->save();

      $subjectIds = request()->input('subject_ids')??[];
      $subjects = Subject::whereIn('id', $subjectIds)->get();
      $student->subjects()->detach();
      $student->subjects()->attach($subjects);
       
        return redirect("/profile/{$student->id}");
    }

public function export()
{
    $students = Student::all();

    $file_name = 'students.csv';
    $file_path = storage_path('app/' . $file_name);

    $headers = array(
        "Content-Type" => "text/csv",
        "Content-Disposition" => "attachment; filename=$file_name",
    );

    $file = fopen($file_path, "w");

    fputcsv($file, array('First Name', 'Last Name', 'Student ID', 'Age', 'Department', 'Subjects'));

    foreach ($students as $student) {
        $selectedSubjects = $student->subjects()->pluck('name')->implode(', ');
        $departmentEnroll = Department::find($student->department_id);

        fputcsv($file, [
            $student->first_name,
            $student->last_name,
            $student->student_id,
            $student->age,
            $departmentEnroll ? $departmentEnroll->name : 'Not Enrolled Yet',
            $selectedSubjects,
        ]);
    }

    fclose($file);

    return ResponseFacade::download($file_path, $file_name, $headers);
}


public function create()
{
    $departments = Department::all();
    $subjects = Subject::all();
    return view('/pages/studentsProfileCreate', compact('departments', 'subjects'));
}

public function store(Request $request)
{   
    $validatedData = $request->validate([
        'first_name' => '',
        'last_name' => '',
        'student_id' => '',
        'age' => '',
        'department_id' => '',
        'subject_id' => '',
        'subject_id.*' => '',
    ]);
    $student = new Student();
    $student->first_name = $validatedData['first_name'];
    $student->last_name = $validatedData['last_name'];
    $student->student_id = $validatedData['student_id'];
    $student->age = $validatedData['age'];
    $student->department_id = $validatedData['department_id'];
    $student->save();

    $student->subjects()->attach($validatedData['subject_id']??[]);

    return redirect("/profile/{$student->id}");
}


public function delete()
{
  $students= Student::where([

    ['created_at', '!=', 'null']

])->paginate(10);
   return view('/pages/studentsProfileDelete',compact('students'));

}

public function destroy(Student $student)
{
    $student->delete();
    return redirect()->route('students.delete')->with('success', 'Student deleted successfully.');
}


}
