@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lecturers</div>

                <div class="card-body">
                    @if (Auth::user()->type=='admin')
                        <a href="{{ route('lecturers.create') }}" class="btn btn-success float-end">Add new Lecturer</a>
                    @endif
                    <hr class="mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Birth date</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Subjects</th>
                                @if (Auth::user()->type=='admin')
                                    <th>Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lecturers as $lecturer)
                            <tr>
                                <td>{{ $lecturer->name }}</td>
                                <td>{{ $lecturer->surname }}</td>
                                <td>{{ $lecturer->birthday }}</td>
                                <td>{{ $lecturer->phone }}</td>
                                <td>{{ $lecturer->email }}</td>
                                <td>
                                    @foreach($lecturer->subjects as $subject)
                                        <div>{{ $subject->name }}</div>

                                    @endforeach
                                </td>
                                @if (Auth::user()->type=='admin')
                                <td>
                                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-info">Edit</a>
                                    <a href="{{ route('lecturers.delete', $lecturer->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
