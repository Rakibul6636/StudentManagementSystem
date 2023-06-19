@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Profile</h2>
</div>
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <img class="profile_img" src="/image/rsz_student_icon.png" alt="">
            <h3>{{ $studentProfile->first_name }} {{ $studentProfile->last_name }} </h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">Student ID: </strong>{{ $studentProfile->student_id }}</p>
            <a href="{{ route('profile.edit', $studentProfile->id) }}" class="btn btn-danger btn-sm">Edit 
                                    Profile</a>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
          </div>
          <div class="card-body pt-0">
            <table class="table table-bordered">
              <tr>
                <th width="30%">Age</th>
                <td width="2%">:</td>
                <td>{{ $studentProfile->age }}</td>
              </tr>
              <tr>
                <th width="30%">Department	</th>
                <td width="2%">:</td>
                <td>{{ $departmentEnroll ? $departmentEnroll->name : 'No department enrolled' }}</td>
              </tr>
              <tr>
                <th width="30%">Subject(s)</th>
                <td width="2%">:</td>
                <td>@foreach($selectedSubjects as $subject)
                        <p> {{ $subject->name }}</p>
                             @endforeach</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection