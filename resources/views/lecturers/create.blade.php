@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>
                            {{  $error }}
                        </div>
                    @endforeach
                </div>

            @endif




            <div class="card">
                <div class="card-header">{{ __('lecturers.lecturers') }}</div>

                <div class="card-body">
                   <form action="{{ route('lecturers.store') }}" method="post">
                       @csrf

                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.name') }}:</label>
                           <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" >
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.surname') }}:</label>
                           <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{ old('surname') }}" >
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.phone') }}:</label>
                           <input class="form-control @error('phone') is-invalid @enderror " type="text" name="phone" value="{{ old('phone') }}">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.email') }}:</label>
                           <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.birth_date') }}:</label>
                           <input class="form-control" type="date" name="birthday" value="{{ old('birthday') }}">
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
