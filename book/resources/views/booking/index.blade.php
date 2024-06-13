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
    <a href="{{route('booking.create')}}" class="btn btn-primary">Добавить</a>
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
        @foreach($all_booking as $booking)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$booking->title}}</td>
                <td>{{$booking->image}}</td>
                <td>{{$booking->category->name}}</td>
                <td>{{$booking->category_id}}</td>
                <td>{{$booking->update_at}}</td>
                <td>
                    <form action="{{route('booking.destroy', $booking->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('booking.edit', $booking->id)}}" method="get">
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
