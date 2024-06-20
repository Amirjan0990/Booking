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
                <label for="">Quantity</label>
                <input type="text" class="form-control" id="" name="quantity" value="{{$booking->quantity}}">
                <label for="">Order_dat</label>
                <input type="date" class="form-control" id="" name="orderdat" value="{{$booking->orderdat}}">
                <label for="">Status</label>
                <input type="text" class="form-control" id="" name="status" value="{{$booking->status}}">
                <label for="">Booking_id : </label>
                <select name="booking_id" id="" class="form-control">
                    @foreach($bookings as $booking)
                        <option value="{{$booking->id}}">{{$booking->name}}</option>
                    @endforeach
                </select>
                <label for="">Food_id : </label>
                <select name="food_id" id="" class="form-control">
                    @foreach($foods as $food)
                        <option value="{{$food->id}}">{{$food->name}}</option>
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
