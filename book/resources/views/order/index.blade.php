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
    <a href="{{route('order.create')}}" class="btn btn-primary">Добавить</a>
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
        @foreach($all_order as $order)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$order->title}}</td>
                <td>{{$order->image}}</td>
                <td>{{$order->category->name}}</td>
                <td>{{$order->category_id}}</td>
                <td>{{$order->update_at}}</td>
                <td>
                    <form action="{{route('order.destroy', $order->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('order.edit', $order->id)}}" method="get">
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
