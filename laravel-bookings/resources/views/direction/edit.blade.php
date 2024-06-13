@extends('layouts.app')

@section('title')
    Изменение
@endsection
<!-- edit -->
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('directory.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label for="">Имя : </label>
            <input type="text" name="name" class="form-control" value="{{$direction->name}}">
            <input type="submit" value="Изминенить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection

@section('footer')
@endsection
