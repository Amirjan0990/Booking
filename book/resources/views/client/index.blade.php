@extends('layouts.main')
@section('title')
    <h3>Таблица ресторанов</h3>
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>#</th>
            <th>name</th>
            <th>surname</th>
            <th>phone</th>
            <th>restaurant_id</th>
            <th>user_id</th>
            <th>delete</th>
            <th>update</th>
            <th>Additionally</th>
        </tr>
        @foreach($clients as $client)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$client->name}}</td>
                <td>{{$client->surname}}</td>
                <td>{{$client->phone}}</td>
                <td>{{$client->restaurant->name}}</td>
                <td>{{$client->user->name}}</td>
                <td>
                    <form action="{{route('clients.destroy', $client->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="delete" class="btn btn-danger">
                    </form>
                </td>
                <td>
                    <form action="{{route('clients.edit', $client->id)}}" method="get">
                        @csrf
                        <input type="submit" value="update" class="btn btn-info">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>


@endsection
