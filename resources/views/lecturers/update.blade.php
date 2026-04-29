@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Updating lecturer</div>

                <div class="card-body">
                   <form action="{{ route('lecturers.update', $lecturer->id) }}" method="post" enctype="multipart/form-data">
                       @csrf
                       @method('put')

                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.name') }}:</label>
                           <input class="form-control" type="text" name="name" value="{{ $lecturer->name }}">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">{{ __('lecturers.surname') }}:</label>
                           <input class="form-control" type="text" name="surname" value="{{ $lecturer->surname }}">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Phone:</label>
                           <input class="form-control" type="text" name="phone" value="{{ $lecturer->phone }}">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Email:</label>
                           <input class="form-control" type="email" name="email" value="{{ $lecturer->email }}">
                       </div>
                       <div class="mb-3">
                           <label class="form-label">Birth date:</label>
                           <input class="form-control" type="date" name="birthday" value="{{ $lecturer->birthday }}">
                       </div>
                       <hr>
                       @if ($lecturer->photo==null)
                       <div class="mb-3">
                           <label class="form-label">Photo:</label>
                           <input class="form-control" type="file" name="photo">
                       </div>
                       @else
                           <div class="mb-3">
                               <img src="/storage/{{$lecturer->photo}}" alt="" style="width:  200px;">
                               <div>
                                   <a href="{{ route('lecturers.deletePhoto', $lecturer->id) }}" class="btn btn-danger"> Delete photo</a>
                               </div>

                           </div>
                       @endif
                       <hr>
                       <button class="btn btn-success">Update lecturer</button>

                   </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
