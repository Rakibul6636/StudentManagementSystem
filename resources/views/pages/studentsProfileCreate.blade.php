@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Profile Create</h2>
</div>
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="/image/rsz_student_icon.png" alt="">
          </div>
          <div class="card-body">
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Information</h3>
          </div>
          <div class="card-body pt-0">
          <form name="newStudentForm" id="studentForm" method="post"
          action="{{ route('students.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
            <table class="table table-bordered">
              <tr>
                <th width="30%">First Name</th>
                <td width="2%">:</td>
                <td><input class="form-control" type="text" id="first_name" name="first_name"
                                                         autofocus required /></td>
              </tr>
              <tr>
                <th width="30%">Last Name</th>
                <td width="2%">:</td>
                <td><input class="form-control" type="text" id="last_name" name="last_name"
                                                        autofocus required /></td></td>
              </tr>
              <tr>
                <th width="30%">Age</th>
                <td width="2%">:</td>
                <td><input class="form-control" type="text" id="age" name="age"
                                                       autofocus required /></td></td>
              </tr>
              <tr>
                <th width="30%">Student ID</th>
                <td width="2%">:</td>
                <td><input class="form-control" type="text" id="student_id" name="student_id"
                                                         autofocus required /></td></td>
              </tr>
              <tr>
                <th width="30%">Department	</th>
                <td width="2%">:</td>
                              <td>                                      
                                          <select id="department" name="department_id" class="select2 form-select"
                                                        >
                                                        <option value="">Select Department</option>
                                                        @foreach($departments as $department)
                                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                                        @endforeach
                                          </select>
                              </td>
              </tr>
              <tr>
                <th width="30%">Subject(s)</th>
                <td width="2%">:</td>
                <td>
                <select id="subject" name="subject_ids[]" multiple class="select2 form-select">
                                                        <option value="">Select Subject</option>
                                                        @foreach($subjects as $subject)
    
    <option value="{{ $subject->id }}">
        {{ $subject->name }}
    </option>
@endforeach
                    </select>
                </td>
              </tr>

            </table>
            <button type="submit" class="btn btn-danger me-2">Create Student</button>
              <button type="reset" class="btn btn-outline-secondary">Cancel</button>

</form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection