@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('lecturers.lecturers') }}</div>

                <div class="card-body">
                   <form action="{{ route('lecturers.store') }}" method="post">
                       @csrf

                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.name') }}:</label>
                           <input class="form-control" type="text" name="name">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.surname') }}:</label>
                           <input class="form-control" type="text" name="surname">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.phone') }}:</label>
                           <input class="form-control" type="text" name="phone">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.email') }}:</label>
                           <input class="form-control" type="email" name="email">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.birth_date') }}:</label>
                           <input class="form-control" type="date" name="birthday">
                       </div>
                       <hr>
                       <button class="btn btn-success">{{ __('lecturers.add_new') }}</button>

                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
