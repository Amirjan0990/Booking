@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактировать бронирование #{{ $foodcat->id }}</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('foodcat.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="">Name</label>
                <input type="text" class="form-control" id="" name="name" value="{{$foodcat->name}}">
                <label for="">Description</label>
                <input type="text" class="form-control" id="" name="description" value="{{$foodcat->description}}">
                <input type="submit" value="Изменить" class="btn btn-primary form-control">
            </form>
        </div>
    </div>
@endsection
