@extends('layouts.app')

@section('title')
    Добавление
@endsection
<!-- create -->
@section('content')
    <div class="container">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        <form action="{{route('registrate.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Имя : </label>
            <input type="text" name="name" class="form-control">
            <label for="">Фамилия : </label>
            <input type="text" name="surname" class="form-control">
            <label for="">Возраст : </label>
            <input type="text" name="year" class="form-control">
            <label for="">Опыт работы : </label>
            <input type="text" name="experience" class="form-control">
            <label for="">Направление : </label>
            <select name="direction_id" id="" class="form-control">
                @foreach($directions as $direction)
                    <option value="{{$direction->id}}">{{$direction->name}}</option>
                @endforeach
            </select>
            <label for="">Email : </label>
            <input type="email" name="email" class="form-control">
            <label for="">Пароль : </label>
            <input type="password" name="password" class="form-control">
            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection

@section('footer')
@endsection
