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
            <form action="{{ route('registrate.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <label for="">Имя : </label>
            <input type="text" name="name" class="form-control" value="{{$register->title}}">
            <label for="">Фамилия : </label>
            <input type="text" name="surname" class="form-control" value="{{$register->text}}">
            <label for="">Возраст : </label>
            <input type="text" name="year" class="form-control" value="{{$register->text}}">
            <label for="">Опыт работы : </label>
            <input type="text" name="experience" class="form-control" value="{{$register->text}}">
            <label for="">Направление : </label>
            <select name="category_id" id="" class="form-control">
                @foreach($directions as $direction)
                    <option value="{{$direction->id}}">{{$direction->name}}</option>
                @endforeach
            </select>
            <label for="">Рисунок : </label>
            <input type="file" name="image" class="form-control" value="{{$register->image}}">
            <input type="submit" value="Изминенить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection

@section('footer')
@endsection
