@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('lecturers.lecturers') }}</div>

                <div class="card-body">

                        <a href="{{ route('lecturers.create') }}" class="btn btn-success float-end">{{ __('lecturers.add_new') }}</a>
                    
                    <hr class="mt-5">

                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>{{ __('lecturers.name') }}</th>
                                <th>{{ __('lecturers.surname') }}</th>
                                <th>{{ __('lecturers.birth_date') }}</th>
                                <th>{{ __('lecturers.phone') }}</th>
                                <th>{{ __('lecturers.email') }}</th>
                                <th>{{ __('lecturers.subjects') }}</th>
                                @if (Auth::user()->type=='admin')
                                    <th style="width: 150px;">{{ __('lecturers.actions') }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lecturers as $lecturer)
                            <tr>
                                <td>
                                    @if ($lecturer->photo!=null)
                                        <img src="/storage/{{ $lecturer->photo }}" alt="" style="width:200px;">
                                    @endif
                                </td>
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

                                <td>
                                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-info">{{ __('lecturers.edit') }}</a>
                                    @can("deleteLecturer", $lecturer)
                                        <a href="{{ route('lecturers.delete', $lecturer->id) }}" class="btn btn-danger">{{ __('lecturers.delete') }}</a>
                                    @endcan
                                </td>

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
