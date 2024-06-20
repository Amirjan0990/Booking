@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактировать бронирование #{{ $restaurant->id }}</h3>
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
            <form action="{{ route('admin.restaurant.update', $clients->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="date">Name:</label>
                    <input type="date" class="form-control" name="name" value="{{$restauarnt->name}}">
                </div>
                <div class="form-group">
                    <label for="time">Adress:</label>
                    <input type="time" class="form-control" name="adress" value="{{$restaurant->adress}}">
                </div>
                <div class="form-group">
                    <label for="seats">Phone:</label>
                    <input type="number" class="form-control" name="phone" value="{{$restaurfant->phone}}">
                </div>
                <div class="form-group">
                    <label for="seats">Email:</label>
                    <input type="number" class="form-control" name="Email" value="{{$restaurfant->Email}}">
                </div>
                <div class="form-group">
                    <label for="seats">Category:</label>
                    <input type="number" class="form-control" name="Category" value="{{$restaurfant->Category}}">
                </div>
                <div class="form-group">
                    <label for="seats">Category:</label>
                    <input type="number" class="form-control" name="Category" value="{{$restaurant->Category}}">
                </div>
                <div class="form-group">
                    <label for="seats">Actions:</label>
                    <input type="number" class="form-control" name="Actions" value="{{$restaurfant->Actions}}">
                </div>
                <div class="card-body">
                    <label for="exampleInputEmail1">User:</label>
                    <select id="exampleInputEmail1" name="user_id">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-body">
                    <label for="exampleInputEmail1">Restaurant:</label>
                    <select id="exampleInputEmail1" name="restaurant_id">
                        @foreach($restaurants as $restaurant)
                            <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
                <a href="{{ route('admin.restaurant.index') }}" class="btn btn-secondary">Отмена</a>
            </form>
        </div>
    </div>
@endsection
