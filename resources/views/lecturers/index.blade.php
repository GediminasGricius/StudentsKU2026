@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('lecturers.lecturers') }}</div>

                <div class="card-body">
                    @if (Auth::user()->type=='admin')
                        <a href="{{ route('lecturers.create') }}" class="btn btn-success float-end">{{ __('lecturers.add_new') }}</a>
                    @endif
                    <hr class="mt-5">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('lecturers.name') }}</th>
                                <th>{{ __('lecturers.surname') }}</th>
                                <th>{{ __('lecturers.birth_date') }}</th>
                                <th>{{ __('lecturers.phone') }}</th>
                                <th>{{ __('lecturers.email') }}</th>
                                <th>{{ __('lecturers.subjects') }}</th>
                                @if (Auth::user()->type=='admin')
                                    <th>{{ __('lecturers.actions') }}</th>
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
                                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-info">{{ __('lecturers.edit') }}</a>
                                    <a href="{{ route('lecturers.delete', $lecturer->id) }}" class="btn btn-danger">{{ __('lecturers.delete') }}</a>
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
