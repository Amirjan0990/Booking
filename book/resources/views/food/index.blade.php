@extends('layouts.app')

@section('title')
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @elseif(session('message2'))
        <div class="alert alert-info">
            {{session('message2')}}
        </div>
    @endif
    <a href="{{route('food.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Заголовок</th>
            <th>Рисунок</th>
            <th>Категория</th>
            <th>Дата создания</th>
            <th>Дата изменения</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($all_food as $food)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$food->title}}</td>
                <td>{{$food->image}}</td>
                <td>{{$food->category->name}}</td>
                <td>{{$food->category_id}}</td>
                <td>{{$food->update_at}}</td>
                <td>
                    <form action="{{route('food.destroy', $food->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('food.edit', $food->id)}}" method="get">
                        @csrf
                        <input type="submit" value="Изменить" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
@endsection
