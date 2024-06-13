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
        <form action="{{route('place.story')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Заголовок : </label>
            <input type="text" name="title" class="form-control">
            <label for="">Текст : </label>
            <input type="text" name="text" class="form-control">
            <label for="">Категория : </label>
            <select name="category_id" id="" class="form-control">
                @foreach($places as $place)
                    <option value="{{$place->id}}">{{$place->name}}</option>
                @endforeach
            </select>
            <label for="">Рисунок : </label>
            <input type="file" name="image" class="form-control">
            <input type="submit" value="Добавить" class="btn btn-primary form-control">
        </form>
    </div>
@endsection

@section('footer')
@endsection
