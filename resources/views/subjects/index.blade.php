@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Subjects') }}</div>

                <div class="card-body">
                    @if (Auth::user()->type=='admin')
                         <a href="{{ route('subjects.create') }}" class="btn btn-success float-end">{{ __('Add new Subject') }}</a>
                    @endif
                    <hr class="mt-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Semester') }}</th>
                                <th>{{ __('Lecturer') }}</th>
                                @if (Auth::user()->type=='admin')
                                    <th>{{ __('Actions') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->description }}</td>
                                <td>{{ $subject->semester }}</td>
                                <td>{{ $subject->lecturer->name }} {{ $subject->lecturer->surname }}</td>
                                @if (Auth::user()->type=='admin')
                                <td>
                                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
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
