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
    <a href="{{asset('registrate.create')}}" class="btn btn-primary">Добавить</a>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Имя : </th>
            <th>Фамилия : </th>
            <th>Возраст</th>
            <th>Опыт работы</th>
            <th>Направление</th>
            <th>Email</th>
            <th>Пароль</th>
            <th>Удалить</th>
            <th>Изменить</th>
        </tr>
        @foreach($all_register as $register)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$register->name}}</td>
                <td>{{$register->surname}}</td>
                <td>{{$register->year}}</td>
                <td>{{$register->experience}}</td>
                <td>{{$register->direction->name}}</td>
                <td>{{$register->email}}</td>
                <td>{{$register->password}}</td>


                <td>
                    <form action="{{ route('registrate.destroy', $register->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('registrate.edit', $register->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-info">Изменить</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')
@endsection
