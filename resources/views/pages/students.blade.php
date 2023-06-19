@extends('layouts.app')

@section('content')
<div class="d-flex p-2 m-2 bg-danger bg-gradient text-light font-weight-bold justify-content-center h-100"
    style="font: weight 500px;;">
    <h2>Students</h2>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header position-relative">
                    <div class="form-control-group pull-right">
                    <a href="{{ route('students.export') }}" class="btn btn-danger btn-sm">Export CSV</a>
                    </div>
                </div>

                <div class="card-body">

                    @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                    @endif
                    @php
                    $sl=1;
                    @endphp

                    <table class="table table-hover">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Age</th>
                            <th>Member Profile</th>
                        </tr>
                        @forelse ($students as $student)
                        <tr>
                            <td>{{$sl}}</td>
                            <td>{{ $student->student_id }}</td>
                            <td>{{ $student->first_name }}</td>
                            <td>{{ $student->last_name }}</td>
                            <td>{{ $student->age }}</td>

                            <td><a href="{{ route('profile.show', $student->id) }}" class="btn btn-danger btn-sm">View
                                    Profile</a></td>
                        </tr>
                        @php
                        $sl=$sl + 1;
                        @endphp
                        @empty
                        <tr>
                            <td colspan="4">No users found.</td>
                        </tr>

                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $students->links() }}
        </div>
    </div>

</div>
@endsection