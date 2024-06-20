@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Редактировать бронирование #{{ $booking->id }}</h3>
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
            <form action="{{ route('booking.update', $booking->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="">Start_time</label>
                <input type="date" class="form-control" id="" name="date" value="{{$booking->date}}">
                <label for="">End_time</label>
                <input type="date" class="form-control" id="" name="time" value="{{$booking->time}}">
                <label for="">Guests</label>
                <input type="text" class="form-control" id="" name="guests" value="{{$booking->guests}}">
                <label for="">Status</label>
                <input type="text" class="form-control" id="" name="status" value="{{$booking->status}}">
                <label for="">Place_id : </label>
                <select name="place_id" id="" class="form-control">
                    @foreach($places as $place)
                        <option value="{{$place->id}}">{{$place->name}}</option>
                    @endforeach
                </select>
                <label for="">Client_id : </label>
                <select name="client_id" id="" class="form-control">
                    @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
                <input type="submit" value="Добавить" class="btn btn-primary form-control">
            </form>
        </div>
    </div>
@endsection
