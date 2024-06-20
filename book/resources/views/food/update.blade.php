@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактировать бронирование #{{ $food->id }}</h3>
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
            <form action="{{ route('admin.food.update', $food->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="date">Name:</label>
                    <input type="date" class="form-control" name="name" value="{{$food->name}}">
                </div>
                <div class="form-group">
                    <label for="time">Price:</label>
                    <input type="time" class="form-control" name="price" value="{{$food->price}}">
                </div>
                <div class="form-group">
                    <label for="seats">Image:</label>
                    <input type="file" class="form-control" name="image" value="{{$food->image}}">
                </div>

                <div class="form-group">
                    <label for="seats">Description:</label>
                    <input type="text" class="form-control" name="description" value="{{$food->description}}">
                </div>


                <div class="form-group">
                    <label for="seats">Time:</label>
                    <input type="time" class="form-control" name="time" value="{{$food->time}}">
                </div>


                <div class="form-group">
                    <label for="seats">Is_active:</label>
                    <input type="text" class="form-control" name="is_active" value="{{$food->is_active}}">
                </div>

                <div class="card-body">
                    <label for="exampleInputEmail1">Food_category:</label>
                    <select id="exampleInputEmail1" name="food_category_id">
                        @foreach($food_categories as $food_category)
                            <option value="{{$food_category->id}}">{{$food_category->name}}</option>
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
                <a href="{{ route('admin.food.index') }}" class="btn btn-secondary">Отмена</a>
            </form>
        </div>
    </div>
@endsection
